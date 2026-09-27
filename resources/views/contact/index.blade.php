@extends('layouts.app')
@section('title','Contact - Furnish')
@section('content')

<section class="py-lg-8 py-5 text-center">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6">
<h1 class="display-5 mb-3">Hubungi Kami</h1>
<p class="text-muted lead">
          Kami akan senang mendengar dari Anda! Hubungi tim kami untuk pertanyaan atau masukan apa pun.
        </p>
</div>
</div>
</div>
</section>
<section class="py-5">
<div class="container">
<div class="row g-5 align-items-start">
<!-- Contact Info -->
<div class="col-md-4">
<h4 class="mb-4">Hubungi Kami</h4>
<p class="text-muted mb-4">Apakah Anda memiliki pertanyaan tentang produk kami, membutuhkan bantuan, atau hanya ingin berbicara tentang furnitur — kami di sini untuk Anda.</p>
<div class="d-flex align-items-start mb-3">
<i class="bi bi-geo-alt-fill me-3 text-secondary"></i>
<div>
<h5 class="fw-semibold mb-1 text-uppercase text-xs">Alamat</h5>
<p class="text-muted mb-0">123 Jalan Angkasa, Jakarta, Indonesia</p>
</div>
</div>
<div class="d-flex align-items-start mb-3">
<i class="bi bi-envelope-fill me-3 text-secondary"></i>
<div>
<h5 class="fw-semibold mb-1 text-uppercase text-xs">Email
<p class="text-muted mb-0">temuruang@toko.com</p>
</h5></div>
</div>
<div class="d-flex align-items-start mb-3">
<i class="bi bi-telephone-fill me-3 text-secondary"></i>
<div>
<h5 class="fw-semibold mb-1 text-uppercase text-xs">Phone
<p class="text-muted mb-0">+62 123 456 789</p>
</h5></div>
</div>
</div>
<!-- Contact Form -->
<div class="col-md-8">
<div class="card">
<div class="card-body p-lg-5">
<h4 class="mb-4">Kirim Pesan</h4>
<form>
<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Nama Lengkap</label>
<input class="form-control" placeholder="Nama Anda" required="" type="text"/>
</div>
<div class="col-md-6">
<label class="form-label">Email</label>
<input class="form-control" placeholder="you@example.com" required="" type="email"/>
</div>
<div class="col-12">
<label class="form-label">Subject</label>
<input class="form-control" placeholder="Subject" type="text"/>
</div>
<div class="col-12">
<label class="form-label">Message</label>
<textarea class="form-control" placeholder="Write your message here..." rows="5"></textarea>
</div>
<div class="col-12 text-end">
<button class="btn btn-dark px-4" type="submit">Kirim Pesan</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- Map -->
<div class="row mt-5">
<div class="col-12">
<div class="map-container shadow-sm">
<iframe allowfullscreen="" height="350" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.562818737127!2d72.87765531490345!3d19.119677355555584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8f92a2b3a2d%3A0x1a7e7d9b8b94d17a!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1676474830123!5m2!1sen!2sin" style="border:0;" width="100%"></iframe>
</div>
</div>
</div>
</div>
</section>

@endsection
