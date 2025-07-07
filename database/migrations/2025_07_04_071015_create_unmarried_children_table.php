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
        Schema::create('unmarried_children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id')->nullable();
            $table->string('name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();

            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unmarried_children');
    }
};