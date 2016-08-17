<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$data=[];
        for($i=0;$i<10;$i++){
        	 
            $tem['name']='猪八戒网';
            $tem['title']='商机最好的网站';
            $tem['url']='http://www.pigking.com';
            $tem['order']=str_random(10);
            $tem['status']=0;
        }*/

        $data =[
        [
        	'name' => '人人都是产品经理',
        	'title'=> '国内衬衫最物有所值的网站',
        	'url'=>'http://www.woshipm.com',
        	'order'=>1,
        	'status'=>0,
        ],
        [
        	'name' => '迅雷用户',
        	'title'=> '国内衬衫最物有所值的网站',
        	'url'=>'http://cued.xunlei.com',
        	'order'=>2,
        	'status'=>0,
        ],
         [
        	'name' => '站长基地',
        	'title'=> '国内衬衫最物有所值的网站',
        	'url'=>'http://www.zzjidi.com',
        	'order'=>3,
        	'status'=>0,
        ],
        [
        	'name' => '腾讯大讲堂',
        	'title'=> '国内衬衫最物有所值的网站',
        	'url'=>'http://djt.qq.com',
        	'order'=>4,
        	'status'=>0,
        ],
        [
        	'name' => '阿里巴巴外贸圈',
        	'title'=> '国内衬衫最物有所值的网站',
        	'url'=>'http://waimaoquan.alibaba.com',
        	'order'=>5,
        	'status'=>0,
        ],
        [
        	'name' => '电视之家',
        	'title'=> '国内衬衫最物有所值的网站',
        	'url'=>'http://www.tvhome.com',
        	'order'=>6,
        	'status'=>0,
        ],
        [
        	'name' => '小米',
        	'title'=> '国内衬衫最物有所值的网站',
        	'url'=>'http://www.mi.com',
        	'order'=>7,
        	'status'=>0,
        ]
        ];
        DB::table('links')->insert($data);
    }
}
