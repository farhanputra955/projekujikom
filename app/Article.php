<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'nama', 'slug', 'foto',
        'konten', 'id_user', 'id_category'
    ];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }   
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
