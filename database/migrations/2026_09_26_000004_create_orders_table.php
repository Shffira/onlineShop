<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('invoice')->unique();
            $table->decimal('total', 12, 2);
            $table->enum('payment_method', ['cod', 'transfer']);
            $table->enum('payment_status', ['menunggu pembayaran', 'menunggu verifikasi', 'dibayar', 'ditolak'])->default('menunggu pembayaran');
            $table->enum('status', ['menunggu pembayaran', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])->default('menunggu pembayaran');
            $table->string('recipient_name');
            $table->string('phone', 30);
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('postal_code', 10);
            $table->text('address');
            $table->string('payment_proof')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
