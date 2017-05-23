<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dichvu;
use App\list_dv;

class DichvuController extends RightController
{
    public function index(){
        $arDichVu = dichvu::orderBy('id','desc')->paginate(10);

            return view('chieusang.index',[
                'arDichVu' => $arDichVu,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

    public function detail($slug, $id){
        $arDichVu = dichvu::where('id_listdv','=',$id)->orderBy('id','desc')->paginate(10);

        // Name list_dv
        $arDichVu1 = dichvu::where('id_listdv','=',$id)->get();
        $id_list = $arDichVu1[0]['id_listdv'];
        $arName = list_dv::where('id','=',$id_list)->get();
        $name = $arName[0]['name'];
        //End name

            return view('chieusang.detail',[
                'arDichVu' => $arDichVu,
                'name' => $name,
                'arCat' => $this->_arCat,
                'arCat1' => $this->_arCat1,
            ]);
    }

    public function detail1($slug, $id){

        $arNews = dichvu::find($id);
        $id_list = $arNews->id_listdv;
        $parent = dichvu::where('id_listdv','=',$id_list)->count();
        // $parent = count($id_list);

        $arName = list_dv::where('id','=',$id_list)->first();
        $name = $arName['name'];

        $arNewslienquan = dichvu::where('id_listdv','=',$id_list)->where('id','!=',$id)->take(3)->get();
        
    	return view('chieusang.detail1',[
            'arNews' => $arNews,
            'name' => $name,
    		'parent' => $parent,
            'arNewslienquan' => $arNewslienquan,
            'arCat' => $this->_arCat,
            'arCat1' => $this->_arCat1,
    	]);
    }


}
