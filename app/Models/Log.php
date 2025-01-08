<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Log extends Model {
    use HasFactory;
    protected $connection = 'mongodb';
    protected $table = 'logs';
    //_id, action, id_user, email, name, id_collection, collection, data
}

