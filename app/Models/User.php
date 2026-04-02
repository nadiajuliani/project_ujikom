<?php

namespace App\Models;

use App\Models\Daftar_Eskul;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Kolom yang boleh diisi
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'kelas', 
    ];

    /**
     * Kolom tersembunyi
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast data
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /**
     * Relasi ke pendaftaran eskul
     */
    public function daftarEskul()
    {
        return $this->hasMany(Daftar_Eskul::class);
    }

    /**
     * Helper role (opsional tapi rapi)
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
}
