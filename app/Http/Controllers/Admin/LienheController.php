<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\phanhoi;

class LienheController extends Controller
{
    public function index(){
     	$arItems = phanhoi::all();

    	return view('admin.lienhe.index',[
    		'arItems' => $arItems
    	]);
    }

    public function del($id, Request $request){
    	$arLienhe = phanhoi::find($id);
    	$arLienhe->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.lienhe.index');
    }
}
