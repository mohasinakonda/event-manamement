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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('worker_type');
            $table->string('worker_description');
            $table->string('worker_image')->nullable();
            $table->text('worker_experience');
            $table->text('worker_skills');
            $table->enum('worker_status', ['active', 'inactive'])->default('active');
            $table->string('hourly_rate');
            $table->integer('experience');

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};