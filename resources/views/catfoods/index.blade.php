
@extends('layouts.app')

@section('content')
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cats.index') }}">Data</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('catFood.index') }}">Kategori</a>
        </li> --}}
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Cat Food</h2>
                        <a href="{{ route('food.create') }}" class="btn btn-primary">Add New Cat Food</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($catFoods) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Category </th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($catFoods as $catFood)
                                <tr>
                                    <td>{{ $catFood->id }}</td>
                                    <td>{{ $catFood->name }}</td>
                                    <td><img src="{{ asset('storage/' . $catFood->image) }}" alt="{{ $catFood->name }}" width="50"></td>
                                    <td>{{ $catFood->description }}</td>
                                    <td>{{ $catFood->categoryfood ? $food->categoryfood->name : '-' }}</td>
                                    <td>{{ $catFood->price }}</td>
                                    
                                    <td>
                                        <a href="{{ route('food.edit', $catFood->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('food.destroy', $catFood->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center">
                        <p>No cat food found.</p>
                        <a href="{{ route('food.create') }}" class="btn btn-primary">Add New Cat Food</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
