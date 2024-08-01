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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
             
             $table->unsignedBigInteger("auto_id");
              $table->unsignedBigInteger("klijent_id");
               $table->date("data_wyp");
               $table->date("data_zwr");
               $table->integer("wyp_dni");
                $table->integer("km_wyp");
                  $table->integer("km_zwrot");
            $table->timestamps();
                     $table->foreign('auto_id')->references('id')->on('autos');
                     $table->foreign('klijent_id')->references('id')->on('klijents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(Blueprint $table): void
    {
        Schema::dropIfExists('rents');
        //$table->dropIndex('geo_auto_id_index');
       // $table->dropIndex('geo_klijent_id_index');
        
    }
};
