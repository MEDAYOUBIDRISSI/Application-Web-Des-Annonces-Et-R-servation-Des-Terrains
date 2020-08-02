<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsAccPubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('us_acc_pubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('accept_pub_id');
            $table->foreign('accept_pub_id')->references('id')->on('accept_pubs');
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
        Schema::dropIfExists('us_acc_pubs');
        $table->dropForeign('us_acc_pubs_accept_pub_id_foreign');
        $table->dropForeign(['accept_pub_id']);
        $table->dropForeign('us_acc_pubs_user_id_foreign');
        $table->dropForeign(['user_id']);
    }
}
