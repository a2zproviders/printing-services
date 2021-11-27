<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $guarded  = [];

    protected $table = 'pages';
    public function role()
    {
        return $this->hasOne('App\Model\Role', 'id', 'role_id');
    }
}
