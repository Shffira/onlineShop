# TemuRuang

TemuRuang adalah website toko online sederhana yang menyediakan berbagai pilihan furniture untuk kebutuhan rumah maupun kantor.

## Fitur

- Landing page dan katalog produk
- Registrasi dan login pembeli
- Detail produk dan checkout
- Pembayaran COD dan transfer
- Upload bukti pembayaran
- Riwayat dan detail pesanan pembeli
- Admin dashboard
- CRUD produk
- Pengelolaan status pesanan
- Middleware dan authorization untuk admin

Relasi	Kardinalitas	Keterangan
Users → Orders	1 : N	Satu user dapat memiliki banyak pesanan
Categories → Products	1 : N	Satu kategori dapat memiliki banyak produk
Orders → Order Items	1 : N	Satu pesanan dapat memiliki banyak detail produk
Products → Order Items	1 : N	Satu produk dapat terdapat pada banyak detail pesanan

## Teknologi

- Laravel
- PHP
- MySQL
- Bootstrap 5
- Vite
- Blade Template

## Instalasi

```bash
git clone [URL_REPOSITORY]
cd nama-project
composer install
npm install
npm run build