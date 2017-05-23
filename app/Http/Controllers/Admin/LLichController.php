<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\list_lich;

class LLichController extends Controller
{
    public function index(){
    	$arItems = list_lich::all();

    	return view('admin.listlich.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.listlich.add');
    }

    public function postadd(Request $request){
    	$name = $request->name;
    	$arLoaisp	= array(
    		'name' => $name
    	);

    	list_lich::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.listlich.index');
    }

    public function getedit($id){
    	$arLoaisp = list_lich::find($id);

    	return view('admin.listlich.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, Request $request){
    	$arLoaisp = list_lich::find($id);

    	$arLoaisp->name = $request->name;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.listlich.index');
    }

    public function del($id, Request $request){
    	$arLoaisp = list_lich::find($id);
    	$arLoaisp->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.listlich.index');
    }
}


