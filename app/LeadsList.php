<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class LeadsList extends Model
{
	use UsesTenantConnection;
	
    protected $fillable = ["name"];

    public function prospects()
    {
    	 return $this->belongsToMany(
	        Prospect::class,
	        'leads_list_prospects',
	        'list_id',
	        'prospect_id'
	    );
    }
}
