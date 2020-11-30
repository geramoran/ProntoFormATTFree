<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpermissions', function (Blueprint $table) {
            $table->integer('iduser')->index('pUser_idx');
            $table->string('recoleccion', 45)->nullable();
            $table->string('recibo', 45)->nullable();
            $table->string('inventario', 45)->nullable();
            $table->string('despacho', 45)->nullable();
            $table->string('catalogos', 45)->nullable();
            $table->string('usuarios', 45)->nullable();
            $table->string('manifiestos', 45)->nullable();
            $table->string('reportes', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userpermissions');
    }
}
