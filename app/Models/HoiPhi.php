<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class HoiPhi extends Model
{
    //

    protected $connection = 'mongodb';
    protected $table = 'hoi_phi';

    protected function casts() {
        return [
            'ngay_thu' => 'datetime'
        ];
    }
}