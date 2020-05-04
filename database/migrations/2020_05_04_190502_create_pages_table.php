<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_headline')->unique();
            $table->string('slug')->unique();
            $table->string('page_title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('page_content');
            $table->string('image')->default('default.png');
            $table->boolean('display_image_on_left')->default(true);
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
        Schema::dropIfExists('pages');
    }
}
