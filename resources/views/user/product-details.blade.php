@extends('user.layouts.master')
@section('title', 'Fruit Store - product details')
@section('hero_title', 'Products Details')
@section('hero_subtitle', 'Home/Product-Details')
@section('content')
    <!-- Product Detail -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-center" id="product-detail">
                <!-- Product detail will be injected by JS -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('storage/' . $product->image) }}"
                        class="img-fluid rounded shadow mb-4" style="max-height:350px;object-fit:cover;" alt="Fresh Red Apple">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
                    <h4 class="text-success mb-3">{{ $product->price }} EGP / kg</h4>
                    <p class="mb-4">{{ $product->desc }}</p>
                    <form method="POST" action="{{ route('user.product.addToCart', $product->id) }}">
                        @csrf
                        <input type="number" name="quantity" class="form-control mb-3" placeholder="Quantity" min="1" value="{{1}}" required>
                        <button type="submit" class="btn btn-success btn-lg mb-2">Add to Cart</button>
                    </form>
                    <form method="POST" action="{{ route('user.product.addToFavorites', $product->id) }}">
                        @csrf
                        @if($product->isFavorite())
                            <button type="submit" class="btn btn-danger btn-lg mb-2"><i class="fa fa-heart"></i> Remove from Favorites</button>
                        @else
                            <button type="submit" class="btn btn-outline-danger btn-lg mb-2"><i class="fa fa-heart"></i> Add to Favorites</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
