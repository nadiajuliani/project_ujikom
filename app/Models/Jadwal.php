<?php

namespace App\Models;
use App\Models\Eskul;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['eskul_id', 'hari', 'jam_mulai', 'jam_selesai'];

    public function eskul()
    {
        return $this->belongsTo(Eskul::class);
    }
}
