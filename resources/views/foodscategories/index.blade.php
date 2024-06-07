@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Category Foods</h2>
                        <a href="{{ route('foodscategories.create') }}" class="btn btn-primary float-right">Tambah Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoriesFoods as $categoriesFood)
                                <tr>
                                    <td>{{ $categoriesFood->id }}</td>
                                    <td>
                                        @if ($categoriesFood->image)
                                        <img src="{{ asset('storage/foodscategories/' . $categoriesFood->image) }}" alt="{{ $categoriesFood->name }}" class="img-thumbnail" style="max-width: 100px;">
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>{{ $categoriesFood->name }}</td>
                                    <td>
                                        <a href="{{ route('foodscategories.edit', $categoriesFood->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('foodscategories.show', $categoriesFood->id) }}" class="btn btn-primary btn-sm">View</a>
                                        <form action="{{ route('foodscategories.destroy', $categoriesFood->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
