<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_buy', function (Blueprint $table) {
            $table->id();
            $table->string('useremail');
            $table->string('userphone');

            $table->string('total_price'); // tong tien
            $table->string('seats'); // ghe
            $table->string('total_seat'); // id ghe

            $table->unsignedBigInteger('showtime_id');
            $table->foreign('showtime_id')->references('id')->on('showtime');
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
        Schema::dropIfExists('users_buy');
    }
};
