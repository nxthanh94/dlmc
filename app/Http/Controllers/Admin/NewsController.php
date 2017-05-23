<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\news;
use App\list_news;
use Image;

class NewsController extends Controller
{
    public function index(){
        $objQuangcao = new news;
        $arItems = $objQuangcao->getList();
        return view('admin.news.index',[
            'arItems' => $arItems
        ]);
    }

    public function getadd(){
        $arQCao = list_news::all();
        return view('admin.news.add',[
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
            // $image = $request->file('picture');

            // $path = time().$image->getClientOriginalName();
            // $image->move(storage_path('app/files'),$path);

            // $tmp = explode('/',$path);
            // $picName = end($tmp);
        }
    	$name = $request->name;
    	$mota = $request->mota;
        $chitiet = $request->chitiet;
    	$id_list = $request->id_list;

    	$arNews = array(
    		'name' => $name,
    		'preview' => $mota,
    		'detail' => $chitiet,
            'picture' => $picName,
    		'id_list' => $id_list
    	);
    	news::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.news.index');
    }

     public function getedit($id){
        $arNews = news::find($id);
        $arQCao = list_news::all();

        return view('admin.news.edit',[
            'arNews' => $arNews,
            'arQCao' => $arQCao
        ]);
    }

    public function postedit($id, Request $request){
        $arNews = news::find($id);
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
        $arNews->preview = $request->mota;
    	$arNews->picture = $picName;
        $arNews->detail = $request->chitiet;
    	$arNews->id_list = $request->id_list;

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.news.index');
    }

    public function del($id, Request $request){
            $arNews = news::find($id);
            $arNews->delete();
            $picNameOld = $arNews['picture'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.news.index');
      
    }

    public function chitiet($id){
        $arItem   = news::find($id);
        return view('admin.news.chitiet',[
            'arItem' => $arItem
        ]);
    }
}
