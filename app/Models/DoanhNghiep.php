<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DoanhNghiep extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'doanh_nghiep';

    //protected $dates = ['ngaygianhaphiephoi', 'ngayduyetdoanhnghiep', 'ngayhuyhoivien'];
    protected $casts = [
        'ngaygianhaphiephoi' => 'datetime',
        'ngayduyetdoanhnghiep' => 'datetime',
        'ngayhuyhoivien' => 'datetime'
    ];
}
