<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ThanhtoanRequest;
use App\Http\Controllers\Controller;
use App\thanhtoan;

class ThanhtoanController extends Controller
{
    public function index(){
    	$arItems = thanhtoan::all();

    	return view('admin.thanhtoan.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.thanhtoan.add');
    }

    public function postadd(ThanhtoanRequest $request){
    	$loaithanhtoan = $request->name;

    	$arThanhtoan = array(
    	'loaithanhtoan' => $loaithanhtoan
    	);

    	thanhtoan::insert($arThanhtoan);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.thanhtoan.index');
    }

    public function getedit($id){
    	$arThanhtoan = thanhtoan::find($id);

    	return view('admin.thanhtoan.edit',[
    		'arThanhtoan' => $arThanhtoan
    	]);
    }

    public function postedit($id, ThanhtoanRequest $request){
    	$arThanhtoan = thanhtoan::find($id);
    	$arThanhtoan->loaithanhtoan = $request->name;
    	$arThanhtoan->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.thanhtoan.index');	
    }

    public function del($id, Request $request){
    	$arThanhtoan = thanhtoan::find($id);
    	$arThanhtoan->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.thanhtoan.index');
    }
}
