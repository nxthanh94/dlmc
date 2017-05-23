<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class congtrinh extends Model
{
    protected $table = 'congtrinh';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function getList(){
    	return  DB::table('congtrinh as c')->
    	join('list_congtrinh as l','c.id_list','=','l.id')->
    	select('*','c.id as cid','l.name as lname','c.name as cname')->get();


    }
}
