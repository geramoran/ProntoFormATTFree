<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelplaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relplace', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('locate')->nullable()->index('ubicacion_idx');
            $table->integer('warehouse')->nullable()->index('bodega_idx');
            $table->integer('level')->nullable()->index('nivel_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relplace');
    }
}
