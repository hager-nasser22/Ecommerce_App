

@extends('user.layouts.master')
@section('title', 'Fruit Store - Wishlist')
@section('hero_title', 'Wishlist')
@section('hero_subtitle', 'Home/Wishlist')
@section('content')
<!-- Wishlist Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold" style="color: #ff4e50;">Your Wishlist</h2>
      <div class="row g-4" id="wishlist-grid">
        <!-- Wishlist items will be injected by JS -->
         <div class="col-12 col-sm-6 col-md-4 col-lg-3">
  <div class="card h-100 text-center">
    <img src="https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="تفاح أحمر">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">تفاح أحمر طازج</h5>
      <p class="card-text fw-bold mb-2">25 جنيه / كيلو</p>
      <button class="btn btn-success mb-2">أضف للسلة</button>
      <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> حذف</button>
    </div>
  </div>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
  <div class="card h-100 text-center">
    <img src="https://images.unsplash.com/photo-1465101178521-c1a9136a3b41?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="موز بلدي">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">موز بلدي</h5>
      <p class="card-text fw-bold mb-2">18 جنيه / كيلو</p>
      <button class="btn btn-success mb-2">أضف للسلة</button>
      <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> حذف</button>
    </div>
  </div>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
  <div class="card h-100 text-center">
    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="برتقال عصير">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title">برتقال عصير</h5>
      <p class="card-text fw-bold mb-2">15 جنيه / كيلو</p>
      <button class="btn btn-success mb-2">أضف للسلة</button>
      <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> حذف</button>
    </div>
  </div>
</div>
      </div>
    </div>
  </section>
  @endsection
