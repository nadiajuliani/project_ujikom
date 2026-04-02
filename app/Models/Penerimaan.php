<?php

namespace App\Models;
use App\Models\Daftar_Eskul;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $fillable = ['daftar_id','persetujuan', 'catatan'];

    public function daftarEskul()
    {
        return $this->belongsTo(Daftar_Eskul::class, 'daftar_id');
    }
}
