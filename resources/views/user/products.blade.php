@extends('user.layouts.master')
@section('title', 'Fruit Store - Products')
@section('hero_title', 'Products')
@section('hero_subtitle', 'Home/Products')
@section('hero_button_text')
    <form class="d-flex justify-content-center" action="{{ route('user.product.search') }}" method="GET">
        <input class="form-control me-2 " style="width:30%" type="search" name="search" value="{{ request('search') }}" placeholder="{{ __('message.Search-products') }}" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button> 
    </form>
@endsection
@section('content')
    <!-- Products Grid -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold" style="color: #ff4e50;">All Fruits</h2>
            <div class="row g-4" id="products-grid">
                <!-- Product cards will be injected by JS -->
                <!-- Product cards will be injected by JS -->
                @if($products)
                    @foreach ($products as $product)    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 text-center">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                class="card-img-top" alt="Fresh Red Apple">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text fw-bold mb-2">{{ $product->price }} EGP / kg</p>
                                <p class="card-text small text-muted mb-3">{{ $product->desc }}</p>
                                <a href="{{ route('user.product.show',$product->id) }}" class="btn btn-success mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            No products available at the moment. Please check back later!
                        </div>
                    </div>
                @endif
                {{ $products->links() }}
            </div>
    </section>
@endsection
