<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('article', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('article_id');
            $table->integer('category2_id');
            $table->string('article_title');
            $table->string('article_info');
            $table->string('article_img');
            $table->string('article_content');
            $table->integer('article_like');
            $table->integer('article_dislike');
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
        //
        Schema::drop('article');
    }
}
