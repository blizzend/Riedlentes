<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use App\Models\Skateboard;
use Gate;
use Illuminate\Support\Facades\Storage;

class SkateboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'showProduct']]);
    }
    public function index()
    {
        $skateboards = Skateboard::paginate(10)->withQueryString();
        return view("pages.home", compact('skateboards'));
    }
    public function skateboardForm()
    {
        return view("pages.add-form");
    }
    public function storeSkateboard(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'img' => 'mimes: jpg,jpeg,png|required|max:10000'
        ]);
        $path = $request->file('img')->store('public/images');
        $filename = str_replace('public/', "", $path);

        Skateboard::create([
            'title' => request('title'),
            'category' => request('category'),
            'description' => request('description'),
            'img' => $filename,
            'price' => request('price'),
            'owner' => Auth::id()
        ]);
        return redirect('/');
    }
    public function showProduct(Skateboard $skateboard) {
        return view("pages.product", compact('skateboard'));
    }
    public function editProduct(Skateboard $skateboard) {
        if (Gate::allows('edit', $skateboard)) {
        return view("pages.edit-product", compact('skateboard'));
    }
    dd('tu nesi savininkas');
    }
    public function updateProduct(Request $request, Skateboard $skateboard) {
        if (Gate::allows('edit', $skateboard)) {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
   
        Skateboard::where('id', $skateboard->id)->update($request->only(['title', 'category', 'description', 'price']));
        
        if($request->file('img') != null) {
            Storage::delete('public/'.$skateboard->img);
            $path_to_img = $request->file('img')->store('public/images');
            $filename = str_replace('public/', '' , $path_to_img);
            Skateboard::where('id', $skateboard->id)->update(['img' => $filename]);
        }
        
        return redirect('/');
    }
    dd('tu nesi savininkas');

    }
    public function showDeletion(Skateboard $skateboard) {
        return view('pages.showDeletion', compact('skateboard'));
    }
    public function deleteProduct(Skateboard $skateboard) {
        if (Gate::allows('delete', $skateboard)) {
            Storage::delete('public/'.$skateboard->img);
            $skateboard->delete();
            return redirect('/');
        }
        dd('Tu neesi savininkas');
    }

    public function viewUserSkateboard() {
        $skateboards = Skateboard::where('owner', Auth::id())->get();
        return view('dashboard', compact('skateboards'));
    }

}
