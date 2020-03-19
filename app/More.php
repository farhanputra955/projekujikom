<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class More extends Model
{
    protected $fillable = [
        'berdoa','slug','arab','latin','arti', 'id_user', 'id_doaseharihari'
    ];
    public $timestamps = true;

    public function doaseharihari()
    {
        return $this->belongsTo('App\Doaseharihari', 'id_doaseharihari');
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
