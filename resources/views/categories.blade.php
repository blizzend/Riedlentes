<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategorijos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center w-75">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Kategorija</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{$category->name}}</th>
                    
                    <th><a href="/category/{{$category->id}}" class="btn btn-primary"><i class="fas fa-arrow-right"></i></a><a href="/edit-category/{{ $category->id }}" class="btn btn-warning"><i class="fas fa-edit"></i></a><a href="/categories/{{$category->id}}/delete/ask" class="btn btn-danger"><i class="fas fa-times-circle"></i></a></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container d-flex justify-content-center w-75">
    <a class="btn btn-primary" href="/add-category"><i class="fas fa-plus"></i></a>
</div>
</x-app-layout>