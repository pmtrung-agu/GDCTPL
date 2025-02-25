<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DMVanBan extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'dm_van_ban';

}
