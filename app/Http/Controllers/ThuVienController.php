<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thuvien;
use App\list_thuvien;
use App\list_thuvien1;


class ThuVienController extends RightController
{
    public function index(){
    	$arItems = thuvien::all();
    	return view('thuvien.index',[
    		'arItems' => $arItems,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }

    public function danhmuc($slug, $id){
        $arDichVu = list_thuvien1::where('id_thuvien','=',$id)->orderBy('id','desc')->get();

        // Name list_dv
        $arNews1 = thuvien::where('id_list','=',$id)->first();
        $id_list = $arNews1->id_list;

        $arName = list_thuvien::where('id','=',$id_list)->first();
        $name = $arName['name'];

        //End name

            return view('thuvien.danhmuc',[
                'arDichVu' => $arDichVu,
                'name' => $name,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

    public function detail($slug, $id){
        $arDichVu = thuvien::where('id_list','=',$id)->orderBy('id','desc')->get();

        // Name list_dv
        $arNews1 = thuvien::where('id_list','=',$id)->first();
        $id_list = $arNews1->id_list;

        $arName = list_thuvien1::where('id','=',$id_list)->first();
        $name = $arName['name'];
        //End name

            return view('thuvien.detail',[
                'arDichVu' => $arDichVu,
                'name' => $name,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

}