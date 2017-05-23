<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\list_tuyendung;

class ListTDController extends Controller
{
    public function index(){
    	$arItems = list_tuyendung::all();

    	return view('admin.listtd.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.listtd.add');
    }

    public function postadd(Request $request){
    	$name = $request->name;
    	$arLoaisp	= array(
    		'name' => $name
    	);

    	list_tuyendung::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.listtd.index');
    }

    public function getedit($id){
    	$arLoaisp = list_tuyendung::find($id);

    	return view('admin.listtd.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, Request $request){
    	$arLoaisp = list_tuyendung::find($id);

    	$arLoaisp->name = $request->name;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.listtd.index');
    }

    public function del($id, Request $request){
    	$arLoaisp = list_tuyendung::find($id);
    	$arLoaisp->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.listtd.index');
    }
}

