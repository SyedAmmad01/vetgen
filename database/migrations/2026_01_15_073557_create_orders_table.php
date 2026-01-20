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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('operator')->nullable();
            $table->string('fumigation')->nullable();
            $table->string('cleaning')->nullable();
            $table->string('service_reference')->nullable();
            $table->string('service_time')->nullable();
            $table->string('customer')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('amount')->nullable();
            $table->string('service_status')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('attend_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
