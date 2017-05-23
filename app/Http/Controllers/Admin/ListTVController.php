<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\list_thuvien;

class ListTVController extends Controller
{
    public function index(){
    	$arItems = list_thuvien::all();

    	return view('admin.listtv.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.listtv.add');
    }

    public function postadd(Request $request){
    	$name = $request->name;
    	$arLoaisp	= array(
    		'name' => $name
    	);

    	list_thuvien::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.listtv.index');
    }

    public function getedit($id){
    	$arLoaisp = list_thuvien::find($id);

    	return view('admin.listtv.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, Request $request){
    	$arLoaisp = list_thuvien::find($id);

    	$arLoaisp->name = $request->name;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.listtv.index');
    }

    public function del($id, Request $request){
    	$arLoaisp = list_thuvien::find($id);
    	$arLoaisp->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.listtv.index');
    }
}


