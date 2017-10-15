<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->integer('bus_id')->unsigned()->nullable();
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('start',50);
            $table->string('end',50);
            $table->string('price',10);
            $table->string('distance',10);
            $table->string('interval',20);
            $table->string('work_time',20);
            $table->string('carrier',80);
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
        Schema::dropIfExists('descriptions');
    }
}
