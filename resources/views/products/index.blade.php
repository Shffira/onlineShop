@extends('layouts.app')

@section('title', 'Produk - Furnish')

@section('content')

<section class="py-lg-8 py-5">
  <div class="container">

    <div class="row mb-5">
      <div class="col-lg-8">
        <h1 class="display-6 mb-0">Produk</h1>
        <p class="text-muted">Temukan furniture terbaik untuk melengkapi ruangan Anda.</p>
      </div>
    </div>

    <div class="row g-4">

      <div class="col-lg-3">
        <h6 class="text-uppercase text-xs fw-bold mb-3">Kategori</h6>
        <div class="list-group">
          <a href="{{ route('products') }}"
            class="list-group-item list-group-item-action {{ !request('category') ? 'active' : '' }}">
            Semua Produk
          </a>
          @foreach($categories as $category)
            <a href="{{ route('products', ['category' => $category->slug]) }}"
              class="list-group-item list-group-item-action {{ request('category') === $category->slug ? 'active' : '' }}">
              {{ $category->name }}
            </a>
          @endforeach
        </div>
      </div>

      <div class="col-lg-9">
        <div class="row g-4">
          @forelse($products as $product)
            <div class="col-md-4">
              <div class="card h-100 border-0">
                <a href="{{ route('products.show', $product) }}">
                  <img src="{{ $product->image_url }}" class="img-fluid" alt="{{ $product->name }}">
                </a>
                <div class="pt-3">
                  <p class="text-muted text-uppercase text-xs mb-1">{{ $product->category->name ?? '' }}</p>
                  <h3 class="h6 mb-1">
                    <a href="{{ route('products.show', $product) }}" class="text-dark text-decoration-none">
                      {{ $product->name }}
                    </a>
                  </h3>
                  <p class="mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                  <a href="{{ route('checkout', ['product' => $product->slug, 'from' => 'products']) }}"
                  class="btn btn-sm btn-primary">
                    Checkout
                </a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12 text-center py-5 text-muted">
              Belum ada produk yang tersedia.
            </div>
          @endforelse
        </div>

        <div class="mt-5">
          {{ $products->links() }}
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
