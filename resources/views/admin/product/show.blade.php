@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h3 class="card-title">Show Product</h3>
                    </div>
                    <div class="preview-list">
                        <div class="preview-item">
                            <div class="preview-item-content d-flex flex-grow">
                                <div class="flex-grow">
                                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                        <h4 class="preview-subject">{{ $product->name }}</h4>
                                    </div>
                                    <p class="text-muted">{{ $product->desc }}</p>
                                    <h6 class="preview-subject pt-3">quantity:</h6>
                                    <p class="text-muted">{{ $product->quantity }}</p>
                                    <h6 class="preview-subject pt-3">Price:</h6>
                                    <p class="text-muted">${{ $product->price }}</p>
                                    <div class="mt-4">
                                        <a class="btn btn-warning ps-4 pe-4"  href="{{ route('products.edit', $product->id) }}"><span
                                                class="badge p-0" style="font-size: 18px">Edit</span></a>
                                        <form action="{{ route('products.delete', $product->id) }}" class="d-inline"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ps-4 pe-4"><span class="badge p-0" style="font-size: 18px">Delete</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4>Product Images</h4>
                    <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel pt-2 w-75 "
                        id="owl-carousel-basic">
                        <div class="item">
                            <img src="{{ asset('storage/' . $product->image) }}" width="200px"  height="400px" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
