<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\congtrinh;
use App\list_congtrinh;

class CongtrinhController extends RightController
{
    public function index(){
    	$arItems = congtrinh::orderBy('id','desc')->paginate(12);
    	return view('duan.index',[
    		'arItems' => $arItems,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }

    public function danhmuc($slug, $id){
        $arDichVu = congtrinh::where('id_list','=',$id)->orderBy('id','desc')->paginate(10);

        // Name list_dv
        $arNews1 = congtrinh::where('id_list','=',$id)->first();
        $id_list = $arNews1->id_list;

        $arName = list_congtrinh::where('id','=',$id_list)->first();
        $name = $arName['name'];
        //End name

            return view('duan.danhmuc',[
                'arDichVu' => $arDichVu,
                'name' => $name,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

    public function detail($slug, $id){
        $arNews = congtrinh::find($id);

        // Name list_dv
        $id_list = $arNews->id_list;

        $arName = list_congtrinh::where('id','=',$id_list)->first();
        $name = $arName['name'];
        //End name
        $arNewslienquan = congtrinh::where('id_list','=',$id_list)->where('id','!=',$id)->orderBy('id','desc')->take(3)->get();
        
    	return view('duan.detail',[
            'arNews' => $arNews,
            'arNewslienquan' => $arNewslienquan,
    		'name' => $name,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }


    //ENG//
    public function eindex(){
        $arItems = congtrinh::orderBy('id','desc')->paginate(12);
        return view('eng.kinhdoanh.index',[
            'arItems' => $arItems,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
        ]);
    }

    public function edetail($slug, $id){
        $arNews = congtrinh::find($id);
        
        return view('eng.kinhdoanh.detail',[
            'arNews' => $arNews,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
        ]);
    }
}
