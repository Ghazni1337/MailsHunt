<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
	use UsesTenantConnection;

	protected $fillable =['name','company_name'];

    public function lists()
    {
	    return $this->belongsToMany(
	        LeadsList::class,
	        'leads_list_prospects',
	        'prospect_id',
	        'list_id'
	    );
    }
}
