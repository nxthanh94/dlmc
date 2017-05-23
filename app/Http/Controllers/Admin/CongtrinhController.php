<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\congtrinh;
use App\list_congtrinh;
use Image;

class CongtrinhController extends Controller
{
    public function index(){
        $objQuangcao = new congtrinh;
        $arItems = $objQuangcao->getList();

    	return view('admin.congtrinh.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
        $arQCao = list_congtrinh::all();
    	return view('admin.congtrinh.add',[
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
    	$mota = $request->mota;
    	$chitiet = $request->chitiet;
        $id_list = $request->id_list;

    	$arNews = array(
    		'name' => $name,
    		'mota' => $mota,
    		'chitiet' => $chitiet,
    		'picture' => $picName,
            'id_list' => $id_list
    	);
    	congtrinh::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.congtrinh.index');
    }

    public function getedit($id){
    	$arNews = congtrinh::find($id);
        $arQCao = list_congtrinh::all();

    	return view('admin.congtrinh.edit',[
            'arNews' => $arNews,
    		'arQCao' => $arQCao,
    	]);
    }

    public function postedit($id, Request $request){
        $arNews = congtrinh::find($id);
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
        $arNews->mota = $request->mota;
    	$arNews->picture = $picName;
    	$arNews->chitiet = $request->chitiet;
        $arNews->id_list = $request->id_list;

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.congtrinh.index');
    }

    public function del($id, Request $request){
            $arNews = congtrinh::find($id);
            $arNews->delete();
            $picNameOld = $arNews['picture'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.congtrinh.index');
      
    }

    public function chitiet($id){
        $arItem   = congtrinh::find($id);
        return view('admin.congtrinh.chitiet',[
            'arItem' => $arItem
        ]);
    }
}
