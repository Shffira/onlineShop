@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">
    <h4 class="fw-bold mb-1">Dashboard Admin</h4>
    <p class="text-muted mb-0">
        Selamat datang, {{ auth()->user()->name }}.
    </p>
</div>


{{-- STATISTIK --}}
<div class="row">
    
    {{-- Total Produk --}}
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card h-100">
            <div class="card-body">

                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="bx bx-box"></i>
                        </span>
                    </div>
                </div>

                <span class="fw-semibold d-block mb-1">
                    Total Produk
                </span>

                <h3 class="card-title mb-0">
                    {{ $totalProducts }}
                </h3>

            </div>
        </div>
    </div>


    {{-- Total Pesanan --}}
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card h-100">
            <div class="card-body">

                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="bx bx-receipt"></i>
                        </span>
                    </div>
                </div>

                <span class="fw-semibold d-block mb-1">
                    Total Pesanan
                </span>

                <h3 class="card-title mb-0">
                    {{ $totalOrders }}
                </h3>

            </div>
        </div>
    </div>


    {{-- Total Pembeli --}}
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card h-100">
            <div class="card-body">

                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="bx bx-group"></i>
                        </span>
                    </div>
                </div>

                <span class="fw-semibold d-block mb-1">
                    Total Pembeli
                </span>

                <h3 class="card-title mb-0">
                    {{ $totalBuyers }}
                </h3>

            </div>
        </div>
    </div>


    {{-- Menunggu Pembayaran --}}
    <div class="col-md-6 col-lg-3 mb-4">
        <div class="card h-100">
            <div class="card-body">

                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <span class="avatar-initial rounded bg-label-warning">
                            <i class="bx bx-time-five"></i>
                        </span>
                    </div>
                </div>

                <span class="fw-semibold d-block mb-1">
                    Menunggu Pembayaran
                </span>

                <h3 class="card-title mb-0">
                    {{ $pendingOrders }}
                </h3>

            </div>
        </div>
    </div>

</div>


{{-- PESANAN + KALENDER --}}
<div class="row">

    {{-- PESANAN TERBARU --}}
    <div class="col-lg-8 mb-4">

        <div class="card h-100">

            <div class="card-header d-flex align-items-center justify-content-between">

                <h5 class="card-title m-0">
                    Pesanan Terbaru
                </h5>

                <a href="{{ route('admin.orders.index') }}"
                   class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>

            </div>

            <div class="card-body">

                @if($recentOrders->count())

                    <div class="table-responsive text-nowrap">

                        <table class="table">

                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Pembeli</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">

                                @foreach($recentOrders as $order)

                                    <tr>

                                        <td class="fw-semibold">
                                            {{ $order->invoice }}
                                        </td>

                                        <td>
                                            {{ $order->user->name }}
                                        </td>

                                        <td>
                                            Rp {{ number_format($order->total, 0, ',', '.') }}
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

                                            <span class="badge bg-label-{{ $statusBadge }}">
                                                {{ ucfirst($order->status) }}
                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="text-center py-5">

                        <i class="bx bx-inbox bx-lg text-muted"></i>

                        <p class="text-muted mb-0 mt-2">
                            Belum ada pesanan.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- KALENDER --}}
    <div class="col-lg-4 mb-4">

        <div class="card h-100">

            <div class="card-header">

                <div class="d-flex align-items-center justify-content-between">

                    <h5 class="card-title m-0">
                        Kalender
                    </h5>

                    <div class="calendar-navigation">

                        <button type="button"
                                id="prevMonth"
                                class="calendar-btn">
                            <i class="bx bx-chevron-left"></i>
                        </button>

                        <button type="button"
                                id="nextMonth"
                                class="calendar-btn">
                            <i class="bx bx-chevron-right"></i>
                        </button>

                    </div>

                </div>

            </div>


            <div class="card-body">

                <div class="calendar">

                    {{-- BULAN --}}
                    <div class="calendar-month text-center">
                        <h5 id="calendarMonth" class="fw-bold mb-1"></h5>
                        <small id="calendarToday" class="text-muted"></small>
                    </div>


                    {{-- NAMA HARI --}}
                    <div class="calendar-weekdays">

                        <div>Min</div>
                        <div>Sen</div>
                        <div>Sel</div>
                        <div>Rab</div>
                        <div>Kam</div>
                        <div>Jum</div>
                        <div>Sab</div>

                    </div>


                    {{-- TANGGAL --}}
                    <div id="calendarDays" class="calendar-days"></div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- STYLE KALENDER --}}
<style>

    .calendar-navigation {
        display: flex;
        gap: 5px;
    }

    .calendar-btn {
        width: 32px;
        height: 32px;
        border: 0;
        border-radius: 8px;
        background: #f5f5f9;
        color: #696cff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .calendar-btn:hover {
        background: #696cff;
        color: #fff;
    }

    .calendar-month {
        padding: 5px 0 20px;
    }

    .calendar-month h5 {
        color: #566a7f;
    }

    .calendar-weekdays,
    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }

    .calendar-weekdays {
        margin-bottom: 8px;
    }

    .calendar-weekdays div {
        text-align: center;
        font-size: 12px;
        font-weight: 600;
        color: #a1acb8;
        padding: 5px 0;
    }

    .calendar-days div {
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 13px;
        color: #566a7f;
        cursor: default;
        transition: all 0.2s ease;
    }

    .calendar-days div:not(.empty):hover {
        background: #f1f1f8;
    }

    .calendar-days .today {
        background: #696cff;
        color: #fff;
        font-weight: 600;
        box-shadow: 0 3px 8px rgba(105, 108, 255, 0.25);
    }

    .calendar-days .today:hover {
        background: #696cff;
        color: #fff;
    }

    .calendar-days .empty {
        cursor: default;
    }

    @media (max-width: 991px) {

        .calendar-days div {
            height: 40px;
        }

    }

</style>


{{-- JAVASCRIPT KALENDER --}}
<script>

    document.addEventListener('DOMContentLoaded', function () {

        const calendarMonth = document.getElementById('calendarMonth');
        const calendarToday = document.getElementById('calendarToday');
        const calendarDays = document.getElementById('calendarDays');

        const prevMonth = document.getElementById('prevMonth');
        const nextMonth = document.getElementById('nextMonth');


        const monthNames = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];


        const today = new Date();

        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();


        function renderCalendar() {

            calendarDays.innerHTML = '';


            const firstDay = new Date(
                currentYear,
                currentMonth,
                1
            ).getDay();


            const daysInMonth = new Date(
                currentYear,
                currentMonth + 1,
                0
            ).getDate();


            calendarMonth.textContent =
                monthNames[currentMonth] + ' ' + currentYear;


            calendarToday.textContent =
                'Hari ini: ' +
                today.getDate() + ' ' +
                monthNames[today.getMonth()] + ' ' +
                today.getFullYear();


            // Kotak kosong sebelum tanggal 1
            for (let i = 0; i < firstDay; i++) {

                const emptyDay = document.createElement('div');

                emptyDay.classList.add('empty');

                calendarDays.appendChild(emptyDay);

            }


            // Membuat tanggal
            for (let day = 1; day <= daysInMonth; day++) {

                const dayElement = document.createElement('div');

                dayElement.textContent = day;


                // Tandai tanggal hari ini
                if (
                    day === today.getDate() &&
                    currentMonth === today.getMonth() &&
                    currentYear === today.getFullYear()
                ) {

                    dayElement.classList.add('today');

                }


                calendarDays.appendChild(dayElement);

            }

        }


        // Bulan sebelumnya
        prevMonth.addEventListener('click', function () {

            currentMonth--;

            if (currentMonth < 0) {

                currentMonth = 11;
                currentYear--;

            }

            renderCalendar();

        });


        // Bulan berikutnya
        nextMonth.addEventListener('click', function () {

            currentMonth++;

            if (currentMonth > 11) {

                currentMonth = 0;
                currentYear++;

            }

            renderCalendar();

        });


        renderCalendar();

    });

</script>

@endsection