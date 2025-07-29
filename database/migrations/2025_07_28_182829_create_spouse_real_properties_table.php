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
        Schema::create('spouse_child_real_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id');
            $table->string('description')->nullable();
            $table->string('kind')->nullable();
            $table->string('location')->nullable();
            $table->string('assessed_value')->nullable();
            $table->string('market_value')->nullable();
            $table->string('acquisition_year')->nullable();
            $table->string('acquisition_mode')->nullable();
            $table->string('acquisition_cost')->nullable();
            $table->timestamps();
    
            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });

        Schema::create('spouse_child_personal_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id'); // Foreign key
            $table->string('description')->nullable();
            $table->string('year_acquired')->nullable();
            $table->decimal('acquisition_cost', 15, 2)->nullable();
            $table->timestamps();

            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });

        Schema::create('spouse_child_liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id'); // Foreign key
            $table->string('nature')->nullable();
            $table->string('name_creditor')->nullable();
            $table->decimal('outstanding_balance', 15, 2)->nullable();
            $table->timestamps();

            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });

        Schema::create('spouse_child_business_interests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id'); // Foreign key
            $table->string('name_business')->nullable();
            $table->string('address_business')->nullable();
            $table->string('nature_business')->nullable();
            $table->date('date_interest')->nullable();
            $table->timestamps();

            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spouse_child_real_properties');
        Schema::dropIfExists('spouse_child_personal_properties');
        Schema::dropIfExists('spouse_child_liabilities');
        Schema::dropIfExists('spouse_child_business_interests');
    }
};
