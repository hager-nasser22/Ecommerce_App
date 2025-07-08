@extends('user.layouts.master')
@section('title', 'Fruit Store - Home')
@section('hero_title', 'Fresh & Juicy Fruits Delivered To You')
@section('hero_subtitle', 'Taste the freshness of nature with our handpicked selection of fruits!')
@section('hero_button_text')
<a href="products.html" class="btn btn-lg btn-success px-4"> Shop Now</a>
@endsection
@section('content')
    <!-- Featured Fruits -->

                <!-- Fruit cards will be injected by JS -->
                <!-- Products Grid -->
                <section class="py-5 bg-light">
                    <div class="container">
                        <h2 class="text-center mb-5 fw-bold" style="color: #ff4e50;">Featured Fruits</h2>
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
                        </div>
                    </div>
                </section>


@endsection
