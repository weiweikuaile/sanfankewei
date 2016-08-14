<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i=0; $i < 100; $i++) { 
        	$tem['title'] = str_random(20);
        	$tem['price'] = rand(100,5000);
        	$tem['num'] = rand(1,100);
        	$tem['content'] = str_random(100);
        	$tem['pic'] = str_random(10);
        	$tem['status'] = 1;
        	$data[] = $tem;
        }
        //创建数据
        \DB::table('goods')->insert($data);
    }
}
