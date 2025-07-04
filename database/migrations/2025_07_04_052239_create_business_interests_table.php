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
        Schema::create('business_interests', function (Blueprint $table) {
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
        Schema::dropIfExists('business_interests');
    }
};
