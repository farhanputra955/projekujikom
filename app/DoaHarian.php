<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoaHarian extends Model
{
    protected $fillable = [
        'judul','slug','arab','latin','arti', 'id_user', 'id_doa'
    ];
    public $timestamps = true;

    public function doa()
    {
        return $this->belongsTo('App\Doa', 'id_doa');
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
