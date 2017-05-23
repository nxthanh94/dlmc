<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LSPRequest;
use App\Http\Controllers\Controller;
use App\loaisp;
use App\sanpham;

class LoaisanphamController extends Controller
{
    public function index(){
    	$arItems = loaisp::all();

    	return view('admin.loaisanpham.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.loaisanpham.add');
    }

    public function postadd(LSPRequest $request){
    	$name = $request->name;
    	$arLoaisp	= array(
    		'tenloai' => $name
    	);

    	loaisp::insert($arLoaisp);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.loaisanpham.index');
    }

    public function getedit($id){
    	$arLoaisp = loaisp::find($id);

    	return view('admin.loaisanpham.edit',[
    		'arLoaisp' => $arLoaisp
    	]);
    }

    public function postedit($id, LSPRequest $request){
    	$arLoaisp = loaisp::find($id);

    	$arLoaisp->tenloai = $request->name;

    	$arLoaisp->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.loaisanpham.index');
    }

    public function del($id, Request $request){
        $parent = sanpham::where('id_hangsx','=',$id)->count();
        if($parent == 0){
        	$arLoaisp = loaisp::find($id);
        	$arLoaisp->delete();

        	$request->session()->flash('msg','Xóa thành công');
        	return redirect()->route('admin.loaisanpham.index');
        }else{
            echo "<script type='text/javascript'>
                    alert('Bạn không thể xóa');
                    window.location = '";
                    echo route('admin.loaisanpham.index');
            echo "'
                 </script>";
        }
    }
}
