<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     *  评论列表
     */
    public function getIndex()
    {
        return view('admin.comment.index');
    }

    /**
     *  评论添加
     */
    public function getAdd()
    {
    	return view('admin.comment.add');
    }



}
