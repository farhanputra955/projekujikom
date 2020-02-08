<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesantren extends Model
{
    protected $fillable = [
        'judul', 'slug', 'foto',
        'konten', 'id_user', 'id_provinsi'
    ];
    public $timestamps = true;

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi', 'id_provinsi');
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
