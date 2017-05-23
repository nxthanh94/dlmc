<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\HSXRequest;
use App\Http\Controllers\Controller;
use App\hangsx;
use App\sanpham;

class HangsanxuatController extends Controller
{
    public function index(){
    	$arItems = hangsx::all();

    	return view('admin.hangsanxuat.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.hangsanxuat.add');
    }

    public function postadd(HSXRequest $request){
    	$name = $request->name;

    	$arHangsanxuat = array(
    		'tenhsx' => $name
    	);

    	hangsx::insert($arHangsanxuat);

    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.hangsanxuat.index');
    }

    public function getedit($id){
    	$arHangsanxuat = hangsx::find($id);

    	return view('admin.hangsanxuat.edit',[
    		'arHangsanxuat' => $arHangsanxuat
    	]);
    }

    public function postedit($id, HSXRequest $request){
    	$arHangsanxuat = hangsx::find($id);
    	$arHangsanxuat->tenhsx = $request->name;

    	$arHangsanxuat->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.hangsanxuat.index');
    }

    public function del($id, Request $request){
        $parent = sanpham::where('id_hangsx','=',$id)->count();
        if($parent == 0){
            $arHangsanxuat = hangsx::find($id);
            $arHangsanxuat->delete();
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.hangsanxuat.index');
        }else{
            echo "<script type='text/javascript'>
                    alert('Bạn không thể xóa');
                    window.location = '";
                    echo route('admin.hangsanxuat.index');
            echo "'
                 </script>";
        }
    	

    	
    }
}
