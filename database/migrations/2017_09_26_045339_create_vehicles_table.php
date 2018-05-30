<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('transport_id')->unsigned()->nullable();
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('restrict')->onUpdate('cascade');

            $table->string('number',10);
            $table->integer('direction');
            $table->double('lon',15,8)->default(0);
            $table->double('lat',15,8)->default(0);
            $table->string('token');

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
        Schema::dropIfExists('vehicles');
    }
}
