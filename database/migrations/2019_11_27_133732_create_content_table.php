<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 20)->nullable()->comment('Indicates if the content is a movie or series');
            $table->string('name', 120);
            $table->string('cover', 255)->nullable();
            $table->string('wallpaper', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->tinyInteger('year')->nullable();
            $table->string('trailer_url', 255)->nullable();
            $table->string('url', 255);
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
        Schema::dropIfExists('content');
    }
}
