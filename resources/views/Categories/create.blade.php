@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Create CAT Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
