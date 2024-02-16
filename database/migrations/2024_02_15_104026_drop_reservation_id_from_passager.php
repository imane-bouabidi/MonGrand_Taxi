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
        Schema::table('passager', function (Blueprint $table) {
            $table->dropForeign(['reservaion_id']);
            $table->dropColumn('reservaion_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passager', function (Blueprint $table) {
            //
        });
    }
};
