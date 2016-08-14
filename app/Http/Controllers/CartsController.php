<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
	/*
    * 购物车列表  
    */
    public function getIndex()
    {
        return view('admin.cart.index');
    }
    
    /*
    * 购物车添加  
    */
    public function getAdd()
    {
        return view('admin.cart.add');
    }

    


}
