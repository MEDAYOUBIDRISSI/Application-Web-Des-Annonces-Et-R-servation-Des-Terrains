<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptPubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accept_pubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_val');
            $table->integer('valide');
            $table->unsignedBigInteger('publication_id');
            $table->foreign('publication_id')->references('id')->on('publications');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('accept_pubs');
        $table->dropForeign('accept_pubs_publication_id_foreign');
        $table->dropForeign(['publication_id']);
        $table->dropForeign('accept_pubs_user_id_foreign');
        $table->dropForeign(['user_id']);
    }
}
