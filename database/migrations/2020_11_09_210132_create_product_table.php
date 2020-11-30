<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idClient')->unique('idCliente_UNIQUE');
            $table->decimal('costoEntrega', 10);
            $table->decimal('costoDevolucion', 10);
            $table->decimal('Peso', 7, 4);
            $table->decimal('comisionEntrega', 10);
            $table->decimal('comisionDevolucion', 10);
            $table->integer('tiempoCierre');
            $table->integer('nivelServicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
