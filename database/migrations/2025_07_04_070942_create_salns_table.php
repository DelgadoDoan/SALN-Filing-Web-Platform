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
        Schema::create('salns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            
            // Form metadata
            $table->date('asof_date')->nullable();
            $table->string('filing_type')->nullable();
            
            // Declarant information
            $table->string('declarant_family_name')->nullable();
            $table->string('declarant_first_name')->nullable();
            $table->string('declarant_mi')->nullable();
            
            // Declarant home address
            $table->string('declarant_house_number')->nullable();
            $table->string('declarant_house_street')->nullable();
            $table->string('declarant_house_subdivision')->nullable();
            $table->string('declarant_house_barangay')->nullable();
            $table->string('declarant_house_city')->nullable();
            $table->string('declarant_house_region')->nullable();
            $table->string('declarant_house_zip')->nullable();
            
            // Declarant office
            $table->string('declarant_position')->nullable();
            $table->string('declarant_office_name')->nullable();

            // Declarant office address
            $table->string('declarant_office_number')->nullable();
            $table->string('declarant_office_street')->nullable();
            $table->string('declarant_office_city')->nullable();
            $table->string('declarant_office_region')->nullable();
            $table->string('declarant_office_zip')->nullable();
            
            // Totals
            $table->decimal('subtotal_real', 15, 2)->nullable();
            $table->decimal('subtotal_personal', 15, 2)->nullable();
            $table->decimal('total_assets', 15, 2)->nullable();
            $table->decimal('subtotal_liabilities', 15, 2)->nullable();
            $table->decimal('net_worth', 15, 2)->nullable();
            
            // Certification
            $table->date('cert_date')->nullable();
            $table->string('gov_id_declarant')->nullable();
            $table->string('id_no_declarant')->nullable();
            $table->date('id_date_declarant')->nullable();
            $table->string('gov_id_spouse')->nullable();
            $table->string('id_no_spouse')->nullable();
            $table->date('id_date_spouse')->nullable();
            
            // Flags
            $table->boolean('no_business_interest')->default(false);
            $table->boolean('no_relatives_in_government')->default(false);
            $table->boolean('is_completed')->default(false);
            
            $table->timestamps();
            
            // Indexes
            $table->index(['user_id', 'created_at']);
            $table->index('session_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salns');
    }
};