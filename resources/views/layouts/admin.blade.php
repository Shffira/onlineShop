@php
    use App\Models\Order;

    $notificationOrders = Order::with('user')
        ->where(function ($query) {
            $query->where('status', 'menunggu pembayaran')
                  ->orWhere('payment_status', 'menunggu verifikasi');
        })
        ->latest()
        ->take(5)
        ->get();

    $notificationCount = $notificationOrders->count();
@endphp
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
  data-assets-path="{{ asset('assets/admin/') }}/" data-template="vertical-menu-template-free">
<style>
    .notification-dropdown {
        width: 360px;
        max-width: 90vw;
        padding: 0;
    }

    .badge-notifications {
        position: absolute;
        top: 3px;
        right: 0;
        min-width: 18px;
        height: 18px;
        padding: 2px 5px;
        font-size: 10px;
        line-height: 14px;
    }

    .notification-item {
        padding: 14px 16px !important;
        white-space: normal;
        transition: background-color 0.2s ease;
    }

    .notification-item:hover {
        background-color: #f8f8fa;
    }

    .notification-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .dropdown-notifications > .dropdown-toggle::after {
        display: none;
    }

    @media (max-width: 576px) {
        .notification-dropdown {
            width: 320px;
        }
    }
</style>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title', 'Dashboard') - Admin tokoOnline</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon/favicon.ico') }}" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/boxicons.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  @stack('styles')

  <script src="{{ asset('assets/admin/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/admin/js/config.js') }}"></script>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">tokoOnline</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">

          <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div>Dashboard</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kelola Toko</span>
          </li>

          <li class="menu-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <a href="{{ route('admin.products.index') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div>Produk</div>
            </a>
          </li>

          <li class="menu-item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <a href="{{ route('admin.orders.index') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-receipt"></i>
              <div>Pesanan</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Umum</span>
          </li>

          <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Lihat Toko</div>
            </a>
          </li>

        </ul>
      </aside>
      <!-- / Menu -->

      <div class="layout-page">

        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <h6 class="mb-0 fw-semibold">@yield('title', 'Dashboard')</h6>
            </div>

            <ul class="navbar-nav flex-row align-items-center ms-auto">

    {{-- NOTIFIKASI --}}
    <li class="nav-item navbar-dropdown dropdown-notifications dropdown me-3">

        <a
            class="nav-link dropdown-toggle hide-arrow"
            href="javascript:void(0);"
            data-bs-toggle="dropdown"
            data-bs-auto-close="outside"
            aria-expanded="false"
        >

            <i class="bx bx-bell bx-sm"></i>

            @if($notificationCount > 0)
                <span class="badge rounded-pill bg-danger badge-notifications">
                    {{ $notificationCount }}
                </span>
            @endif

        </a>


        <ul class="dropdown-menu dropdown-menu-end notification-dropdown">

            {{-- HEADER --}}
            <li>
                <div class="dropdown-header d-flex align-items-center justify-content-between">

                    <div>
                        <h6 class="mb-0">
                            Notifikasi
                        </h6>

                        <small class="text-muted">
                            Pesanan terbaru
                        </small>
                    </div>

                    @if($notificationCount > 0)
                        <span class="badge bg-label-primary">
                            {{ $notificationCount }} baru
                        </span>
                    @endif

                </div>
            </li>


            <li>
                <div class="dropdown-divider"></div>
            </li>


            {{-- DAFTAR NOTIFIKASI --}}
            @if($notificationOrders->count() > 0)

                @foreach($notificationOrders as $notification)

                    <li>

                        <a
                            href="{{ route('admin.orders.show', $notification) }}"
                            class="dropdown-item notification-item"
                        >

                            <div class="d-flex align-items-start">

                                {{-- ICON --}}
                                <div class="flex-shrink-0 me-3">

                                    <span class="avatar-initial rounded bg-label-warning notification-icon">
                                        <i class="bx bx-shopping-bag"></i>
                                    </span>

                                </div>


                                {{-- ISI --}}
                                <div class="flex-grow-1">

                                    <h6 class="mb-1 fw-semibold">
                                        Pesanan baru
                                    </h6>

                                    <p class="mb-1 small">
                                        {{ $notification->invoice }}
                                    </p>

                                    <small class="text-muted">

                                        {{ $notification->user->name }}

                                        •

                                        Rp {{ number_format($notification->total, 0, ',', '.') }}

                                    </small>

                                    <br>

                                    <small class="text-muted">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </small>

                                </div>

                            </div>

                        </a>

                    </li>

                @endforeach

            @else

                {{-- JIKA TIDAK ADA PESANAN --}}
                <li>

                    <div class="text-center py-4 px-3">

                        <i class="bx bx-check-circle text-success"
                           style="font-size: 40px;">
                        </i>

                        <h6 class="mt-2 mb-1">
                            Tidak ada pesanan baru
                        </h6>

                        <small class="text-muted">
                            Semua pesanan sudah ditangani.
                        </small>

                    </div>

                </li>

            @endif


            <li>
                <div class="dropdown-divider"></div>
            </li>


            {{-- LIHAT SEMUA --}}
            <li>

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="dropdown-item text-center text-primary fw-semibold"
                >
                    Lihat Semua Pesanan
                </a>

            </li>

        </ul>

    </li>


    {{-- PROFILE ADMIN --}}
    <li class="nav-item navbar-dropdown dropdown-user dropdown">

        


        <ul class="dropdown-menu dropdown-menu-end">

            <li>

                <a class="dropdown-item" href="javascript:void(0);">

                    <div class="d-flex">

                        <div class="flex-grow-1">

                            <span class="fw-semibold d-block">
                                {{ auth()->user()->name }}
                            </span>

                            <small class="text-muted">
                                {{ ucfirst(auth()->user()->role) }}
                            </small>

                        </div>

                    </div>

                </a>

            </li>


            <li>
                <div class="dropdown-divider"></div>
            </li>


            <li>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        type="submit"
                        class="dropdown-item"
                    >

                        <i class="bx bx-power-off me-2"></i>

                        <span class="align-middle">
                            Log Out
                        </span>

                    </button>

                </form>

            </li>

        </ul>

    </li>

</ul>
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <span class="avatar-initial rounded-circle bg-primary d-flex align-items-center justify-content-center text-white">
                      {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <div class="d-flex">
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                          <small class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li><div class="dropdown-divider"></div></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            @if (session('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            @yield('content')
          </div>

          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                &copy; {{ date('Y') }} tokoOnline Admin Panel
              </div>
            </div>
          </footer>

          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <script src="{{ asset('assets/admin/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/admin/js/main.js') }}"></script>

  @stack('scripts')
</body>
</html>