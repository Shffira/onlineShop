<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'TemuRuang')</title>
  @vite(['resources/js/main.js'])
  <style>
    .logout-btn {
        display: block;
        width: 100%;
        padding: 0.5rem 0;
        margin: 0;
        border: none;
        background: transparent;
        text-align: left;
        font-size: inherit;
        font-weight: inherit;
        line-height: inherit;
        color: inherit;
        cursor: pointer;
    }

    .logout-btn:hover {
        color: var(--bs-primary);
    }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4 py-3 navbar-custom">
<div class="container-fluid px-0">
<a class="navbar-brand" href="{{ route('home') }}">
<span class="d-flex flex-column text-uppercase text-xs fw-bold lh-sm">
<span class="" style="letter-spacing: .12rem;">TemuRuang</span>
</span></a>
<div class="mx-auto d-lg-block d-none">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a aria-current="page" class="nav-link active" href="{{ route('home') }}">Beranda</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('products') }}">Produk</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('testimonials') }}">Testimoni</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('contact') }}">Kontak</a>
</li>
</ul>
</div>
<div class="d-flex align-items-center gap-4">
<span class="d-flex align-items-center gap-2 fw-bold">
<span>
<i class="bi bi-telephone"></i>
</span>
<span>+62 123 4576</span>
</span>

<a aria-controls="offcanvasExample" class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button">
<svg class="bi bi-list" fill="currentColor" height="24" viewbox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
<path d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" fill-rule="evenodd"></path>
</svg>
</a>
</div>
</div>
</nav>

@if(session('success') || session('warning') || $errors->any())
<div class="container mt-3">
  @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
  @if(session('warning'))<div class="alert alert-warning alert-dismissible fade show" role="alert">{{ session('warning') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
  @if($errors->any())<div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
</div>
@endif

<main>
@yield('content')
</main>

<!-- footer -->

<footer class="bg-dark pt-8 footer">

    <div class="container">

        <div class="row">

            {{-- LOGO --}}
            <div class="col-lg-4 col-md-4 col-12">

                <a class="navbar-brand" href="{{ route('home') }}">

                    <span class="d-flex flex-column text-uppercase text-xs fw-bold lh-sm">

                        <span style="letter-spacing: .12rem;">
                            TemuRuang
                        </span>

                    </span>

                </a>

            </div>


            {{-- MENU FOOTER --}}
            <div class="col-lg-8 col-md-6 mb-4 d-flex justify-content-start justify-content-md-end gy-4">

                <ul class="list-unstyled lh-lg d-flex flex-column flex-md-row gap-4">

                    <li>
                        <a class="ft-links text-decoration-none"
                           href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a class="ft-links text-decoration-none"
                           href="{{ route('products') }}">
                            Produk
                        </a>
                    </li>

                    <li>
                        <a class="ft-links text-decoration-none"
                           href="{{ route('about') }}">
                            Tentang Kami
                        </a>
                    </li>

                    <li>
                        <a class="ft-links text-decoration-none"
                           href="{{ route('contact') }}">
                            Kontak
                        </a>
                    </li>

                </ul>

            </div>

        </div>


        {{-- BAGIAN TENGAH --}}
        <div class="row justify-content-center align-items-center pt-lg-8 pb-4">

            <div class="col-lg-6 col-md-6 mb-4">

                <h2 class="display-3 text-white">
                    Kami Membantu Menciptakan Ruang Impian Anda
                </h2>

            </div>


            {{-- SOCIAL MEDIA --}}
            <div class="col-lg-6 col-md-6 mb-4">

                <div class="d-flex gap-3 justify-content-start justify-content-lg-end">

                    <a class="btn btn-outline-light btn-icon"
                       href="https://facebook.com"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a class="btn btn-outline-light btn-icon"
                       href="https://twitter.com"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-twitter"></i>
                    </a>

                    <a class="btn btn-outline-light btn-icon"
                       href="https://instagram.com"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a class="btn btn-outline-light btn-icon"
                       href="https://linkedin.com"
                       target="_blank"
                       rel="noopener noreferrer">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>

            </div>

        </div>


        {{-- EMAIL & KONTAK --}}
        <div class="row justify-content-center align-items-center py-lg-8">

            <div class="col-lg-6 col-md-6 mb-4">

                <div class="d-flex flex-column">

                    <span>Email Id</span>

                    <a href="mailto:temuruang@toko.com"
                       class="h3 fw-light text-white text-decoration-none">
                        temuruang@toko.com
                    </a>

                </div>

            </div>


            <div class="col-lg-6 col-md-6 mb-4">

                <div class="d-flex gap-3 justify-content-lg-end">

                    <a class="btn btn-outline-light"
                       href="{{ route('contact') }}">
                        Kontak kami
                    </a>

                </div>

            </div>

        </div>


        <hr class="bg-secondary">


        {{-- COPYRIGHT --}}
        <div class="row pb-3">

            <div class="col-md-6 text-center text-md-start">

                <p class="mb-0">

                    © {{ date('Y') }} TemuRuang.
                    All rights reserved.

                </p>

            </div>


            {{-- LINK BAWAH --}}
            <div class="col-md-6 text-center text-md-end">

                <a class="ft-links text-decoration-none me-3"
                    Kebijakan Privasi
                </a>

                <a class="ft-links text-decoration-none"
                    Syarat Layanan
                </a>

            </div>

        </div>

    </div>

</footer>

<!-- end footer -->

<div aria-labelledby="offcanvasExampleLabel"
     class="offcanvas offcanvas-end"
     id="offcanvasExample"
     tabindex="-1">

    <div class="offcanvas-header px-4">

        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="d-flex flex-column text-uppercase text-xs fw-bold lh-sm">
                <span style="letter-spacing: .12rem;">Furnish</span>
            </span>
        </a>

        <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            type="button">
        </button>

    </div>

    <div class="offcanvas-body">

        <div class="navbar-custom">

            {{-- MENU UTAMA --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a
                        aria-current="page"
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">
                        Tentang Kami
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('products*') ? 'active' : '' }}"
                        href="{{ route('products') }}">
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}"
                        href="{{ route('testimonials') }}">
                        Testimoni
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">
                        Kontak
                    </a>
                </li>

            </ul>


           {{-- MENU AKUN --}}
<div class="border-top mt-4 pt-4">

    @auth

        <div class="mb-3">
            

            <span class="fw-semibold">
                {{ auth()->user()->name }}
            </span>
        </div>

        <ul class="navbar-nav">

            {{-- KHUSUS BUYER --}}
            @if(auth()->user()->role === 'buyer')

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('buyer.orders.index') }}"
                    >
                        Pesanan Saya
                    </a>
                </li>

            @endif


            {{-- KHUSUS ADMIN --}}
            @if(auth()->user()->role === 'admin')

                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('admin.dashboard') }}"
                    >
                        Admin
                    </a>
                </li>

            @endif


            {{-- LOGOUT --}}
            <li class="nav-item">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="m-0"
                >
                    @csrf

                    <button
                        type="submit"
                        class="nav-link logout-btn"
                    >
                        Logout
                    </button>

                </form>

            </li>

        </ul>

    @else

        <ul class="navbar-nav">

            <li class="nav-item">
                <a
                    class="nav-link"
                    href="{{ route('login') }}"
                >
                    Login
                </a>
            </li>

            <li class="nav-item">
                <a
                    class="nav-link"
                    href="{{ route('register') }}"
                >
                    Daftar
                </a>
            </li>

        </ul>

    @endauth

</div>

            </div>

        </div>

    </div>
</div>
<script>document.addEventListener('DOMContentLoaded',()=>{document.querySelectorAll('[data-checkout]').forEach(btn=>btn.addEventListener('click',()=>{}));});</script>
</body>
</html>
