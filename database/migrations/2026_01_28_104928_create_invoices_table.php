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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('service_type')->nullable();
            $table->string('service')->nullable();
            $table->string('service_qty')->nullable();
            $table->string('service_price')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('date')->nullable();
            $table->string('ntn')->nullable();
            $table->string('client_ntn_number')->nullable();
            $table->string('srb')->nullable();
            $table->string('percentage')->nullable();
            $table->string('remarks')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('billing_period')->nullable();
            $table->string('advance_payment')->nullable();
            $table->string('choose_time')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->string('discount')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
