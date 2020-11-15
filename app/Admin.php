<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Hyn\Tenancy\Traits\UsesSystemConnection;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use UsesSystemConnection;
    
    protected $guard = 'admin';
    protected $fillable = ['name', 'password', 'email'];
}
