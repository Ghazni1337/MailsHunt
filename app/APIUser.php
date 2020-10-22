<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APIUser extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'api_users';
}
