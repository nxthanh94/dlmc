<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class hoadon extends Model
{
    protected $table = 'hoadon';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getList(){
    	return  DB::table('hoadon as h')->
    	join('users as u','h.id_users','=','u.id')->
    	join('thanhtoan as t','h.id_thanhtoan','=','t.id')->
    	select('*','h.id as hid','u.name as uname','u.email as uemail','u.diachi as udiachi','u.dienthoai as udienthoai','t.loaithanhtoan as loaithanhtoan','u.username as username','h.diachi as hdiachi','u.id as uid','h.email as hemail','h.name as hname','h.sodienthoai as hdienthoai')->get();


    }

}
