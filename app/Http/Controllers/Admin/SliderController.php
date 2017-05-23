<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
use Illuminate\Support\Facades\Storage;
use Image;

class SliderController extends Controller
{
    public function index(){
    	$arItems = slider::all();

    	return view('admin.slider.index',[
    		'arItems' => $arItems
    	]);
    }

    public function getadd(){
    	return view('admin.slider.add');
    }

    public function postadd(Request $request){
    	$picName = $request->picture;

     	if($request->picture != ''){
            $image = $request->file('picture');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/files/' . $filename);
            Image::make($image->getRealPath())->resize(1350, 500)->save($path);
            $tmp = explode('/',$filename);
            $picName = end($tmp);
        }
    	$name = $request->name;
    	$chitiet = $request->chitiet;

    	$arNews = array(
    		'name' => $name,
    		'content' => $chitiet,
    		'hinhanh' => $picName
    	);
    	slider::insert($arNews);
    	$request->session()->flash('msg','Thêm thành công');
    	return redirect()->route('admin.slider.index');
    }

    public function getedit($id){
    	$arNews = slider::find($id);

    	return view('admin.slider.edit',[
    		'arNews' => $arNews
    	]);
    }

    public function postedit($id, Request $request){
        $arNews = slider::find($id);
        //xu ly hiinh anh
        $picNameOld = $arNews['hinhanh'];
        $picNameNew = $request->picture;
        if($picNameNew != ''){//co up hinh moi
            //up hinh moi
           $image = $request->file('picture');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = storage_path('app/files/' . $filename);
            Image::make($image->getRealPath())->resize(1350, 500)->save($path);
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
    	$arNews->hinhanh = $picName;
    	$arNews->content = $request->chitiet;

    	$arNews->update();

    	$request->session()->flash('msg','Sửa thành công');
    	return redirect()->route('admin.slider.index');
    }

    public function del($id, Request $request){
            $arNews = slider::find($id);
            $arNews->delete();
            $picNameOld = $arNews['hinhanh'];
            Storage::delete("files/{$picNameOld}");
            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.slider.index');
      
    }
}



