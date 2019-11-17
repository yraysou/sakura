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
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('conf_pass');
            $table->string('tel_number');
            $table->integer('manager_id');            
            $table->string('original')->nullable();
            $table->string('print')->nullable();
            $table->string('es')->nullable();
            $table->string('originalPath')->nullable();
            $table->string('printPath')->nullable();
            $table->string('esPath')->nullable();
            $table->date('shooting_date');
            $table->date('a_year_later');
            $table->integer('agreement_status')->default(0);           
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
