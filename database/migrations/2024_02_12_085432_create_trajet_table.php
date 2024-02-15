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
        Schema::create('trajet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ville_dep_id');
            $table->unsignedBigInteger('ville_arr_id');
            $table->timestamps();
            $table->foreign('ville_dep_id')->references('id')->on('ville')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ville_arr_id')->references('id')->on('ville')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajet');
    }
};
