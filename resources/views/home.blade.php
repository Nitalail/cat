@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-5 mb-5 text-center">Selamat Datang di Meow Mart!</h2>
    <p>Di Meow Mart, kami menyediakan berbagai macam produk yang lucu dan menggemaskan untuk kucing Anda.</p>
    <p>Dari makanan lezat hingga aksesori yang stylish, kami memiliki segala yang Anda butuhkan untuk merawat kucing kesayangan Anda.</p>
    <p>Ayo jelajahi produk kami dan temukan yang terbaik untuk si kecil!</p>
    <br>
    <div class="row justify-content-around mb-6">
        <div class="col-md-3">
            <div class="text-center image-container">
                <img src="{{ asset('image/makanan kucing bagian home.png') }}" class="img-fluid mb-3" alt="Cat Food">
            </div>
            <h5 class="text-center text-orange">Cat Food</h5>
            <p class="text-center">Temukan makanan lezat untuk kucing Anda.</p>
            <div class="text-center">
                <a href="{{ route('food.index') }}" class="btn btn-primary">Lihat Cat Food</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-center image-container">
                <img src="{{ asset('image/cat bagian home.png') }}" class="img-fluid mb-3" alt="Cats">
            </div>
            <h5 class="text-center text-orange">Cats</h5>
            <p class="text-center">Temukan kucing kesayangan Anda di sini.</p>
            <div class="text-center">
                <a href="{{ route('cats.index') }}" class="btn btn-primary">Lihat Cats</a>
            </div>
        </div>
        <div class="col-md-7">
            <div class="text-center image-container">
                <img src="{{ asset('image/aksesoris bagian home.png') }}" class="img-fluid mb-3" alt="Cat Accessories">
            </div>
            <h5 class="text-center text-orange">Cat Accessories</h5>
            <p class="text-center">Jelajahi aksesori kucing yang stylish.</p>
            <div class="text-center">
                <a href="{{ route('aksesoris.index') }}" class="btn btn-primary">Lihat Accessories</a>
            </div>
        </div>
    </div>
</div>



@endsection
