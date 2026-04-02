<?php

namespace App\Models;
use App\Models\Eskul;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Daftar_Eskul extends Model
{
    protected $table = 'daftar__eskuls';
    protected $fillable = ['user_id', 'kelas', 'eskul_id', 'tahun_ajaran', 'no_telp', 'alasan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function eskul()
    {
        return $this->belongsTo(Eskul::class, 'eskul_id');
    }
    public function penerimaan()
    {
        return $this->hasOne(Penerimaan::class, 'daftar_id');
    }
}
