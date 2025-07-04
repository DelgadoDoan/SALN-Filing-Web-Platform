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
        Schema::create('personal_properties', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('saln_id'); // Foreign key
        $table->string('description')->nullable();
        $table->string('year_acquired')->nullable();
        $table->decimal('acquisition_cost', 15, 2)->nullable();
        $table->timestamps();

        $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_properties');
    }
};
