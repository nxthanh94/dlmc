<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\list_dv;
use App\dichvu;

class ListDVController extends Controller
{
    public function index(){
    	$arItems = list_dv::all();

    	return view('admin.listdv.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.listdv.add');
    }

    public function postadd(Request $request){
    	$name = $request->name;
    	$arLoaisp	= array(
    		'name' => $name
    	);

    	list_dv::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.listdv.index');
    }

    public function getedit($id){
    	$arLoaisp = list_dv::find($id);

    	return view('admin.listdv.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, Request $request){
    	$arLoaisp = list_dv::find($id);

    	$arLoaisp->name = $request->name;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.listdv.index');
    }

    public function del($id, Request $request){
    	$arLoaisp = list_dv::find($id);
    	$arLoaisp->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.listdv.index');
    }
}
