<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class CardDetail extends Model
{
    use UsesTenantConnection;
}
