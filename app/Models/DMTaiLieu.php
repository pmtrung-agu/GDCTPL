<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DMTaiLieu extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'dm_tai_lieu';
}
