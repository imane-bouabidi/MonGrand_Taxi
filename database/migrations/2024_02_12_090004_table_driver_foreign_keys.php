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
        Schema::table('driver', function (Blueprint $table) {

            $table->unsignedBigInteger('taxi_id');
            $table->unsignedBigInteger('trajet_id');
            $table->foreign('taxi_id')->references('id')->on('taxi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('trajet_id')->references('id')->on('trajet')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
