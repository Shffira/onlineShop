@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')

  <div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold mb-0">Edit Produk</h4>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products._form')
      </form>
    </div>
  </div>

@endsection