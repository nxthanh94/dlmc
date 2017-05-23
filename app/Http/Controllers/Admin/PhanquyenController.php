<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PhanquyenRequest;
use App\Http\Controllers\Controller;
use App\phanquyen;
use App\User;

class PhanquyenController extends Controller
{
    public function index(){
    	$arItems = phanquyen::all();

    	return view('admin.phanquyen.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.phanquyen.add');
    }

    public function postadd(PhanquyenRequest $request){
    	$name = $request->name;

    	$arPhanquyen = array(
    		'tenpq' => $name
    	);

    	phanquyen::insert($arPhanquyen);

    	$request->session()->flash('msg','Thêm thành công');
        return redirect()->route('admin.phanquyen.index');
    }

    public function getedit($id){
    	$arPhanquyen = phanquyen::find($id);

    	return view('admin.phanquyen.edit',[
    		'arPhanquyen' => $arPhanquyen
    	]);
    }

    public function postedit($id, PhanquyenRequest $request){
    	$arPhanquyen = phanquyen::find($id);
    	$arPhanquyen->tenpq = $request->name;
    	$arPhanquyen->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.phanquyen.index');

    }

    public function del($id, Request $request){
        $parent = User::where('id_phanquyen','=',$id)->count();
        if($parent == 0){
        	$arPhanquyen = phanquyen::find($id);
        	$arPhanquyen->delete();

        	$request->session()->flash('msg','Xóa thành công');
        	return redirect()->route('admin.phanquyen.index');
        }else{
            echo "<script type='text/javascript'>
                    alert('Bạn không thể xóa');
                    window.location = '";
                    echo route('admin.phanquyen.index');
            echo "'
                 </script>";
        }
    }

}
