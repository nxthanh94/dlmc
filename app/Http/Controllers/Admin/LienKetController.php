<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\lienket;

class LienKetController extends Controller
{
    public function index(){
    	$arItems = lienket::all();

    	return view('admin.lienket.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.lienket.add');
    }

    public function postadd(Request $request){
    	$name = $request->name;
    	$link = $request->link;
    	$arLoaisp	= array(
    		'name' => $name,
    		'link' => $link,
    	);

    	lienket::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.lienket.index');
    }

    public function getedit($id){
    	$arLoaisp = lienket::find($id);

    	return view('admin.lienket.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, Request $request){
    	$arLoaisp = lienket::find($id);

    	$arLoaisp->name = $request->name;
    	$arLoaisp->link = $request->link;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.lienket.index');
    }

    public function del($id, Request $request){
    	$arLoaisp = lienket::find($id);
    	$arLoaisp->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.lienket.index');
    }
}

