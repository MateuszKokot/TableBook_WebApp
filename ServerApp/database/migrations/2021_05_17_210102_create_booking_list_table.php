<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_list', function (Blueprint $table) {
            $table->increments('id_booking');
            $table->integer('id_restaurant');
            $table->integer('id_user');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->string('booking_length');
            $table->integer('booking_table_number');
            $table->integer('booking_number_people');
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
        Schema::dropIfExists('reservation_list');
    }
}
