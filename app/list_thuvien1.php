<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class list_thuvien1 extends Model
{
    protected $table = 'list_thuvien1';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getList(){
    	return  DB::table('list_thuvien1 as l1')->
    	join('list_thuvien as l','l1.id_thuvien','=','l.id')->
    	select('*','l1.id as l1id','l1.name as l1name','l.name as lname')->get();


    }
}