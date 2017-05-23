<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sanpham extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getList(){
    	return  DB::table('sanpham as s')->
    	join('hangsx as h','s.id_hangsx','=','h.id')->
    	join('loaisp as l','s.id_loaisp','=','l.id')->
    	select('*','s.id as sid','h.tenhsx as tenhsx','l.tenloai as tenloai')->get();


    }

   
}
