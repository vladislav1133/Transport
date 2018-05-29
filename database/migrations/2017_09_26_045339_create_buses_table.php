<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_transport', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('description_id')->unsigned()->nullable();
            $table->foreign('description_id')->references('id')->on('descriptions')->onDelete('restrict')->onUpdate('cascade');

            $table->integer('route_id')->unsigned()->nullable();
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('restrict')->onUpdate('cascade');

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
        Schema::dropIfExists('buses');
    }
}
