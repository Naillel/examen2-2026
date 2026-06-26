<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::create('material_unidad', function (Blueprint $table) {
            $table->increments('idMaterialUnidad');
            $table->integer('cantidad');
            $table->unsignedInteger('idUnidad');
            $table->unsignedInteger('codigo');
            $table->timestamps();

            $table->foreign('idUnidad')
                  ->references('idUnidad')
                  ->on('unidades');

            $table->foreign('codigo')
                  ->references('codigo')
                  ->on('materiales');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_unidad');
    }
};
