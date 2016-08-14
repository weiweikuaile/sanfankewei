<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id')->comment('商品主键');
            $table->string('title')->comment('商品标题');
            $table->decimal('price',10,2)->comment('商品单价');
            $table->integer('num')->comment('商品库存');
            $table->text('content')->comment('商品详情');
            $table->integer('cid')->comment('商品类别');
            $table->string('pic')->comment('商品图片');
            $table->tinyInteger('status')->comment('商品状态');
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
        Schema::drop('goods');
    }
}
