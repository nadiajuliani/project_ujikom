<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    protected $fillable = ['nama_eskul', 'nama_pembina', 'kontak_pembina', 'alamat', 'foto', 'deskripsi'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function daftarEskul()
    {
        return $this->hasMany(Daftar_Eskul::class);
    }
}
