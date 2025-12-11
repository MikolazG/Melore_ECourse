<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');

            $table->string('order_id')->unique();

            // SIMPAN DALAM RUPIAH TANPA DESIMAL, CONTOH: 49000, 79000
            $table->unsignedBigInteger('amount');

            $table->string('status')->default('pending');
            $table->string('payment_type')->nullable();
            $table->string('transaction_time')->nullable();

            $table->json('raw_response')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
