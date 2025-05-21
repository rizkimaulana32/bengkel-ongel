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
        Schema::create('items_ordereds', function (Blueprint $table) {
            $table->id('items_ordered_id');
            $table->unsignedBigInteger('appointment_id');
            $table->unsignedBigInteger('spare_part_id');
            $table->integer('amount');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itemsordered');
    }
};
