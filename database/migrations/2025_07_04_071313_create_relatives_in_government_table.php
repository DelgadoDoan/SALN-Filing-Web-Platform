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
        Schema::create('relative_in_governments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id');
            $table->string('name_relative')->nullable();
            $table->string('relationship')->nullable();
            $table->string('position')->nullable();
            $table->string('name_agency')->nullable();
            $table->timestamps();

            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relative_in_governments');
    }
};