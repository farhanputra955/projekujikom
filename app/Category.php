<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama', 'slug'];
    public $timestamps = true;

    public function article()
    {
        return $this->hasMany('App\Article', 'id_category');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
