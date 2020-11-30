<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unit', function (Blueprint $table) {
            $table->foreign('idProduct', 'uProduct')->references('id')->on('product')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('remesa', 'uRemesa')->references('remesa')->on('remesa')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('idstatus', 'uStatus')->references('id')->on('catalogstatus')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unit', function (Blueprint $table) {
            $table->dropForeign('uProduct');
            $table->dropForeign('uRemesa');
            $table->dropForeign('uStatus');
        });
    }
}
