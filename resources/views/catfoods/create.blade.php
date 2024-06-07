@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Makanan Kucing Baru</h1>

    <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
