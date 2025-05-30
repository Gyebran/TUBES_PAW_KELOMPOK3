<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reporter_id');
            $table->unsignedBigInteger('karya_id');
            $table->text('alasan');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->unsignedBigInteger('handled_by')->nullable();
            $table->timestamps();

            $table->foreign('reporter_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('karya_id')->references('karya_id')->on('karya')->onDelete('cascade');
            $table->foreign('handled_by')->references('user_id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
