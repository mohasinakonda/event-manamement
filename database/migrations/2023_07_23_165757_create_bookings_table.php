<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('worker_id');
            $table->string('booking_date');
            $table->string('booking_time');
            $table->enum('booking_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->string('booking_description');
            $table->string('booking_address');
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->enum('payment_method', ['cash', 'card'])->default('cash');
            $table->string('total_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};