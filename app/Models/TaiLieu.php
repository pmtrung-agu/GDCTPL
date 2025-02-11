<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class TaiLieu extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'tai_lieu';
}
