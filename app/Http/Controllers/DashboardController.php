<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Penerimaan::count();
        $disetujui  = Penerimaan::where('persetujuan', 'Disetujui')->count();
        $ditolak    = Penerimaan::where('persetujuan', 'Ditolak')->count();
        $menunggu   = Penerimaan::whereNull('persetujuan')->count();

        return view('admin.index', compact(
            'totalSiswa',
            'disetujui',
            'ditolak',
            'menunggu'
        ));
    }
}
