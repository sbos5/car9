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
        Schema::create('autos', function (Blueprint $table) {
            $table->id("id");
           // $table->unsignedBigInteger("rent_id");
            $table->string("marka");
            $table->string("model");
            $table->integer("przeb1");
             $table->integer("przeb2");
              $table->dateTime("data_wyp");
               $table->dateTime("data_zwr");
            $table->timestamps();
           // $table->foreign('rent_id')->references('id')->on('rents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
