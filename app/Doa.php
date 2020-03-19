<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doa extends Model
{
    protected $fillable = ['nama_doa', 'slug'];
    public $timestamps = true;

    public function doaharian()
    {
        return $this->hasMany('App\Doaharian', 'id_doa');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($doa) {
            // mengecek apakah penulis masih punya buku
            if ($doa->doaharian->count() > 0) {
                //menyiapkan pesan error
                $html = 'doa tidak bisa dihapus karena masih digunakan oleh doaharian: ';
                $html .= '<ul>';
                foreach ($doa->doaharian as $data) {
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
