<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DMThongTin extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'dm_thong_tin';

}
