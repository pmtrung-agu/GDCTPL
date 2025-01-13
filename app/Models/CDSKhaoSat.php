<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class CDSKhaoSat extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'chuyen_doi_so_khao_sat';
}
