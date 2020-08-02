<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_reservation');
            // $table->string('heure');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('terrain_id');
            $table->foreign('terrain_id')->references('id')->on('terrains');
            $table->unsignedBigInteger('heure_id');
            $table->foreign('heure_id')->references('id')->on('heures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservers');
        $table->dropForeign('reservers_user_id_foreign');
        $table->dropForeign(['user_id']);
        $table->dropForeign('reservers_pack_id_foreign');
        $table->dropForeign(['pack_id']);
    }
}
