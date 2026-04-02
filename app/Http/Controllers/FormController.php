<?php

namespace App\Http\Controllers;
use App\Models\Eskul;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use App\Models\Daftar_Eskul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        $eskul = Eskul::all();
        $jadwal = Jadwal::all();
        $tahunAjaran = ['2023/2024', '2024/2025', '2025/2026']; // Contoh data tahun ajaran
        return view('welcome', compact('jadwal', 'eskul', 'tahunAjaran'));
    }
    public function show($id)
    {
        $eskul = Eskul::with('jadwal')->findOrFail($id);
        return view('detail', compact('eskul'));
    }
}
