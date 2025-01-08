<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DMLinhVuc extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'dm_linh_vuc';
}
