<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('storage', function (Blueprint $table) {
            $table->foreign('place', 'wPlace')->references('id')->on('relplace')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('unit', 'wUnit')->references('id')->on('unit')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storage', function (Blueprint $table) {
            $table->dropForeign('wPlace');
            $table->dropForeign('wUnit');
        });
    }
}
