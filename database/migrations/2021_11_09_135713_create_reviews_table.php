<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_id')->unsigned();
            $table->string('title',100);
            $table->text('description');
            $table->string('author',50);
            $table->integer('rating')->default(1);
            $table->timestamps();

            // add for index
            $table->index('id');

            // add foreign key
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
