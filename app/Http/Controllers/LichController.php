<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lich;
use App\list_lich;

class LichController extends RightController
{
    public function index(){
    	$arItems = lich::orderBy('id','desc')->paginate(10);
    	return view('lich.index',[
    		'arItems' => $arItems,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }

    public function danhmuc($slug, $id){
        $arDichVu = lich::where('id_list','=',$id)->orderBy('id','desc')->paginate(10);

        // Name list_dv
        $arNews1 = lich::where('id_list','=',$id)->first();
        $id_list = $arNews1->id_list;

        $arName = list_lich::where('id','=',$id_list)->first();
        $name = $arName['name'];
        //End name

            return view('lich.danhmuc',[
                'arDichVu' => $arDichVu,
                'name' => $name,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

    public function detail($slug, $id){
        $arNews = lich::find($id);

         // Name list_dv
        $id_list = $arNews->id_list;

        $arName = list_lich::where('id','=',$id_list)->first();
        $name = $arName['name'];
        //End name

    	return view('lich.detail',[
            'arNews' => $arNews,
    		'name' => $name,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }
}
