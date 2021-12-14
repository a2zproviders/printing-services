<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded  = [];

    public function category()
    {
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }
    public function size()
    {
        return $this->hasOne('App\Model\Size', 'id', 'size_id');
    }
    public function color()
    {
        return $this->hasOne('App\Model\Color', 'id', 'color_id');
    }
}
