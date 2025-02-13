<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'san_pham';
}
