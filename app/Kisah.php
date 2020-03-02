<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kisah extends Model
{
    protected $fillable = ['nama_kisah', 'slug'];
    public $timestamps = true;

    public function nabi()
    {
        return $this->hasMany('App\Nabi', 'id_kisah');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($kisah) {
            // mengecek apakah penulis masih punya buku
            if ($kisah->nabi->count() > 0) {
                //menyiapkan pesan error
                $html = 'kisah tidak bisa dihapus karena masih digunakan oleh nabi: ';
                $html .= '<ul>';
                foreach ($kisah->nabi as $data) {
                    $html .= "<li>$data->judul<li>";
                }
                $html .= '<ul>';
                Session::flash("flash_notification", [
                    "level" => "danger",
                    "message" => $html
                ]);
                //membatalkan proses penghapusan
                return false;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
