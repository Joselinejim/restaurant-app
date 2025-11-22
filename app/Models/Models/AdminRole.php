<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class AdminRole extends SpatieRole
{
    protected $fillable = ['name', 'description', 'guard_name'];
}
