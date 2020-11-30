<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remesa', function (Blueprint $table) {
            $table->integer('remesa')->primary();
            $table->dateTime('dateArrive');
            $table->dateTime('dateClose');
            $table->integer('idclient')->index('rClient_idx');
            $table->integer('unitCount');
            $table->decimal('mountTot', 7)->nullable();
            $table->integer('status')->index('rStatus_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remesa');
    }
}
