<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\tuyendung;
use App\list_tuyendung;
use Image;

class TuyendungController extends Controller
{
    public function index(){
        $objQuangcao = new tuyendung;
        $arItems = $objQuangcao->getList();
    	return view('admin.tuyendung.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
        $arQCao = list_tuyendung::all();
    	return view('admin.tuyendung.add',[
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
        $chitiet = $request->chitiet;
    	$mota = $request->mota;
        $id_list = 1;

    	$arNews = array(
    		'name' => $name,
    		'chitiet' => $chitiet,
            'picture' => $picName,
    		'mota' => $mota,
            'id_list' => $id_list
    	);
    	tuyendung::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.tuyendung.index');
    }

    public function getedit($id){
    	$arNews = tuyendung::find($id);
        $arQCao = list_tuyendung::all();

    	return view('admin.tuyendung.edit',[
            'arNews' => $arNews,
    		'arQCao' => $arQCao,
    	]);
    }

    public function postedit($id, Request $request){
        $arNews = tuyendung::find($id);
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
    	$arNews->picture = $picName;
        $arNews->chitiet = $request->chitiet;
    	$arNews->mota = $request->mota;
        $arNews->id_list = 1;

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.tuyendung.index');
    }

    public function del($id, Request $request){
            $arNews = tuyendung::find($id);
            $arNews->delete();
            $picNameOld = $arNews['picture'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.tuyendung.index');
      
    }

    public function chitiet($id){
        $arItem   = tuyendung::find($id);
        return view('admin.tuyendung.chitiet',[
            'arItem' => $arItem
        ]);
    }
}