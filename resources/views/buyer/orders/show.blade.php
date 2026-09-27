@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')

<div class="container py-5">

    <div class="row g-4">

        {{-- SIDEBAR --}}
        <div class="col-lg-3">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="mb-4">

                        <small class="text-muted">
                            Akun Saya
                        </small>

                        <h5 class="fw-bold mb-0 mt-1">
                            {{ auth()->user()->name }}
                        </h5>

                    </div>

                    <div class="list-group list-group-flush">

                        <a
                            href="{{ route('buyer.orders.index') }}"
                            class="list-group-item list-group-item-action border-0 px-0"
                        >
                            <i class="bi bi-bag me-2"></i>
                            Pesanan Saya
                        </a>

                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 px-0"
                        >
                            <i class="bi bi-chat-dots me-2"></i>
                            Chat Admin
                        </a>

                        <hr>

                        <a
                            href="{{ route('home') }}"
                            class="list-group-item list-group-item-action border-0 px-0"
                        >
                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali ke Beranda
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- DETAIL --}}
        <div class="col-lg-9">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        Detail Pesanan
                    </h2>

                    <p class="text-muted mb-0">
                        {{ $order->invoice }}
                    </p>

                </div>

                <a
                    href="{{ route('buyer.orders.index') }}"
                    class="btn btn-outline-dark"
                >
                    Kembali
                </a>

            </div>


            {{-- STATUS --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <div class="row">

                        <div class="col-md-6">

                            <small class="text-muted">
                                Status Pesanan
                            </small>

                            <h5 class="fw-bold mt-1">
                                {{ ucfirst($order->status) }}
                            </h5>

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted">
                                Status Pembayaran
                            </small>

                            <h5 class="fw-bold mt-1">
                                {{ ucfirst($order->payment_status) }}
                            </h5>

                        </div>

                    </div>

                </div>

            </div>


            {{-- PRODUK --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Produk
                    </h5>

                </div>

                <div class="card-body">

                    @foreach($order->orderItems as $item)

                        <div class="d-flex justify-content-between border-bottom py-3">

                            <div>

                                <div class="fw-semibold">
                                    {{ $item->product_name }}
                                </div>

                                <small class="text-muted">
                                    {{ $item->quantity }} ×
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </small>

                            </div>

                            <div class="fw-bold">
                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                            </div>

                        </div>

                    @endforeach

                    <div class="d-flex justify-content-between pt-3">

                        <span class="fw-bold">
                            Total
                        </span>

                        <span class="fw-bold fs-5">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- ALAMAT --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Alamat Pengiriman
                    </h5>

                </div>

                <div class="card-body">

                    <h6 class="fw-bold">
                        {{ $order->recipient_name }}
                    </h6>

                    <p class="mb-1">
                        {{ $order->phone }}
                    </p>

                    <p class="mb-1">
                        {{ $order->address }}
                    </p>

                    <p class="mb-0">
                        {{ $order->district }},
                        {{ $order->city }},
                        {{ $order->province }}
                        {{ $order->postal_code }}
                    </p>

                </div>

            </div>


            {{-- PEMBAYARAN --}}
            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">
                        Pembayaran
                    </h5>

                </div>

                <div class="card-body">

                    <p class="mb-2">
                        <strong>Metode:</strong>
                        {{ $order->payment_method === 'cod'
                            ? 'COD'
                            : 'Transfer Bank' }}
                    </p>

                    @if($order->payment_method === 'transfer')

                        @if($order->payment_status === 'menunggu pembayaran')

                            <div class="alert alert-warning">
                                Silakan lakukan pembayaran melalui rekening toko dan upload bukti pembayaran.
                            </div>

                            <a
                                href="#"
                                class="btn btn-dark"
                            >
                                Bayar Sekarang
                            </a>

                        @elseif($order->payment_status === 'menunggu verifikasi')

                            <div class="alert alert-info mb-0">
                                Bukti pembayaran sedang diperiksa oleh admin.
                            </div>

                        @elseif($order->payment_status === 'dibayar')

                            <div class="alert alert-success mb-0">
                                Pembayaran telah diverifikasi.
                            </div>

                        @endif

                    @else

                        <div class="alert alert-secondary mb-0">
                            Pembayaran dilakukan secara COD.
                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection