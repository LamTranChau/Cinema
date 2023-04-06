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
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('filmname');
            $table->string('trailer');
            $table->text('description')->nullable();
            $table->string('start_day');
            $table->string('director');
            $table->string('NSX');
            $table->string('country');
            // $table->string('end_day');
            // $table->string('showing')->default(0);
            // $table->string('hot')->default(0);
            $table->string('image')->nullable();
            $table->string('castes');
            $table->integer('time_film');
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('category');   
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
        Schema::dropIfExists('film');
    }
};
