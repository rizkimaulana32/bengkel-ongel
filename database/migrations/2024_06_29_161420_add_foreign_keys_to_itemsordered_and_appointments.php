<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('items_ordereds', function (Blueprint $table) {
            $table->foreign('appointment_id')
                  ->references('appointment_id')
                  ->on('appointments')
                  ->onDelete('cascade');

            $table->foreign('spare_part_id')
                  ->references('spare_part_id')
                  ->on('spare_parts')
                  ->onDelete('cascade');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('items_ordereds', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);
            $table->dropForeign(['sparepart_id']);
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
;
