<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class DMDonVi extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'dm_don_vi';
}
