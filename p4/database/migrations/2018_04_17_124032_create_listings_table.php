<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            # Add a Primary, Auto-Incrementing field
            $table->increments('id');

            # Add 'created_at' and 'updated_at' columns
            $table->timestamps();

            #Rest of the fields
            $table->string('address');
            $table->string('city');
            $table->char('state', 2);
            $table->string('zip');

            $table->integer('price')->nullable();
            $table->date('date_available')->nullable();
            $table->string('reference_url')->nullable();

            $table->tinyInteger('beds')->nullable();
            $table->tinyInteger('baths')->nullable();
            $table->smallInteger('sqft')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
