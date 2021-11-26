@extends('main')
@section('content')
    <div class="container text-white">
        <form action="/edit-category/edit/{{$category->id}}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            {{ method_field("PATCH") }}
            @include("_partials/errors")
            <h3 class="text-center">Pridekite kategorija!</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
            </div>
              
            <div class="text-center">
                <button type="submit" class="btn btn-primary border-0">Pateikti</button>
            </div>
        </form>
    </div>

@endsection