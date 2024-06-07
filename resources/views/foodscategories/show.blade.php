@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $category->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>ID:</strong> {{ $category->id }}
                        </div>
                        <div class="mb-3">
                            <strong>Nama:</strong> {{ $category->name }}
                        </div>
                        <div>
                            <strong>Gambar:</strong><br>
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" style="max-width: 200px;">
                            @else
                                (Gambar tidak tersedia)
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('foodscategories.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
