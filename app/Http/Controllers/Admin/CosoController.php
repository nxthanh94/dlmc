<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\coso;
use Image;

class CosoController extends Controller
{
    public function index(){
        $arItems = coso::all();
        return view('admin.coso.index',[
            'arItems' => $arItems
        ]);
    }

    public function getadd(){
        return view('admin.coso.add');
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
            // $image = $request->file('picture');

            // $path = time().$image->getClientOriginalName();
            // $image->move(storage_path('app/files'),$path);

            // $tmp = explode('/',$path);
            // $picName = end($tmp);
        }
    	$name = $request->name;
    	$mota = $request->mota;
        $chitiet = $request->chitiet;

    	$arNews = array(
    		'name' => $name,
    		'mota' => $mota,
    		'chitiet' => $chitiet,
            'picture' => $picName,
    	);
    	coso::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.coso.index');
    }

     public function getedit($id){
        $arNews = coso::find($id);

        return view('admin.coso.edit',[
            'arNews' => $arNews,
        ]);
    }

    public function postedit($id, Request $request){
        $arNews = coso::find($id);
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

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.coso.index');
    }

    public function del($id, Request $request){
            $arNews = coso::find($id);
            $arNews->delete();
            $picNameOld = $arNews['picture'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.coso.index');
      
    }

    public function chitiet($id){
        $arItem   = coso::find($id);
        return view('admin.coso.chitiet',[
            'arItem' => $arItem
        ]);
    }
}
