<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quangcao;

class QuangcaoController extends RightController
{
    public function index($slug, $id){
        $arNews = quangcao::find($id);

    	return view('slider.index',[
    		'arNews' => $arNews,
    	]);
    }

    public function detail($slug, $id){
        $arNews = quangcao::find($id);
        
    	return view('quangcao.detail',[
    		'arNews' => $arNews,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }
}