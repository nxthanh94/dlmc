<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class quangcao extends Model
{
    protected $table = 'quangcao';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getList(){
    	return  DB::table('quangcao as q')->
    	join('cotqc as c','q.id_cot','=','c.id')->
    	select('*','q.id as qid','c.name as cname','q.name as qname')->get();


    }
}
