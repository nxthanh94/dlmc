<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dichvu extends Model
{
    protected $table = 'dichvu';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getList(){
    	return  DB::table('dichvu as d')->
    	join('list_dv as l','d.id_listdv','=','l.id')->
    	select('*','d.id as did','l.name as lname','d.name as dname')->get();


    }
}
