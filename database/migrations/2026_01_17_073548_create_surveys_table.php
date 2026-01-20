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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('survey_number');
            $table->string('date');
            $table->string('services');
            $table->string('contact_person');
            $table->string('contact_details');
            $table->string('time');
            $table->string('address');
            $table->string('assign_to');
            $table->string('amount');
            $table->string('status');
            $table->string('company_name');
            $table->string('current_status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
