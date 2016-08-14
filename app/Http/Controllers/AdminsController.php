<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    /*
    * 后台首页
    */
    public function getIndex()
    {
        return view('admin.index');
    }



}
