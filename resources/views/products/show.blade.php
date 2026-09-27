@extends('layouts.app')
@section('title',$product->name.' - Furnish')
@section('content')
<section class="py-lg-8 py-5"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6"><img src="{{ $product->image_url }}" class="img-fluid" alt="{{ $product->name }}"></div><div class="col-lg-6"><p class="text-muted text-uppercase text-xs">{{ $product->category->name ?? 'Furniture' }}</p><h1 class="display-5">{{ $product->name }}</h1><p class="lead">{{ $product->description }}</p><h3 class="mb-3">Rp {{ number_format($product->price,0,',','.') }}</h3><p>Stok tersedia: {{ $product->stock }}</p><a href="{{ route('checkout',$product) }}" class="btn btn-primary">Checkout Sekarang</a></div></div></div></section>
@endsection
