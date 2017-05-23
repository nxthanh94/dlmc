<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\caidat;

class CaidatController extends Controller
{
    public function index(){
    	$arItems = caidat::all();

    	return view('admin.caidat.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.caidat.add');
    }

    public function postadd(Request $request){
    	$name = $request->name;
    	$name1 = $request->name1;
    	$name2 = $request->name2;
    	$name3 = $request->name3;
    	$name4 = $request->name4;
    	$name5 = $request->name5;
    	$name6 = $request->name6;
    	$name7 = $request->name7;
    	$name8 = $request->name8;
    	$name9 = $request->name9;
        $name10 = $request->name10;
        $name11 = $request->name11;
    	$name12 = $request->name12;
    	$arLoaisp	= array(
    		'name' => $name,
    		'name1' => $name1,
    		'name2' => $name2,
    		'name3' => $name3,
    		'name4' => $name4,
    		'name5' => $name5,
    		'name6' => $name6,
    		'name7' => $name7,
    		'name8' => $name8,
    		'name9' => $name9,
    		'name10' => $name10,
    	);

    	caidat::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.caidat.index');
    }

    public function getedit($id){
    	$arLoaisp = caidat::find($id);

    	return view('admin.caidat.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, Request $request){
    	$arLoaisp = caidat::find($id);

    	$arLoaisp->name = $request->name;
    	$arLoaisp->name1 = $request->name1;
    	$arLoaisp->name2 = $request->name2;
    	$arLoaisp->name3 = $request->name3;
    	$arLoaisp->name4 = $request->name4;
    	$arLoaisp->name5 = $request->name5;
    	$arLoaisp->name6 = $request->name6;
    	$arLoaisp->name7 = $request->name7;
    	$arLoaisp->name8 = $request->name8;
    	$arLoaisp->name9 = $request->name9;
        $arLoaisp->name10 = $request->name10;
        $arLoaisp->name11 = $request->name11;
        $arLoaisp->name12 = $request->name12;
        $arLoaisp->name13 = $request->name13;
        $arLoaisp->name14 = $request->name14;
        $arLoaisp->name15 = $request->name15;
        $arLoaisp->name16 = $request->name16;
        $arLoaisp->name17 = $request->name17;
        $arLoaisp->name18 = $request->name18;
    	$arLoaisp->name19 = $request->name19;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.caidat.edit',$id);
    }

    public function del($id, Request $request){
    	$arLoaisp = caidat::find($id);
    	$arLoaisp->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.caidat.index');
    }
}
