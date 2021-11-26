@extends('main')
@section('content')
    <div class="container text-white">
        <form action="/ProductEdit/edit/{{ $skateboard->id }}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            {{ method_field("PATCH") }}
            @include("_partials/errors")
            <h3 class="text-center">Redaguoti</h3>
            <div class="mb-3">
                <label for="title" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$skateboard->title}}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategorija</label>
                <select class="form-select" name="category" id="category">
                @foreach (App\Models\SkateboardCategory::all() as $category)
                    @if ($category->id == $skateboard->category)
                    <option value="{{ $category->id }}" selected>{{$category->name}}</option>
                    @else
                    <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Aprašymas</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{$skateboard->description}}</textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" step="0.01" name="price" id="price" value="{{$skateboard->price}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Pasirinkite nuotrauka</label>
                <div class="bg-white text-center text-dark mb-3">
                    <input type="file" class="form-control py-2 border border-radius" name="img">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary border-0">Pateikti</button>
            </div>
        </form>
    </div>

@endsection