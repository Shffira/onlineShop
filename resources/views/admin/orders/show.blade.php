@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')

  <div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold mb-0">Detail Pesanan {{ $order->invoice }}</h4>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>
  </div>

  <div class="row">
    <div class="col-lg-8 mb-4">

      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title m-0">Produk Dipesan</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order->orderItems as $item)
                  <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="3" class="text-end">Total</th>
                  <th>Rp {{ number_format($order->total, 0, ',', '.') }}</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h5 class="card-title m-0">Alamat Pengiriman</h5>
        </div>
        <div class="card-body">
          <p class="mb-1"><strong>{{ $order->recipient_name }}</strong> ({{ $order->phone }})</p>
          <p class="mb-0">
            {{ $order->address }}, {{ $order->district }}, {{ $order->city }},
            {{ $order->province }} {{ $order->postal_code }}
          </p>
          @if($order->notes)
            <p class="text-muted mt-2 mb-0">Catatan: {{ $order->notes }}</p>
          @endif
        </div>
      </div>

    </div>

    <div class="col-lg-4">

      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title m-0">Pembayaran</h5>
        </div>
        <div class="card-body">
          <p class="mb-1">Metode: <strong>{{ strtoupper($order->payment_method) }}</strong></p>
          <p class="mb-1">Status Pembayaran: <strong>{{ ucfirst($order->payment_status) }}</strong></p>
          @if($order->payment_proof)
            <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">
              <img src="{{ asset('storage/' . $order->payment_proof) }}" class="img-thumbnail mt-2" style="max-width:200px;">
            </a>
          @endif
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h5 class="card-title m-0">Ubah Status Pesanan</h5>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.orders.update', $order) }}">
            @csrf
            @method('PATCH')
            <select name="status" class="form-select mb-3">
              @foreach(['diproses', 'dikirim', 'selesai', 'dibatalkan'] as $status)
                <option value="{{ $status }}" @selected($order->status === $status)>
                  {{ ucfirst($status) }}
                </option>
              @endforeach
            </select>
            <button type="submit" class="btn btn-primary w-100">Update Status</button>
          </form>
        </div>
      </div>

    </div>
  </div>

@endsection
