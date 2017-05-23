<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;
use App\sanpham;
use App\User;
use App\list_news;
class NewsController extends RightController
{
    public function index(){
        $arNews = news::orderBy('id','desc')->paginate(10);

        return view('news.tintuc',[
                'arNews' => $arNews,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }
    public function detail($slug, $id){
        $arNews = news::where('id_list','=',$id)->orderBy('id','desc')->paginate(10);

        $arNews1 = news::where('id_list','=',$id)->first();
        $id_list = $arNews1->id_list;

        $arName = list_news::where('id','=',$id_list)->first();
        $name = $arName['name'];

            return view('news.index',[
                'arNews' => $arNews,
                'name' => $name,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

    public function chitiet($slug, $id){
        $arNews = news::find($id);
        $id_list = $arNews->id_list;
        $parent = news::where('id_list','=',$id_list)->count();
        $arNewslienquan = news::where('id_list','=',$id_list)->where('id','!=',$id)->take(3)->get();

        $arName = list_news::where('id','=',$id_list)->first();
        $name = $arName['name'];
        
        return view('news.detail',[
            'arNews' => $arNews,
            'name' => $name,
            'parent' => $parent,
            'arNewslienquan' => $arNewslienquan,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
        ]);
    }
}
