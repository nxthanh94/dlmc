<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SanPhamRequest;
use App\Http\Controllers\Controller;
use App\sanpham;
use App\hangsx;
use App\loaisp;
use Illuminate\Support\Facades\Storage;

class SanphamController extends Controller
{
    public function index(){
        $objSanpham = new sanpham;
        $arItems = $objSanpham->getList();
        return view('admin.sanpham.index',[
            'arItems' => $arItems
        ]);
    }

    public function getadd(){
        $arHangsx = hangsx::all();
        $arLoaisp = loaisp::all();

        return view('admin.sanpham.add',[
            'arHangsx' => $arHangsx,
            'arLoaisp' => $arLoaisp
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
        $hsx = $request->hsx;
        $loaisp = $request->loaisp;
        $gia = $request->gia;
        $soluong = $request->soluong;
        $mota = $request->mota;

        $arNews = array(
            'name' => $name,
            'id_hangsx' => $hsx,
            'id_loaisp' => $loaisp,
            'gia' => $gia,
            'soluong' => $soluong,
            'mota' => $mota,
            'hinhanh' => $picName
        );
        sanpham::insert($arNews);
        $request->session()->flash('msg','Thêm thành công');
        return redirect()->route('admin.sanpham.index');
    }
   
    public function getedit($id){
        $arHangsx = hangsx::all();
        $arLoaisp = loaisp::all();
        $arItems = sanpham::find($id);

        return view('admin.sanpham.edit',[
            'arHangsx' => $arHangsx,
            'arLoaisp' => $arLoaisp,
            'arItems' => $arItems
        ]);
    }

    public function postedit($id, SanPhamRequest $request){
        $arNews = sanpham::find($id);
        //xu ly hiinh anh
        $picNameOld = $arNews['hinhanh'];
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
        $arNews->gia = $request->gia;
        $arNews->id_hangsx = $request->hsx;
        $arNews->hinhanh = $picName;
        $arNews->id_loaisp = $request->loaisp;
        $arNews->soluong = $request->soluong;
        $arNews->mota = $request->mota;

        $arNews->update();
        $request->session()->flash('msg','Sửa thành công');
        return redirect()->route('admin.sanpham.index');
    }

    public function del($id, Request $request){
        $objItem = sanpham::find($id);
        $objItem->delete();
        //Xoa hinh
        $picName = $objItem['hinhanh'];
        if($picName != ''){
            Storage::delete("files/{$picName}");
        }
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.sanpham.index');
    }
    public function mota($id){
        $arItem   = sanpham::find($id);
        return view('admin.sanpham.mota',[
            'arItem' => $arItem
        ]);
    }
}
