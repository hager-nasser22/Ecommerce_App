@extends('user.layouts.master')
@section('title', 'Fruit Store - Cart')
@section('hero_title', 'Cart')
@section('hero_subtitle', 'Home/Cart')
@section('content')
    <!-- Cart Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold" style="color: #ff4e50">
                Your Cart
            </h2>
            <div class="table-responsive">
                <table class="table align-middle bg-white shadow-sm rounded" id="cart-table">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Cart items will be injected by JS -->
                        @if ($cart)
                            @foreach ($cart as $id => $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt=""
                                            style="width: 60px; height: 60px; object-fit: cover;border-radius: 8px;" />
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['price'] }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('user.product.updateCart', $id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-secondary btn-sm me-2">
                                                <input type="number" class="form-control text-center"
                                                    value="{{ $item['quantity'] }}" style="width: 70px" name="quantity" />
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $item['price'] * $item['quantity'] }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('user.product.deleteCart', $id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p class="text-muted">Your cart is empty</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <div class="bg-white p-4 rounded shadow-sm" style="min-width: 300px">
                    @if(session()->has("error"))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get("error") }}
                        </div>
                    @endif
                    @if(session()->has("success"))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get("success") }}
                        </div>
                    @endif
                    
                    <h5 class="mb-3">Cart Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span id="cart-subtotal">${{ $totalPrice }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax :</span>
                        <span id="cart-tax">${{ $tax }}</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total:</span>
                        <span id="cart-total">${{ $totalFinalPrice }}</span>
                    </div>
                    <form action="{{ route('user.product.makeOrder') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="address" class="form-label">Shipping Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter your shipping address" required />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" required />
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-3">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
