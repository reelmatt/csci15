<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureListingTable extends Migration
{
    public function up()
    {
        Schema::create('feature_listing', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # `feature_id` and `listing_id` will be foreign keys, so they have to be unsigned
            $table->integer('feature_id')->unsigned();
            $table->integer('listing_id')->unsigned();

            # Make foreign keys
            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('listing_id')->references('id')->on('listings');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feature_listing');
    }
}
