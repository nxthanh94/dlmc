<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tuyendung extends Model
{
    protected $table = 'tuyendung';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getList(){
    	return  DB::table('tuyendung as t')->
    	join('list_tuyendung as l','t.id_list','=','l.id')->
    	select('*','t.id as tid','l.name as lname','t.name as tname')->get();
    }
}
