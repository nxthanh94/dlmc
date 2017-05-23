<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\lich;
use App\list_lich;

class LichController extends Controller
{
    public function index(){
        $objQuangcao = new lich;
        $arItems = $objQuangcao->getList();
    	return view('admin.lich.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
        $arQCao = list_lich::all();
    	return view('admin.lich.add',[
             'arQCao' => $arQCao,
        ]);
    }

    public function postadd(Request $request){
    	$picName = $request->picture;

     	if($request->picture != ''){
            $image = $request->file('picture');

            $path = time().$image->getClientOriginalName();
            $image->move(storage_path('app/files'),$path);

            $tmp = explode('/',$path);
            $picName = end($tmp);
        }
    	$name = $request->name;
        $chitiet = $request->chitiet;
    	$mota = $request->mota;
        $id_list = $request->id_list;

    	$arNews = array(
    		'name' => $name,
    		'chitiet' => $chitiet,
            'picture' => $picName,
    		'mota' => $mota,
            'id_list' => $id_list
    	);
    	lich::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.lich.index');
    }

    public function getedit($id){
    	$arNews = lich::find($id);
        $arQCao = list_lich::all();

    	return view('admin.lich.edit',[
            'arNews' => $arNews,
    		'arQCao' => $arQCao,
    	]);
    }

    public function postedit($id, Request $request){
        $arNews = lich::find($id);
        //xu ly hiinh anh
        $picNameOld = $arNews['picture'];
        $picNameNew = $request->picture;
        if($picNameNew != ''){//co up hinh moi
            //up hinh moi
            $image = $request->file('picture');

            $path = time().$image->getClientOriginalName();
            $image->move(storage_path('app/files'),$path);

            $tmp = explode('/',$path);
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
        $arNews->id_list = $request->id_list;

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.lich.index');
    }

    public function del($id, Request $request){
            $arNews = lich::find($id);
            $arNews->delete();
            $picNameOld = $arNews['picture'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.lich.index');
      
    }

    public function chitiet($id){
        $arItem   = lich::find($id);
        return view('admin.lich.chitiet',[
            'arItem' => $arItem
        ]);
    }
}
