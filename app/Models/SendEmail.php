<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class SendEmail extends Model
{
    //
    protected $connection = 'mongodb';
    protected $table = 'send_email';

    //_id, id_van_ban, email, noi_dung, dinh_kem
}
