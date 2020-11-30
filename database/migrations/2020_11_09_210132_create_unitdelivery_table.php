<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitdeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitdelivery', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('unit')->index('udUnit_idx');
            $table->integer('delivery')->index('udDelivery_idx');
            $table->integer('visitStatus')->index('udStatus_idx');
            $table->integer('reason')->nullable()->index('udReason_idx');
            $table->dateTime('visitDate')->nullable();
            $table->string('comment')->nullable();
            $table->string('isMount', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unitdelivery');
    }
}
