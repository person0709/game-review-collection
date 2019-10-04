<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->string('name');
            $table->json('genres');
            $table->json('platforms');
            $table->text('description');
            $table->tinyInteger('score')->unsigned();
            $table->string('image');
            $table->tinyInteger('user_score')->nullable();
            $table->text('user_review')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
