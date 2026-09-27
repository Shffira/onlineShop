@extends('layouts.admin')

@section('title', 'Produk')

@section('content')

  <div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold mb-0">Kelola Produk</h4>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
      <i class="bx bx-plus"></i> Tambah Produk
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      @if($products->count())

        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach($products as $product)
                <tr>
                  <td>
                    <img src="{{ $product->image_url }}"
                      style="width:48px;height:48px;object-fit:cover;border-radius:.4rem;">
                  </td>
                  <td class="fw-semibold">{{ $product->name }}</td>
                  <td>{{ $product->category->name ?? '-' }}</td>
                  <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                  <td>{{ $product->stock }}</td>
                  <td>
                    @if($product->is_active)
                      <span class="badge bg-label-success">Aktif</span>
                    @else
                      <span class="badge bg-label-secondary">Nonaktif</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('admin.products.edit', $product) }}"
                      class="btn btn-sm btn-icon btn-outline-primary">
                      <i class="bx bx-edit"></i>
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Hapus produk ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-icon btn-outline-danger">
                        <i class="bx bx-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          {{ $products->links() }}
        </div>

      @else

        <div class="text-center py-5">
          <i class="bx bx-box bx-lg text-muted"></i>
          <p class="text-muted mb-0 mt-2">Belum ada produk.</p>
        </div>

      @endif
    </div>
  </div>

@endsection
