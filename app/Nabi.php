<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nabi extends Model
{
    protected $fillable = [
        'nama_nabi','slug','foto','konten','arti', 'id_user', 'id_kisah'
    ];
    public $timestamps = true;

    public function kisah()
    {
        return $this->belongsTo('App\Kisah', 'id_kisah');
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
