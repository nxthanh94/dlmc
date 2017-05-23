<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gioithieu;

class GioithieuController extends RightController
{
    public function index(){
    	$arItems = gioithieu::all();
    	return view('gioithieu.index',[
    		'arItems' => $arItems
    	]);
    }

     public function detail($slug, $id){
        $arNews = gioithieu::find($id);

            return view('gioithieu.detail',[
                'arNews' => $arNews,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }
}
