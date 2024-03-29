<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('email');
            $table->string('password');
            $table->date('dateNaissance')->nullable();
            $table->string('tel');
            $table->string('adresse');
            $table->string('laltitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('ville');
            $table->string('coverture');
            $table->string('url');
            $table->string('type');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
