@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Detail Kategori Aksesoris</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('image/placeholder.jpg') }}" alt="{{ $category->name }}" class="img-fluid">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $category->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ $category->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td>{{ $category->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Dibuat pada</th>
                                            <td>{{ $category->created_at->format('d F Y H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Diperbarui pada</th>
                                            <td>{{ $category->updated_at->format('d F Y H:i:s') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{ route('aksesoriscategory.index') }}" class="btn btn-primary">Lihat Accessories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
