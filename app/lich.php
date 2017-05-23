<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class lich extends Model
{
    protected $table = 'lich';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getList(){
    	return  DB::table('lich as t')->
    	join('list_lich as l','t.id_list','=','l.id')->
    	select('*','t.id as tid','l.name as lname','t.name as tname')->get();
    }
}
