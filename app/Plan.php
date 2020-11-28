<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesSystemConnection;

class Plan extends Model
{
	use UsesSystemConnection;
	
    protected $fillable = [
    	'stripe_id','title', 'price', 
    	'campaigns', 'users',
    	'daily_emails', 'credits'
	];
}
