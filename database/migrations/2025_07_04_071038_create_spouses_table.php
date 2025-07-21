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
        Schema::create('spouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id');
            $table->string('family_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('mi')->nullable();

            $table->boolean('same_house_as_declarant')->default(false);
            $table->boolean('same_office_as_declarant')->default(false);

            $table->string('house_number')->nullable();
            $table->string('house_street')->nullable();
            $table->string('house_subdivision')->nullable();
            $table->string('house_barangay')->nullable();
            $table->string('house_city')->nullable();
            $table->string('house_region')->nullable();
            $table->string('house_zip')->nullable();
            
            $table->string('position')->nullable();
            $table->string('office_name')->nullable();

            $table->string('office_number')->nullable();
            $table->string('office_street')->nullable();
            $table->string('office_city')->nullable();
            $table->string('office_region')->nullable();
            $table->string('office_zip')->nullable();

            $table->string('gov_id')->nullable();
            $table->string('id_no')->nullable();
            $table->date('id_date')->nullable();

            $table->timestamps();

            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spouses');
    }
};