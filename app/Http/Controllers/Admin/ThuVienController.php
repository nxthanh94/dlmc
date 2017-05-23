<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\thuvien;
use App\list_thuvien;
use App\list_thuvien1;
use Illuminate\Support\Facades\Storage;
use Image;

class ThuVienController extends Controller
{
    public function index(){
        $objQuangcao = new thuvien;
        $ThuVien = $objQuangcao->getList();

        return view('admin.thuvien.index',[
            'ThuVien' => $ThuVien,
        ]);
    }

    public function getadd(){
        $arQCao = list_thuvien::all();
        $arQCao1 = list_thuvien1::all();

        return view('admin.thuvien.add',[
            'arQCao' => $arQCao,
            'arQCao1' => $arQCao1,
        ]);
    }

    public function postadd(Request $request){
        if(Input::hasFile('picture')){
            foreach(Input::file('picture') as $file){
                $product_img = new thuvien();
                if(isset($file)){
                    $product_img->id_list = $request->id_list1;
                    $product_img->hinhanh = time().$file->getClientOriginalName();
                    $file->move(storage_path('app/files'),time().$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
    $request->session()->flash('msg','Thêm thành công');
    return redirect()->route('admin.thuvien.index');
    }

    public function del($id, Request $request){
            $arNews = thuvien::find($id);
            $arNews->delete();

            $request->session()->flash('msg','Xóa thành công');
            return redirect()->route('admin.thuvien.index');
      
      
    }
    
}
