@extends("main")
@section("content")
<div class="container">
    <div class="row mr-2">
        @if(count($skateboards) == 0)
        <h2 class="text-center mt-5 mb-2" style="font-size: 2rem;">Neturime Riedlenciu su {{App\Models\SkateboardCategory::where('id', $category->id)->get()[0]->name}} kategorijos</h2>
        @else
        <h2 class="text-center mt-5 mb-2" style="font-size: 2rem;">Radome riedlentes su {{App\Models\SkateboardCategory::where('id', $category->id)->get()[0]->name}} kategorija </h2>
        
        @foreach($skateboards as $skateboard)
            <div class="card bg-dark border-radius text-white text-center border mx-3 my-4 py-2" style="width: 20rem;">
                <img class="card-img-top" src="{{ url('storage/'.$skateboard->img) }}" alt="Photo" style="height: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$skateboard->title}}</h5>
                    <p class="mb-2 text-justify-center text-wrap">{{Str::limit($skateboard->description, 100)}}</p>
                    <p class="mb-2">{{ number_format($skateboard->price, 2)}} €</p>
                    <a href="/ProductShow/{{$skateboard->id}}" class="btn btn-primary border border-warning border-2 border-0" style="font-family:Arial Black;"><i class="fas fa-angle-double-left"></i> Plačiau <i class="fas fa-angle-double-right"></i> </a>
                </div>
            </div>
        @endforeach
        @endif
        <div class="mb-5"></div>
        {{ $skateboards->links('_partials.pages') }}
    </div>
</div>
@endsection