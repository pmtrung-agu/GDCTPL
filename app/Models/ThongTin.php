<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class ThongTin extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'thong_tin';

}
