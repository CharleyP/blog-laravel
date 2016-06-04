<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategory1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('category1', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('category1_id');
            $table->string('category1_name');
            $table->integer('category1_show');
            $table->string('category1_show_name');
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
        Schema::drop('category1');
    }
}
