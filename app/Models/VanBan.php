<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class VanBan extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'van_ban';

    protected function casts() {
        return [
            'ngay_ky' => 'datetime'
        ];
    }
}
