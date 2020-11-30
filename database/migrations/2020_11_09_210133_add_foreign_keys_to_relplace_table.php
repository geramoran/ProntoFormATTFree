<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRelplaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relplace', function (Blueprint $table) {
            $table->foreign('warehouse', 'bodega')->references('id')->on('warehouse')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('level', 'nivel')->references('id')->on('level')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('locate', 'ubicacion')->references('id')->on('locate')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relplace', function (Blueprint $table) {
            $table->dropForeign('bodega');
            $table->dropForeign('nivel');
            $table->dropForeign('ubicacion');
        });
    }
}
