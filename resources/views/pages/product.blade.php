@extends("main")
@section("content")
<div class="row d-flex justify-content-center">
            <div class="card bg-dark text-white text-center border-0 mx-3 my-4 py-2" style="width: 20rem;">
                <img class="card-img-top" src="{{ url('storage/'.$skateboard->img) }}" alt="Photo">
                <div class="card-body">
                    <h5 class="card-title">{{$skateboard->title}}</h5>
                    @if(App\Models\SkateboardCategory::where('id', $skateboard->category)->get()->count() != 0)
                    <p>Jusu kategorija: {{App\Models\SkateboardCategory::where('id', $skateboard->category)->get()[0]->name}}</p>
                    @endif
                    <p class="mb-2 text-justify-center text-wrap">{{Str::limit($skateboard->description, 100)}}</p>
                    <p class="mb-2">{{ number_format($skateboard->price, 2)}} €</p>
                @if($skateboard->owner == Auth::id())
                    <a href="/ProductEdit/{{ $skateboard->id }}" class="btn btn-success my-2 border-0">Redaguoti</a>
                    <a href="/Product/{{ $skateboard->id }}/delete/ask" class="btn btn-danger my-2 mx-4 border-0">Ištrinti</a>
                @endif
                </div>
            </div>
    </div>

@endsection