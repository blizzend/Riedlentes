@extends('main')
@section('content')
<div class="container p-5">
    <div class="row">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fg2.dcdn.lt%2Fimages%2Fpix%2Fasociatyvi-nuotrauka-78029675.jpg&f=1&nofb=1"
            alt="XD"style="height: 400px;" class="p-4">
    </div>

    <div class="alert alert-dark py-5 text-center text-white" style="background-color: rgb(74, 75, 80);" role="alert">
        Personalios riedlentes
    </div>

    <div class="row">
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
    </div>
    <div class="mb-5"></div>
        {{ $skateboards->links('_partials.pages') }}
    </div>
</div>
@endsection