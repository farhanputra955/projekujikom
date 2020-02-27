<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solat extends Model
{
    protected $fillable = [
        'judul','slug','arab','latin','arti', 'id_user', 'id_solatfardhu'
    ];
    public $timestamps = true;

    public function solatfardhu()
    {
        return $this->belongsTo('App\SolatFardhu', 'id_solatfardhu');
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
