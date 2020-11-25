<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class LeadsListProspect extends Model
{
    use UsesTenantConnection;
}
