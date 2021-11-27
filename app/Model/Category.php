<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded  = [];
    public function cat()
    {
        return $this->hasOne('App\Model\Category', 'id', 'parent_id');
    }
}
