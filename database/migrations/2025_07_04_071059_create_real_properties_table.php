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
        Schema::create('real_properties', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_properties');
    }
};