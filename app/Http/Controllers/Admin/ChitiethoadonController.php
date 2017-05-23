<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chitiethoadon;
use App\hoadon;
use App\sanpham;

class ChitiethoadonController extends Controller
{
    public function index($id){
        $arItems = chitiethoadon::where('id_hoadon','=',$id)->get();
        $id_hoadon = $arItems[0]['id_hoadon'];
        $arHoadon = hoadon::where('id','=',$id_hoadon)->first();
        $tonggia = $arHoadon['tonggia'];
        $tong_gia = number_format($tonggia,0,'','.');
        
    	return view('admin.chitiethoadon.index',[
            'arItems' => $arItems,
    		'tong_gia' => $tong_gia,
    	]);
    }

    public function del($id, Request $request){
    	$arChitiet = chitiethoadon::find($id);
    	$arChitiet->delete();

    	$request->session()->flash('msg','Xóa thành công');
    	return redirect()->route('admin.chitiethoadon.index');
    }

}
