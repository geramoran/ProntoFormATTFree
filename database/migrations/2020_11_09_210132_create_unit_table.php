<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idstatus')->index('uStatus_idx');
            $table->integer('remesa')->index('uRemesa_idx');
            $table->string('barcode', 20);
            $table->integer('idProduct')->index('uProduct_idx');
            $table->decimal('mount', 7)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit');
    }
}
