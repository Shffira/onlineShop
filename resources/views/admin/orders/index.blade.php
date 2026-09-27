@extends('layouts.admin')

@section('title', 'Pesanan')

@section('content')

  <div class="mb-4">
    <h4 class="fw-bold mb-0">Daftar Pesanan Masuk</h4>
  </div>

  <div class="card">
    <div class="card-body">
      @if($orders->count())

        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Invoice</th>
                <th>Pembeli</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($orders as $order)
                <tr>
                  <td class="fw-semibold">{{ $order->invoice }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>
                    @foreach($order->orderItems as $item)
                      <div>{{ $item->product_name }} &times;{{ $item->quantity }}</div>
                    @endforeach
                  </td>
                  <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                  <td>
                    <span class="badge bg-label-{{ $order->payment_method === 'cod' ? 'secondary' : 'info' }}">
                      {{ strtoupper($order->payment_method) }}
                    </span>
                    <div class="small text-muted">{{ ucfirst($order->payment_status) }}</div>
                  </td>
                  <td>
                    @php
                      $statusBadge = match($order->status) {
                        'selesai' => 'success',
                        'dikirim' => 'info',
                        'diproses' => 'primary',
                        'menunggu pembayaran' => 'warning',
                        'dibatalkan' => 'danger',
                        default => 'secondary',
                      };
                    @endphp
                    <span class="badge bg-label-{{ $statusBadge }}">{{ ucfirst($order->status) }}</span>
                  </td>
                  <td>
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                      Detail
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          {{ $orders->links() }}
        </div>

      @else

        <div class="text-center py-5">
          <i class="bx bx-receipt bx-lg text-muted"></i>
          <p class="text-muted mb-0 mt-2">Belum ada pesanan.</p>
        </div>

      @endif
    </div>
  </div>

@endsection
