<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\sanpham;
use App\news;
use App\hangsx;
use App\quangcao;
use App\dichvu;
use App\list_dv;

class IndexController extends RightController
{
    public function index(){
        $arItems = news::orderBy('id','desc')->take(6)->get();

        $arItems1 = dichvu::where('id_listdv','=',1)->orderBy('id','desc')->take(4)->get();
        $arNews1 = dichvu::where('id_listdv','=',1)->first();
        $id_list = $arNews1->id_listdv;
        $arName = list_dv::where('id','=',$id_list)->first();
        $nameid1 = $arName['name'];


        $arItems2 = dichvu::where('id_listdv','=',2)->orderBy('id','desc')->take(4)->get();
        $arNews1 = dichvu::where('id_listdv','=',2)->first();
        $id_list = $arNews1->id_listdv;
        $arName = list_dv::where('id','=',$id_list)->first();
        $nameid2 = $arName['name'];

        $arItems3 = dichvu::where('id_listdv','=',3)->orderBy('id','desc')->take(4)->get();
        $arNews1 = dichvu::where('id_listdv','=',3)->first();
        $id_list = $arNews1->id_listdv;
        $arName = list_dv::where('id','=',$id_list)->first();
        $nameid3 = $arName['name'];


    	return view("index.index",[
            'arItems' => $arItems,
            'arItems1' => $arItems1,
            'nameid1' => $nameid1,
            'nameid2' => $nameid2,
            'nameid3' => $nameid3,
            'arItems2' => $arItems2,
    		'arItems3' => $arItems3,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }

    public function timkiem(Request $request){
        $tukhoa = $request->tukhoa;

       
        $arSanpham = sanpham::where('name','like',"%$tukhoa%")->
        orWhere('mota','like',"%$tukhoa%")->paginate(6);
       
        return  view('sanpham.timkiem',[
            'tukhoa' => $tukhoa,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
            'arSanpham' => $arSanpham
        ]);

    }


}
