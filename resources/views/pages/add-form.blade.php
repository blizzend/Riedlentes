@extends('main')
@section('content')
    <div class="container text-white">
        <form action="storeSkateboard" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            @include("_partials/errors")
            <h3 class="text-center">Užpildykite formą!</h3>
            <div class="mb-3">
                <label for="title" class="form-label">Pavadinimas</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategorija</label>
                <select class="form-select" name="category" id="category">
                @foreach (App\Models\SkateboardCategory::all() as $category)
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
                </select>
            </div>
            <label for="price" class="form-label">Kaina</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" step="0.01" name="price" id="price">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Aprašymas</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            <label class="input-group">Pasirinkti nuotrauka</label>
            <div class="bg-white text-center text-dark mb-3">
                <input type="file" class="form-control py-2 border border-radius" name="img">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary border-0">Pateikti</button>
            </div>
        </form>
    </div>

@endsection