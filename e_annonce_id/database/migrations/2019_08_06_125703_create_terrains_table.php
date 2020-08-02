<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedBigInteger('pack_id');
            $table->foreign('pack_id')->references('id')->on('packs');
            $table->string('nom');
            $table->float('longeur');
            $table->float('largeur');
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
        Schema::dropIfExists('terrains');
        $table->dropForeign('terrains_user_id_foreign');
        $table->dropForeign(['user_id']);
        $table->dropForeign('terrains_categorie_id_foreign');
        $table->dropForeign(['categorie_id']);
        $table->dropForeign('terrains_type_id_foreign');
        $table->dropForeign(['type_id']);
        $table->dropForeign('terrains_pack_id_foreign');
        $table->dropForeign(['pack_id']);
    }
}
