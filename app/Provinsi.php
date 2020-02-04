<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $fillable = ['nama_provinsi', 'slug'];
    public $timestamps = true;

    public function pesantren()
    {
        return $this->hasMany('App\Pesantren', 'id_pesantren');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($provinsi) {
            // mengecek apakah penulis masih punya buku
            if ($provinsi->pesantren->count() > 0) {
                //menyiapkan pesan error
                $html = 'provinsi tidak bisa dihapus karena masih digunakan oleh pesantren: ';
                $html .= '<ul>';
                foreach ($provinsi->pesantren as $data) {
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