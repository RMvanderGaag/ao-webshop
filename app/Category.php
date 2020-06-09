<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private function products(){
        return $this->hasMany('App\Product', 'cat_id');
    }

    public $timestamps = false;
}
