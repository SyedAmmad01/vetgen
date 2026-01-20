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
        Schema::create('contract_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('contact_person_name');
            $table->string('designation');
            $table->string('contact_person_mobile');
            $table->string('email_address');
            $table->string('ntn_number');
            $table->string('invoice_mode');
            $table->string('po_number');
            $table->string('date_of_contract_execution');
            $table->string('date_of_contract_renewal');
            $table->string('monthly_number_of_services');
            $table->string('scope_of_work');
            $table->string('service_execution');
            $table->string('time_of_service');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_profiles');
    }
};
