<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRemesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remesa', function (Blueprint $table) {
            $table->foreign('idclient', 'rClient')->references('id')->on('client')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('status', 'rStatus')->references('id')->on('catalogstatus')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remesa', function (Blueprint $table) {
            $table->dropForeign('rClient');
            $table->dropForeign('rStatus');
        });
    }
}
