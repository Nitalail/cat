@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2>Cats</h2>
                        <a href="{{ route('cats.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Cat</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($cats) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Rating</th>
                                    {{-- <th>Category Cat</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cats as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>
                                        <img src="{{ $cat->image ? asset('storage/cats/' . $cat->image) : asset('images/no-image.jpg') }}" alt="{{ $cat->name }}" style="max-width: 50px; max-height:50px;">
                                    </td>
                                    <td>{{ $cat->description }}</td>
                                    <td>{{ $cat->price }}</td>
                                    <td>{{ $cat->rating }}</td>
                                    {{-- <td>{{ $cat->category->name }}</td>  --}}
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('cats.edit', $cat->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('cats.show', $cat->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <form action="{{ route('cats.destroy', $cat->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this cat?')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center">
                        <p>No cats found.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
