@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')

  <div class="mb-4 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold mb-0">Tambah Produk</h4>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm">
      <i class="bx bx-arrow-back"></i> Kembali
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @include('admin.products._form')
      </form>
    </div>
  </div>

@endsection