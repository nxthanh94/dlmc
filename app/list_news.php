<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_news extends Model
{
    protected $table = 'list_news';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
