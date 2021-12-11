<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded  = [];

    public function category()
    {
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }
}
