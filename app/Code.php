<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesSystemConnection;

class Code extends Model
{
	use UsesSystemConnection;
    protected $fillable = ['verification_code'];
}
