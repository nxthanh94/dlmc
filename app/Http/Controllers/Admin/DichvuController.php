<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\dichvu;
use App\list_dv;
use Image;

class DichvuController extends Controller
{
    public function index(){
    	$objQuangcao = new dichvu;
        $arItems = $objQuangcao->getList();
        return view('admin.dichvu.index',[
            'arItems' => $arItems
        ]);
    }

    public function getadd(){
    	$arQCao = list_dv::all();
    	return view('admin.dichvu.add',[
        	'arQCao' => $arQCao,
    	]);
    }

    public function postadd(Request $request){
    	$picName = $request->picture;

     	if($request->picture != ''){
            $image = $request->file('picture');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/files/' . $filename);
            Image::make($image->getRealPath())->resize(600, 300)->save($path);
            $tmp = explode('/',$filename);
            $picName = end($tmp);
        }
    	$name = $request->name;
    	$cotqc = $request->cotqc;
    	$chitiet = $request->chitiet;
    	$mota = $request->mota;

    	$arNews = array(
    		'name' => $name,
    		'id_listdv' => $cotqc,
    		'chitiet' => $chitiet,
    		'mota' => $mota,
    		'picture' => $picName
    	);
    	dichvu::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.dichvu.index');
    }

    public function getedit($id){
    	$arNews = dichvu::find($id);
    	$arQCao = list_dv::all();

    	return view('admin.dichvu.edit',[
    		'arNews' => $arNews,
    		'arQCao' => $arQCao
    	]);
    }

    public function postedit($id, Request $request){
        $arNews = dichvu::find($id);
        //xu ly hiinh anh
        $picNameOld = $arNews['picture'];
        $picNameNew = $request->picture;
        if($picNameNew != ''){//co up hinh moi
            //up hinh moi
            $image = $request->file('picture');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/files/' . $filename);
            Image::make($image->getRealPath())->resize(600, 300)->save($path);
            $tmp = explode('/',$filename);
            $picName = end($tmp);

            //xoa hinh cu
            if($picNameOld != ''){
                Storage::delete("files/{$picNameOld}");
            }
        }else{
            $picName = $picNameOld;
        }
    	$arNews->name = $request->name;
        $arNews->id_listdv = $request->id_cot;
    	$arNews->picture = $picName;
    	$arNews->chitiet = $request->chitiet;
    	$arNews->mota = $request->mota;

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.dichvu.index');
    }

    public function del($id, Request $request){
            $arNews = dichvu::find($id);
            $arNews->delete();
            $picNameOld = $arNews['picture'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.dichvu.index');
      
    }

    public function chitiet($id){
        $arItem   = dichvu::find($id);
        return view('admin.dichvu.chitiet',[
            'arItem' => $arItem
        ]);
    }
}
