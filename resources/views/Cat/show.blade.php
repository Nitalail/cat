@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $cat->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->name }}" class="img-fluid mb-3">
                    </div>
                    <p><strong>Description:</strong> {{ $cat->description }}</p>
                    <p><strong>Price:</strong> ${{ $cat->price }}</p>
                    <p><strong>Rating:</strong> {{ $cat->rating }}</p>
                    <p><strong>Category:</strong> {{ $cat->category->name }}</p>
                    <div class="text-center">
                        <a href="{{ route('cats.index') }}" class="btn btn-secondary">Back</a>
                        <a href="{{ route('cats.edit', $cat->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('cats.destroy', $cat->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
