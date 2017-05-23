<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class chitiethoadon extends Model
{
    protected $table = "chitiethoadon";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function getList(){
    	return DB::table('chitiethoadon as c')->
    	join('sanpham as s','c.id_sp','=','s.id')->
    	join('hoadon as h','c.id_hoadon','=','h.id')->
    	select('*','s.name as sname','c.id as cid','s.gia as sgia','h.tonggia as htonggia','c.soluong as csoluong')->get();
    }
}
