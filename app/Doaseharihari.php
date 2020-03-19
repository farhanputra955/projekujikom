<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doaseharihari extends Model
{
    protected $fillable = ['nama_doa', 'slug'];
    public $timestamps = true;

    public function more()
    {
        return $this->hasMany('App\More', 'id_doaseharihari');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($doaseharihari) {
            // mengecek apakah penulis masih punya buku
            if ($doaseharihari->more->count() > 0) {
                //menyiapkan pesan error
                $html = 'doaseharihari tidak bisa dihapus karena masih digunakan oleh more: ';
                $html .= '<ul>';
                foreach ($doaseharihari->more as $data) {
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
