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

        Schema::table('horaire_driver', function (Blueprint $table) {
            $table->foreign('driver_id')->references('id')->on('driver')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('horaire_id')->references('id')->on('horaire')->onDelete('cascade')->onUpdate('cascade');

        });
        Schema::table('reservation', function (Blueprint $table) {
            $table->unsignedBigInteger('passager_id');
            $table->foreign('passager_id')->references('id')->on('passager')->onDelete('cascade')->onUpdate('cascade');

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
