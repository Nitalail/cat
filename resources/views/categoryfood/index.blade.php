@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Category Foods</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catFoods as $catFood)
                            <tr>
                                <td>{{ $catFood->id }}</td>
                                <td>{{ $catFood->name }}</td>
                                <td>
                                    <a href="{{ route('CateFood.edit', $catFood->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('CateFood.destroy', $catFood->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('CatFood.create') }}" class="btn btn-success">Create New Category</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
