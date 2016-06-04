<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategory2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('category2', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('category2_id');
            $table->integer('category1_id');
            $table->string('category2_name');
            $table->string('category2_img');
            $table->string('category2_show');
            $table->string('category2_show_name');
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
        Schema::drop('category2');
    }
}
