<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tuyendung;
use App\list_tuyendung;

class TuyendungController extends RightController
{
    public function index(){
    	$arItems = tuyendung::orderBy('id','desc')->paginate(10);
    	return view('thutuc.index',[
    		'arItems' => $arItems,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }

    public function danhmuc($slug, $id){
        $arDichVu = tuyendung::where('id_list','=',$id)->orderBy('id','desc')->paginate(10);

        // Name list_dv
        $arNews1 = tuyendung::where('id_list','=',$id)->first();
        $id_list = $arNews1->id_list;

        $arName = list_tuyendung::where('id','=',$id_list)->first();
        $name = $arName['name'];
        //End name

            return view('thutuc.danhmuc',[
                'arDichVu' => $arDichVu,
                'name' => $name,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

    public function detail($slug, $id){
        $arNews = tuyendung::find($id);

         // Name list_dv
        $id_list = $arNews->id_list;

        $arName = list_tuyendung::where('id','=',$id_list)->first();
        $name = $arName['name'];
        //End name
        $parent = tuyendung::where('id_list','=',$id_list)->count();
        $arNewslienquan = tuyendung::where('id_list','=',$id_list)->where('id','!=',$id)->orderBy('id','desc')->take(3)->get();

    	return view('thutuc.detail',[
            'arNews' => $arNews,
            'parent' => $parent,
            'arNewslienquan' => $arNewslienquan,
    		'name' => $name,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }
}
