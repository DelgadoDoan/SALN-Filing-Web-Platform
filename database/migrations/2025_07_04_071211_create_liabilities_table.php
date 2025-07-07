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
        Schema::create('liabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saln_id'); // Foreign key
            $table->string('nature')->nullable();
            $table->string('name_creditor')->nullable();
            $table->decimal('outstanding_balance', 15, 2)->nullable();
            $table->timestamps();

            $table->foreign('saln_id')->references('id')->on('salns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liabilities');
    }
};