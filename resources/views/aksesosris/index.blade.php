@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Accessories</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('aksesoris.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Accessory</a>
                    </div>
                    @if (count($aksesosris) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border-collapse: separate;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Rating</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aksesosris as $aksesosri)
                                <tr>
                                    <td>{{ $aksesosri->id }}</td>
                                    <td>{{ $aksesosri->name }}</td>
                                    <td><img src="{{ asset('storage/' . $aksesosri->image) }}" alt="{{ $aksesosri->name }}" width="50"></td>
                                    <td>{{ $aksesosri->description }}</td>
                                    <td>{{ $aksesosri->aksesoriscategory ? $aksesosri->aksesoriscategory->name : '-' }}</td>
                                    <td>{{ $aksesosri->price }}</td>
                                    <td>{{ $aksesosri->rating }}</td>
                                    <td>
                                        <a href="{{ route('aksesoris.edit', $aksesosri->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('aksesoris.destroy', $aksesosri->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this accessory?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center">
                        <p>No accessories found.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
