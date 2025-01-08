<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DMSanPham extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'dm_san_pham';
}
