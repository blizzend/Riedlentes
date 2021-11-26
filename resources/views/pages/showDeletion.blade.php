@extends("main")
@section("content")
<!-- <div class="card bg-light bg-dark border-bottom-0" style="border-radius: 0">
    <div class="card-body text-center p-4 p-lg-5 pt-3 pt-lg-8">
        <div class="bg-dark bg-secondary text-white mb-4 mt-4"><i class="fas fa-caret-down text-success"></i>
            <div>
                <h2 class="fs-4 fw-bold">{{$skateboard->title}}</h2>
                <p class="mb-8">{{$skateboard->description}}</p>
                <p class="mb-8">$ {{$skateboard->price}}</p>
                <p>Ar tikrai norite Ištrinti</p>
                <a href="/ProductEdit/{{ $skateboard->id }}" class="btn btn-danger my-2 border-0">Taip</a>
                <a href="/Product/{{ $skateboard->id }}/delete/ask" class="btn btn-primary my-2 mx-4 border-0">Ne</a>
            </div>
            <div class="justify-content-center mt-5">
                <div class="sol-sm-4">
                    <img class="border border-3" src="{{ url('storage/'.$skateboard->img) }}" alt="Photo" style="max-width: 600px;">
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="text-center">
    <div class="card row-2 mx-auto" style="width: 18rem;">   
        <img src="{{ url('storage/'.$skateboard->img) }}" class="card-img-top" alt="...">
        <div class="card-body text-center bg-dark">
            <h5 class="card-title fs-4 fw-bold">{{$skateboard->title}}</h5>
            <p class="card-text">{{$skateboard->description}}</p>
            <p class="mb-8">$ {{$skateboard->price}}</p>
            <a href="/Product/{{ $skateboard->id }}/delete/confirm" class="btn btn-danger my-2 border-0">Taip</a>
            <a href="/ProductShow/{{ $skateboard->id }}" class="btn btn-primary my-2 mx-4 border-0">Ne</a>
    </div>
</div>


@endsection