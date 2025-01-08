<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class NhuCauCDS extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'nhu_cau_cds';
}
