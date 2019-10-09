<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
//    Types
//    0 = domain search
//    1 = email finder
//    2 = email verifier
//    3 = email verifier api
//    4 = email verifier bulk api

    protected $connection = 'mysql2';
}
