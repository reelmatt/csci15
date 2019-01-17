<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtorsTable extends Migration
{
    public function up()
    {
        Schema::create('realtors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('company');
            $table->string('phone');
            $table->string('email');
        });
    }

    public function down()
    {
        Schema::dropIfExists('realtors');
    }
}
