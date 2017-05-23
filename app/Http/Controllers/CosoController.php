<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coso;

class CosoController extends RightController
{
    public function index(){
    	$arItems = coso::orderBy('id','desc')->paginate(10);
    	return view('coso.index',[
    		'arItems' => $arItems,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }

    public function detail($slug, $id){
        $arNews = coso::find($id);
        
    	return view('coso.detail',[
    		'arNews' => $arNews,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }
}
