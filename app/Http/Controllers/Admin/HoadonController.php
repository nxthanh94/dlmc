<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\hoadon;
use App\chitiethoadon;

class HoadonController extends Controller
{
    public function index(){
    	$objHoadon = new hoadon;
    	$arItems = $objHoadon->getList();
        
    	return view('admin.hoadon.index',[
    		'arItems' => $arItems
    	]);
    }

    public function del($id, Request $request){
        $parent = chitiethoadon::where('id_hoadon','=',$id)->count();
        if($parent == 0){
        	$arHoadon = hoadon::find($id);
        	$arHoadon->delete();
        	$request->session()->flash('msg','Xóa thành công');
        	return redirect()->route('admin.hoadon.index');
         }else{
            echo "<script type='text/javascript'>
                    alert('Bạn không thể xóa');
                    window.location = '";
                    echo route('admin.hoadon.index');
            echo "'
                 </script>";
        }
    }

    public function trangthai($id, $status){
        $arChitiet = hoadon::find($id);
        if($status == 0){
            $arChitiet->trangthai = 1; 

        }else{
             $arChitiet->trangthai = 0; 
        }
        $arChitiet->save();

        return redirect()->route('admin.hoadon.index');
    }

   
}
