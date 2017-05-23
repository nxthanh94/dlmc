<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\list_thuvien1;
use App\list_thuvien;

class ListTV1Controller extends Controller
{
    public function index(){
        // $arItems = list_thuvien1::all();
        $objQuangcao = new list_thuvien1;
        $arItems = $objQuangcao->getList();

        return view('admin.listtv1.index',[
            'arItems' => $arItems
        ]);
    }

    public function getadd(){
        $arQCao = list_thuvien::all();

        return view('admin.listtv1.add',[
            'arQCao' => $arQCao,
        ]);
    }

    public function postadd(Request $request){
        $name = $request->name;
        $id_list = $request->id_list;

        $arLoaisp   = array(
            'name' => $name,
            'id_thuvien' => $id_list
        );

        list_thuvien1::insert($arLoaisp);

        $request->session()->flash('msg','Thêm thành công');
        return redirect()->route('admin.listtv1.index');
    }

    public function getedit($id){
        $arLoaisp = list_thuvien1::find($id);
        $arQCao = list_thuvien::all();

        return view('admin.listtv1.edit',[
            'arLoaisp' => $arLoaisp,
            'arQCao' => $arQCao,
        ]);
    }

    public function postedit($id, Request $request){
        $arLoaisp = list_thuvien1::find($id);

        $arLoaisp->name = $request->name;
        $arLoaisp->id_thuvien = $request->id_list;

        $arLoaisp->update();

        $request->session()->flash('msg','Sửa thành công');
        return redirect()->route('admin.listtv1.index');
    }

    public function del($id, Request $request){
        $arLoaisp = list_thuvien1::find($id);
        $arLoaisp->delete();

        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.listtv1.index');
    }
}


