<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class KetNoiGiaoThuong extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'ket_noi_giao_thuong';
}
