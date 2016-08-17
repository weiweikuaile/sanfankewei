<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('links',function(Blueprint $table){
            $table->engine = 'MyISAM';
            $table->increments('id')->comment('友情链接主键');
            $table->string('name')->comment('友情链接名称');
            $table->string('title',255)->comment('友情链接标题');
            $table->string('url')->comment('友情链接地址');
            $table->integer('order')->comment('友情链接排序');
            $table->tinyInteger('status')->default('0')->comment('友情链接状态');
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
        Schema::drop('links');
    }
}
