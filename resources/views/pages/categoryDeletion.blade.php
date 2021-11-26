@extends("main")
@section("content")
<div class="text-center">
    <div class="card row-2 mx-auto" style="width: 18rem;">   
        <div class="card-body text-center bg-dark">
            <h5 class="card-title fs-4 fw-bold">{{$category->name}}</h5>
            <a href="/category/{{ $category->id }}/delete/confirm" class="btn btn-danger my-2 border-0">Taip</a>
            <a href="/categories" class="btn btn-primary my-2 mx-4 border-0">Ne</a>
    </div>
</div>
@endsection