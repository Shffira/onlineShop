@extends('layouts.app')
@section('title','Furnish - Toko Furniture')
@section('content')

<div class="py-lg-8 pt-6">
<div class="container">
<div class="row justify-content-center">
<div class="col-xxl-8 col-12">

<div class="swiper-container swiper swiper-pagination-light"
     data-autoplay="true"
     data-autoplay-delay="3000"
     data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 1}, "1024": {"slidesPerView": 1}}'
     data-effect="slide"
     data-navigation="true"
     data-pagination="true"
     data-pagination-type=""
     data-space-between="100"
     data-speed="800"
     id="swiper-6">

<div class="swiper-wrapper">

<!--Slider-->
<div class="swiper-slide px-md-8">
<div class="position-relative text-center">

<img alt="" class="img-fluid my-5 my-lg-0"
     src="{{ asset('images/slider/slider-img-2.png') }}"/>

<div class="text-center position-absolute top-0 start-0 px-lg-11">
<h1 class="fs-1 fst-italic text-secondary">Diskon 20%</h1>
<h2 class="display-4 lh-1">Comfy Sofa Home-Office</h2>
</div>

<div class="position-absolute top-md-65 top-75 start-50 translate-middle-x mt-lg-9">
<p class="d-none d-lg-block">Comfortable and stylish sofa for your home office.</p>
<div class="fw-bold mb-4 d-none d-lg-block">$50</div>

<a class="btn btn-primary" href="{{ route('products') }}">
    View Details
</a>

</div>
</div>
</div>
<!--Slider-->

<!--Slider-->
<div class="swiper-slide px-md-8">
<div class="position-relative text-center">

<img alt="" class="img-fluid my-5 my-lg-0"
     src="{{ asset('images/slider/slider-img-1.png') }}"/>

<div class="text-center position-absolute top-0 start-0 px-lg-11">
<h1 class="fs-1 fst-italic text-secondary">Diskon 10%</h1>
<h2 class="display-4 lh-1">Exchange your old furniture</h2>
</div>

<div class="position-absolute top-md-65 top-75 start-50 translate-middle-x mt-lg-9">
<p class="d-none d-lg-block">Save up to $50 for your home office.</p>
<div class="fw-bold mb-4 d-none d-lg-block">$45</div>

<a class="btn btn-primary" href="{{ route('products') }}">
    View Details
</a>

</div>
</div>
</div>
<!--Slider-->

<!--Slider-->
<div class="swiper-slide px-md-8">
<div class="position-relative text-center">

<img alt="" class="img-fluid my-5 my-lg-0"
     src="{{ asset('images/slider/slider-img-3.png') }}"/>

<div class="text-center position-absolute top-0 start-0 px-lg-11">
<h1 class="fs-1 fst-italic text-secondary">Diskon 25%</h1>
<h2 class="display-4 lh-1">Crafted royal comfort sofa</h2>
</div>

<div class="position-absolute top-md-65 top-75 start-50 translate-middle-x mt-lg-9">
<p class="d-none d-lg-block">Experience the elegance of timeless craftsmanship with our Sofa.</p>
<div class="fw-bold mb-4 d-none d-lg-block">$89</div>

<a class="btn btn-primary" href="{{ route('products') }}">
    View Details
</a>

</div>
</div>
</div>
<!--Slider-->

</div>

<!-- Add Pagination -->
<!-- <div class="swiper-pagination mb-3 "></div> -->

<!-- Add Navigation -->
<div class="swiper-navigation mb-4">
<div class="swiper-button-prev">
</div>
<div class="swiper-button-next">
</div>
</div>

</div>
</div>
</div>
</div>
</div>
<section class="py-lg-10 mx-3 mx-lg-0 bg-white">
<div class="container">
<div class="row mb-md-8 mb-4">
<div class="col-lg-12 mb-8">
<div class="d-flex flex-column flex-md-row align-items-md-end justify-content-md-between gap-4">
<!--Heading-->
<div class="col-sm-5">
<h2 class="display-4">Koleksi Favorit</h2>
<p class="mb-0 lead">Kami menyediakan berbagai koleksi furnitur favorit yang akan membuat rumah Anda lebih nyaman dan estetik.</p>
</div>
</div>
</div>
<div class="col-lg-12"><div class="swiper-container swiper" data-autoplay="false" data-autoplay-delay="3000" data-breakpoints='{"480":{"slidesPerView":2},"768":{"slidesPerView":3},"1024":{"slidesPerView":3}}' data-effect="slides" data-navigation="false" data-pagination="true" data-pagination-type="bullets" data-space-between="30" data-speed="400" id="swiper-3">
<div class="swiper-wrapper pb-10">
@forelse($products as $product)

    <div class="swiper-slide">
        <div>
            <a href="{{ route('products.show', $product) }}">
                <img
                    alt="{{ $product->name }}"
                    class="img-fluid"
                    src="{{ $product->image_url }}"
                >
            </a>

            <div class="text-center">
                <h3 class="mt-3 h5">
                    <a href="{{ route('products.show', $product) }}">
                        {{ $product->name }}
                    </a>
                </h3>

                <div>
                    <span>
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                <a
            class="btn btn-primary btn-sm mt-2"
            href="{{ route('checkout', ['product' => $product->slug, 'from' => 'home']) }}"
        >
            Checkout
        </a>
            </div>
        </div>
    </div>

@empty

    <div class="swiper-slide">
        <p>Belum ada produk.</p>
    </div>

@endforelse
</div></div></div>
</div>
</div>
</section>
<section class="py-lg-11 py-6" style="background: url('{{ asset('assets/images/couch-with-cushions-glass-table.jpg') }}') no-repeat; background-size: cover; background-position: center;">
<div class="container">
<div class="row justify-content-center align-items-center">
<div class="col-lg-8">
<div class="card border-0 shadow-lg rounded-0">
<div class="card-body p-6">
<div class="text-center">
<p class="fst-italic">
                "Furnitur bukan hanya tentang mengisi ruangan, tetapi juga menciptakan kenyamanan dan karakter di dalamnya. Furnish hadir dengan pilihan desain yang modern, nyaman, dan mudah disesuaikan dengan berbagai gaya ruang."
              </p>
<div class="lh-1">
<h4 class="fs-5 mb-1">Nadia Putri</h4>
<small class="text-sm">CEO, TemuRuang</small>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-lg-10 py-5">
<div class="container">
<div class="row justify-content-center mx-lg-10">
<div class="col-lg-8 text-center">
<h2 class="mb-5">Subscribe to our Newsletter</h2>
<form class="d-flex justify-content-center gap-2 flex-column flex-sm-row">
<input class="form-control w-lg-50 w-100" placeholder="Enter your email" required="" type="email"/>
<button class="btn btn-primary" type="submit">Subscribe</button>
</form>
</div>
</div>
</div>
</section>

@endsection
