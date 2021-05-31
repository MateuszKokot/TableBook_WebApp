<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {

            $table->increments('id_table');
            $table->integer('id_restaurant');
            $table->integer('restaurant_floor');
            $table->integer('table_number');
            $table->string('table_name',50);
            $table->string('table_comment',500);
            $table->boolean('reservable');
            $table->integer('table_model');
            $table->integer('table_zoom_size');
            $table->integer('table_stretch_X');
            $table->integer('table_stretch_Y');
            $table->integer('table_position_X');
            $table->integer('table_position_Y');
            $table->integer('table_rotation');
            $table->integer('chair_model');
            $table->integer('how_many_chairs');
            $table->integer('how_many_chair_slots');
            $table->integer('chair_positions_set_of_setting');
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
        Schema::dropIfExists('tables');
    }
}
