{{-- @extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $category->name }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $category->description }}</p>
                    <h5>Cats in this Category:</h5>
                    <ul class="list-group">
                        @foreach ($category->cats as $cat)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <img src="{{ asset('storage/' . $cat->image) }}" alt="{{ $cat->name }}" width="50" class="mr-3">
                                <span>{{ $cat->name }}</span>
                            </div>
                            <div>
                                <a href="{{ route('cats.show', $cat->id) }}" class="btn btn-primary btn-sm">View</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
