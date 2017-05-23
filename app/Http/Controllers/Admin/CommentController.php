<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\comment;

class CommentController extends Controller
{
    public function index(){
    	$objComment = new comment;
    	$arItems = $objComment->getListCM();
    	return view('admin.comment.index',[
    		'arItems' => $arItems
    	]);
    }

    public function del($id, Request $request){
    	$arComment = comment::find($id);
    	$arComment->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.comment.index');
    }
}