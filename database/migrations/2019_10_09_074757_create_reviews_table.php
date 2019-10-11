<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('game_id');
            $table->primary(['user_id', 'game_id']);
            $table->string('game_name');
            $table->string('game_slug');
            $table->unsignedTinyInteger('rating');
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
