<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tokoh extends Model
{
    protected $fillable = ['nama_tokoh','slug','foto','konten'];
}
