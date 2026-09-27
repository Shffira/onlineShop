@extends('layouts.app')

@section('title', 'Pesanan Saya')

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

                        {{-- Pesanan Saya --}}
                        <a
                            href="{{ route('buyer.orders.index') }}"
                            class="list-group-item list-group-item-action border-0 px-0 fw-semibold"
                        >
                            <i class="bi bi-bag me-2"></i>
                            Pesanan Saya
                        </a>

                        {{-- Chat Admin --}}
                        <a
                            href="#"
                            class="list-group-item list-group-item-action border-0 px-0"
                        >
                            <i class="bi bi-chat-dots me-2"></i>
                            Chat Admin
                        </a>

                        <hr>

                        {{-- Kembali --}}
                        <a
                            href="{{ route('home') }}"
                            class="list-group-item list-group-item-action border-0 px-0"
                        >
                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali ke Beranda
                        </a>

                        {{-- Logout --}}
                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="list-group-item list-group-item-action border-0 px-0 bg-transparent text-start w-100"
                            >
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        </div>


        {{-- CONTENT --}}
        <div class="col-lg-9">

            <div class="mb-4">

                <h2 class="fw-bold mb-1">
                    Pesanan Saya
                </h2>

                <p class="text-muted mb-0">
                    Lihat dan pantau semua pesanan yang telah kamu buat.
                </p>

            </div>


            @forelse($orders as $order)

                <div class="card border-0 shadow-sm mb-3">

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-start mb-3">

                            <div>

                                <small class="text-muted">
                                    Invoice
                                </small>

                                <h6 class="fw-bold mb-0">
                                    {{ $order->invoice }}
                                </h6>

                            </div>

                            @php
                                $badge = match($order->status) {
                                    'menunggu pembayaran' => 'warning',
                                    'diproses' => 'primary',
                                    'dikirim' => 'info',
                                    'selesai' => 'success',
                                    'dibatalkan' => 'danger',
                                    default => 'secondary',
                                };
                            @endphp

                            <span class="badge bg-{{ $badge }}">
                                {{ ucfirst($order->status) }}
                            </span>

                        </div>


                        @foreach($order->orderItems as $item)

                            <div class="d-flex justify-content-between border-top pt-3 mt-3">

                                <div>

                                    <div class="fw-semibold">
                                        {{ $item->product_name }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $item->quantity }} ×
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </small>

                                </div>

                                <div class="fw-semibold">
                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                </div>

                            </div>

                        @endforeach


                        <div class="border-top mt-3 pt-3 d-flex justify-content-between align-items-center">

                            <div>
                                <small class="text-muted">
                                    Total Pesanan
                                </small>

                                <div class="fw-bold">
                                    Rp {{ number_format($order->total, 0, ',', '.') }}
                                </div>
                            </div>

                            <a
                                href="{{ route('buyer.orders.show', $order) }}"
                                class="btn btn-dark"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-bag-x fs-1 text-muted"></i>

                        <h5 class="fw-bold mt-3">
                            Belum Ada Pesanan
                        </h5>

                        <p class="text-muted">
                            Kamu belum memiliki pesanan.
                        </p>

                        <a
                            href="{{ route('products') }}"
                            class="btn btn-dark"
                        >
                            Mulai Belanja
                        </a>

                    </div>

                </div>

            @endforelse


            <div class="mt-4">
                {{ $orders->links() }}
            </div>

        </div>

    </div>

</div>

@endsection