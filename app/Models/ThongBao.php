<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ThongBao extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'thong_bao';
}


