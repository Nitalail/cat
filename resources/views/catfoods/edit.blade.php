@extends('layouts.app')

@section('content')

<div class="card"> 
    <div class="card-header"> 
        <h2>Edit Cat Food - {{ $catFood->name }} </h2> 
    </div>
    <div class="card-body">
        <form action="{{ route('food.update', $catFood->id) }}" method="POST" enctype="multipart/file-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name"
                    name="name" 
                    value="{{ $catFood->name }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input 
                    type="file" 
                    class="form-control-file"
                    id="image"
                    name="image"
                >
                <img 
                    src="{{ asset('storage/' . $catFood->image) }}"
                    class="img-thumbnail mt-2"
                    alt="{{ $catFood->name }}"
                    width="200"
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    class="form-control" 
                    id="description"
                    name="description"
                    required
                >{{ $catFood->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input
                    type="number"
                    class="form-control"
                    id="price"
                    name="price"
                    value="{{ $catFood->price }}"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">Update Cat Food</button>
            <a href="{{ route('food.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

@endsection
