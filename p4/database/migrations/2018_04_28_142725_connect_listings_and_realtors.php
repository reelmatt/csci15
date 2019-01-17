<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectListingsAndRealtors extends Migration
{
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            # Add a new INT field called `realtor_id` that has to be unsigned (i.e. positive)
            $table->integer('realtor_id')->unsigned();

            # This field `realtor_id` is a foreign key that connects to the `id` field in the `realtors` table
            $table->foreign('realtor_id')->references('id')->on('realtors');
        });
    }

    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('listings_realtor_id_foreign');

            $table->dropColumn('realtor_id');
        });
    }
}
