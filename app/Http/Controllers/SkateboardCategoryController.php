<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkateboardCategory;
use App\Models\Skateboard;

class SkateboardCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['viewSkateboardbyCategory']]);
    }
    public function index()
    {

        $categories = SkateboardCategory::all();
        return view("categories", compact('categories'));
    }
    public function viewForm()
    {
        return view('pages.add-category');
    }

    public function storeCategories(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:225',
        ]);
        SkateboardCategory::create([
            'name' =>request('name'),
        ]);

        return redirect('/categories');
    }
    public function editCategory(SkateboardCategory $category) {
        return view("pages.edit-category", compact('category'));
    }
    public function updateCategory(Request $request, SkateboardCategory $category){
        $validated = $request->validate([
            'name' => 'required'
        ]);
        SkateboardCategory::where('id', $category->id)->update($request->only(['name']));
        return redirect('/categories');
    }
    public function categoryDeletion(SkateboardCategory $category) {
        return view('pages.categoryDeletion', compact('category'));
    }
    public function deleteCategory(SkateboardCategory $category) {
            $category->delete();
                return redirect('/categories');
        }
    public function viewSkateboardbyCategory(SkateboardCategory $category){
        $skateboards = Skateboard::where('category', $category->id)->paginate(10)->withQueryString();
        return view("pages.skateboards-by-category", compact('skateboards', 'category'));

    }
}
