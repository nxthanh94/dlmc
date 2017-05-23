<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\list_congtrinh;

class ListCTController extends Controller
{
    public function index(){
    	$arItems = list_congtrinh::all();

    	return view('admin.listct.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.listct.add');
    }

    public function postadd(Request $request){
    	$name = $request->name;
    	$arLoaisp	= array(
    		'name' => $name
    	);

    	list_congtrinh::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.listct.index');
    }

    public function getedit($id){
    	$arLoaisp = list_congtrinh::find($id);

    	return view('admin.listct.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, Request $request){
    	$arLoaisp = list_congtrinh::find($id);

    	$arLoaisp->name = $request->name;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.listct.index');
    }

    public function del($id, Request $request){
    	$arLoaisp = list_congtrinh::find($id);
    	$arLoaisp->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.listct.index');
    }
}

