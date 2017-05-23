<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class news extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getList(){
    	return  DB::table('news as n')->
    	join('list_news as l','n.id_list','=','l.id')->
    	select('*','n.id as nid','l.name as lname','n.name as nname')->get();


    }
}
