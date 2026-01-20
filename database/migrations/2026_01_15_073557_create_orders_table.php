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
            $table->string('date');
            $table->string('invoice_no');
            $table->string('operator');
            $table->string('fumigation');
            $table->string('cleaning');
            $table->string('service_reference');
            $table->string('service_time');
            $table->string('customer');
            $table->string('address');
            $table->string('contact');
            $table->string('amount');
            $table->string('service_status');
            $table->string('payment_status');
            $table->string('remarks');
            $table->string('attend_id');
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
