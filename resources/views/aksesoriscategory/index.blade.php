@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Category Aksesoris</h1>
                <a href="{{ route('aksesoriscategory.create') }}" class="btn btn-primary mb-3">Tambah Category Aksesoris</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" style="max-width: 100px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('aksesoriscategory.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('aksesoriscategory.show', $category->id) }}" class="btn btn-primary btn-sm">View</a>
                                <form action="{{ route('aksesoriscategory.destroy', $category->id) }}" method="POST" style="display: inline-block;">
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
@endsection
