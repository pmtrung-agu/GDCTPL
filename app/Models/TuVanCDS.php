<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class TuVanCDS extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'tu_van_cds';
}
