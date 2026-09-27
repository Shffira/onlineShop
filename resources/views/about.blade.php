@extends('layouts.app')
@section('title','About - Furnish')
@section('content')

<section class="py-lg-8 py-5 text-center">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6">
<h1 class="display-5 mb-3">Tentang Kami</h1>
<p class="text-muted lead">
          Discover TemuRuang — where modern design meets everyday comfort. We offer quality furniture to help you create a space that feels comfortable, functional, and truly yours.
        </p>
</div>
</div>
</div>
</section>

<section class="py-lg-8 py-5">
<div class="container">
<div class="row align-items-center g-5 mx-lg-8">
<div class="col-md-6">
<img alt="Living room" class="img-fluid" src="{{ asset('images/about.jpg') }}"/>
</div>
<div class="col-md-6">
<div class="ms-lg-8">
<h2 class="mb-3">Misi Kami</h2>
<p class="text-muted">
              Di TemuRuang, misi kami adalah menghadirkan furniture yang memadukan desain modern, kenyamanan, dan fungsionalitas untuk setiap ruang. Kami percaya bahwa furniture bukan hanya pelengkap ruangan, tetapi juga bagian dari suasana dan kenyamanan sebuah rumah.
            </p>
<p class="text-muted">
              Kami berkomitmen menyediakan pilihan furniture dengan desain yang menarik dan kualitas yang baik, sehingga setiap produk dapat membantu menciptakan ruang yang nyaman, fungsional, dan mencerminkan karakter penggunanya.
            </p>
</div>
</div>
</div>
</div>
</section>

<section class="py-lg-9 py-5 bg-light">
<div class="container text-center">
<h2 class="mb-5">Nilai Inti Kami</h2>
<div class="row g-4">
<div class="col-md-4">
<div class="card rounded-0 border-0 shadow-sm h-100 p-4">
<div class="card-body">
<div class="mb-5">
<svg class="bi bi-tree" fill="currentColor" height="42" viewbox="0 0 16 16" width="42" xmlns="http://www.w3.org/2000/svg">
<path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507"></path>
</svg>
</div>
<h3 class="h5">Kenyamanan</h3>
<p class="text-muted">Kami menghadirkan furniture yang dirancang untuk memberikan kenyamanan dan membuat setiap ruang terasa lebih menyenangkan.</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card rounded-0 border-0 shadow-sm h-100 p-4">
<div class="card-body">
<div class="mb-5">
<svg class="bi bi-award" fill="currentColor" height="36" viewbox="0 0 16 16" width="36" xmlns="http://www.w3.org/2000/svg">
<path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702z"></path>
<path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1z"></path>
</svg>
</div>
<h3 class="h5">Kualitas</h3>
<p class="text-muted">Kami memilih produk dengan memperhatikan kualitas bahan, ketahanan, dan kenyamanan agar dapat digunakan dalam jangka panjang.</p>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card rounded-0 border-0 shadow-sm h-100 p-4">
<div class="card-body">
<div class="mb-5">
<svg class="bi bi-pen" fill="currentColor" height="36" viewbox="0 0 16 16" width="36" xmlns="http://www.w3.org/2000/svg">
<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"></path>
</svg>
</div>
<h3 class="h5">Desain</h3>
<p class="text-muted">Kami menghadirkan desain furniture yang modern, sederhana, dan fungsional untuk melengkapi berbagai gaya ruang di rumah maupun kantor.</p>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="py-lg-8 py-5">
<div class="container text-center">
<h2 class="mb-8">Kenalan dengan Tim Kami</h2>
<div class="row g-4">
<div class="col-6 col-md-3">
<div class="mx-md-8">
<img alt="Team member" class="rounded-circle img-fluid mb-3" src="{{ asset('images/avatar/avatar-1.jpg') }}"/>
</div>
<div class="lh-1">
<h3 class="mb-1 h5">Anna Smith</h3>
<p class="text-muted small mb-0">Creative Director</p>
</div>
</div>
<div class="col-6 col-md-3">
<div class="mx-md-8">
<img alt="Team member" class="rounded-circle img-fluid mb-3" src="{{ asset('images/avatar/avatar-2.jpg') }}"/>
</div>
<div class="lh-1">
<h3 class="mb-1 h5">
          Michael Brown</h3>
<p class="text-muted small mb-0">Product Designer</p>
</div>
</div>
<div class="col-6 col-md-3">
<div class="mx-md-8">
<img alt="Team member" class="rounded-circle img-fluid mb-3" src="{{ asset('images/avatar/avatar-3.jpg') }}"/>
</div>
<div class="lh-1">
<h3 class="mb-1 h5">Sarah Johnson</h3>
<p class="text-muted small mb-0">Marketing Head</p>
</div>
</div>
<div class="col-6 col-md-3">
<div class="mx-md-8">
<img alt="Team member" class="rounded-circle img-fluid mb-3" src="{{ asset('images/avatar/avatar-4.jpg') }}"/>
</div>
<div class="lh-1">
<h3 class="mb-1 h5">David Lee</h3>
<p class="text-muted small mb-0">Operations Lead</p>
</div>
</div>
</div>
</div>
</section>

@endsection
