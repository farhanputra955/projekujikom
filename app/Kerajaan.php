<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kerajaan extends Model
{
    protected $fillable = ['nama_kerajaan','slug','foto','konten'];
}
