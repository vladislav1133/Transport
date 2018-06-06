<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_id')->unsigned()->nullable();
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('restrict')->onUpdate('cascade');

            $table->string('number',10);
            $table->string('type',30);
            $table->string('price',10);
            $table->string('interval',20);
            $table->string('work_time',20);


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
        Schema::dropIfExists('transports');
    }
}
