@extends('layouts.app')

@section('content')
<div class="collapse navbar-collapse" id="navbarNav">
    {{-- <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cats.index') }}">Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('catFoods.index') }}">Kategori</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('aksesosris.index') }}">Aksesoris</a>
        </li>
    </ul> --}}
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit aksesosris</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('aksesoris.update', $aksesosris->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $aksesosris->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <small class="form-text text-muted">Leave blank to keep the current image.</small>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $aksesosris->description }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $aksesosris->price }}" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating" value="{{ $aksesosris->rating }}" min="0" max="5" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('aksesoris.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
