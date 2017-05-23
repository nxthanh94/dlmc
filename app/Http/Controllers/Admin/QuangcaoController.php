<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\quangcao;
use App\cotqc;
use Image;

class QuangcaoController extends Controller
{
    public function index(){
    	$objQuangcao = new quangcao;
        $arItems = $objQuangcao->getList();
        return view('admin.quangcao.index',[
            'arItems' => $arItems
        ]);
    }

    public function getadd(){
    	$arQCao = cotqc::all();
    	return view('admin.quangcao.add',[
        	'arQCao' => $arQCao,
    	]);
    }

    public function postadd(Request $request){
    	$picName = $request->picture;

     	if($request->picture != ''){
            $image = $request->file('picture');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/files/' . $filename);
            Image::make($image->getRealPath())->resize(840, 170)->save($path);
            $tmp = explode('/',$filename);
            $picName = end($tmp);
        }
    	$name = $request->name;
    	$cotqc = $request->cotqc;
        $chitiet = $request->chitiet;
    	$mota = $request->mota;

    	$arNews = array(
    		'name' => $name,
    		'id_cot' => $cotqc,
    		'chitiet' => $chitiet,
            'picture' => $picName,
    		'mota' => $mota
    	);
    	quangcao::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.quangcao.index');
    }

    public function getedit($id){
    	$arNews = quangcao::find($id);
    	$arQCao = cotqc::all();

    	return view('admin.quangcao.edit',[
    		'arNews' => $arNews,
    		'arQCao' => $arQCao
    	]);
    }

    public function postedit($id, Request $request){
        $arNews = quangcao::find($id);
        //xu ly hiinh anh
        $picNameOld = $arNews['picture'];
        $picNameNew = $request->picture;
        if($picNameNew != ''){//co up hinh moi
            //up hinh moi
            $image = $request->file('picture');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/files/' . $filename);
            Image::make($image->getRealPath())->resize(840, 170)->save($path);
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
        $arNews->id_cot = $request->id_cot;
    	$arNews->picture = $picName;
        $arNews->chitiet = $request->chitiet;
    	$arNews->mota = $request->mota;

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.quangcao.index');
    }

    public function del($id, Request $request){
            $arNews = quangcao::find($id);
            $arNews->delete();
            $picNameOld = $arNews['picture'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.quangcao.index');
      
    }

      public function chitiet($id){
        $arItem   = quangcao::find($id);
        return view('admin.quangcao.chitiet',[
            'arItem' => $arItem
        ]);
    }
}
