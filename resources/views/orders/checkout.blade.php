@extends('layouts.app')
@section('title','Checkout - Furnish')
@section('content')
<section class="py-lg-8 py-5"><div class="container"><div class="row g-5"><div class="col-lg-5"><img src="{{ $product->image_url }}" class="img-fluid mb-4" alt="{{ $product->name }}"><h2 class="h3">{{ $product->name }}</h2><p class="lead">Rp {{ number_format($product->price,0,',','.') }}</p></div>
<div class="col-lg-7">
    <div class="d-flex align-items-center gap-3 mb-4">
        

        <div class="d-flex align-items-center gap-3 mb-4">
        <a
            href="{{ $from === 'home' ? route('home') : route('products') }}"
            class="btn btn-outline-secondary"
        >
            ← Kembali
        </a>

        <h1 class="display-6 mb-0">Checkout</h1>
    </div>
    </div>
        <form method="POST" 
        action="{{ route('orders.store',$product) }}" 
        enctype="multipart/form-data">
        @csrf<div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama Penerima</label>
                <input name="recipient_name" 
                class="form-control" 
                value="{{ old('recipient_name',auth()->user()->name) }}" required></div>
                
                <div class="col-md-6"><label 
                class="form-label">Nomor HP</label>
                <input name="phone" class="form-control" 
                value="{{ old('phone') }}" required></div>
                
                <div class="col-md-6"><label class="form-label">Provinsi</label>
                <input name="province" class="form-control" 
                value="{{ old('province') }}" required></div>
                <div class="col-md-6"><label class="form-label">Kota/Kabupaten</label>
                <input name="city" class="form-control" value="{{ old('city') }}" required></div>
                
                <div class="col-md-6"><label class="form-label">Kecamatan</label>
                <input name="district" class="form-control" value="{{ old('district') }}" required></div>
                
                <div class="col-md-6"><label class="form-label">Kode Pos</label>
                <input name="postal_code" class="form-control" value="{{ old('postal_code') }}" required></div>
                
                <div class="col-12"><label class="form-label">Alamat Lengkap</label><textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea></div><div class="col-md-6"><label class="form-label">Jumlah</label><input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="{{ old('quantity',1) }}" class="form-control" required></div><div class="col-md-6"><label class="form-label">Metode Pembayaran</label><select name="payment_method" id="payment_method" class="form-select" required><option value="cod">COD</option><option value="transfer">Transfer</option></select></div><div class="col-12" id="proof-wrap" style="display:none"><label class="form-label">Bukti Transfer</label><input type="file" name="payment_proof" class="form-control" accept="image/*"><small class="text-muted">Wajib untuk pembayaran transfer.</small></div><div class="col-12"><label class="form-label">Catatan</label><textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea></div><div class="col-12"><button class="btn btn-primary btn-lg">Buat Pesanan</button></div></div></form></div></div></div></section><script>document.getElementById('payment_method').addEventListener('change',function(){document.getElementById('proof-wrap').style.display=this.value==='transfer'?'block':'none';});</script>
@endsection
