<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUnitdeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unitdelivery', function (Blueprint $table) {
            $table->foreign('delivery', 'udDelivery')->references('id')->on('delivery')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('reason', 'udReason')->references('id')->on('catalogstatus')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('visitStatus', 'udStatus')->references('id')->on('catalogstatus')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('unit', 'udUnit')->references('id')->on('unit')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unitdelivery', function (Blueprint $table) {
            $table->dropForeign('udDelivery');
            $table->dropForeign('udReason');
            $table->dropForeign('udStatus');
            $table->dropForeign('udUnit');
        });
    }
}
