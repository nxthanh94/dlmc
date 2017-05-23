<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\gioithieu;

class GioithieuController extends Controller
{
    public function index(){
    	$arItems = gioithieu::all();
    	return view('admin.gioithieu.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.gioithieu.add');
    }

    public function postadd(Request $request){
        $mota = $request->mota;
        $visao = $request->chitiet;
    	$name = $request->name;

    	$arGioithieu = array(
            'content' => $mota,
            'visao' => $visao,
    		'name' => $name,
    	);

    	gioithieu::insert($arGioithieu);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.gioithieu.index');
    }

    public function getedit($id){
    	$arGioithieu = gioithieu::find($id);

    	return view('admin.gioithieu.edit',[
    		'arGioithieu' => $arGioithieu
    	]);
    }

    public function postedit($id, Request $request){
    	$arGioithieu = gioithieu::find($id);
        $arGioithieu->content = $request->mota;
        $arGioithieu->visao = $request->chitiet;
    	$arGioithieu->name = $request->name;

    	$arGioithieu->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.gioithieu.index');
    }

     public function del($id, Request $request){
        $arGioithieu = gioithieu::find($id);
        $arGioithieu->delete();
        $request->session()->flash('msg','Xóa thành công');
      	return redirect()->route('admin.gioithieu.index');
    }

}
