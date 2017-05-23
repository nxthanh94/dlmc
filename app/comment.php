<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getListCM(){
    	return  DB::table('comment as c')->
    	join('users as u','c.id_user','=','u.id')->
    	join('news as n','c.id_news','=','n.id')->
    	select('*','c.id as cid','u.username as uusername','n.name as nname')->get();
    }
}
