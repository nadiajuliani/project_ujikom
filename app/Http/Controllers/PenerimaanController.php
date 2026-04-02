<?php
namespace App\Http\Controllers;

use App\Models\Daftar_Eskul;
use App\Models\Penerimaan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    public function index(Request $request)
    {
        $tahunAjaran = $request->input('tahun_ajaran', session('filter_tahun', null));

        if ($tahunAjaran) {
            session(['filter_tahun' => $tahunAjaran]);
        }

        $query = Penerimaan::with(['daftarEskul.user', 'daftarEskul.eskul']);

        if ($tahunAjaran) {
            $query->whereHas('daftarEskul', function ($q) use ($tahunAjaran) {
                $q->where('tahun_ajaran', $tahunAjaran);
            });
        }

        $disetujui = (clone $query)->where('persetujuan', 'disetujui')->latest()->get();
        $ditolak   = (clone $query)->where('persetujuan', 'ditolak')->latest()->get();

        $menunggu = Daftar_Eskul::with(['user', 'eskul'])
            ->whereNotIn('id', Penerimaan::pluck('daftar_id'))
            ->when($tahunAjaran, function ($query) use ($tahunAjaran) {
                $query->where('tahun_ajaran', $tahunAjaran);
            })
            ->latest()
            ->get();

        $semuaTahun = Daftar_Eskul::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');

        return view('admin.penerimaan.index', compact('disetujui', 'ditolak', 'menunggu', 'tahunAjaran', 'semuaTahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_id'   => 'required|exists:daftar__eskuls,id',
            'persetujuan' => 'required',
            'catatan'     => 'required|string|max:255',
        ]);

        Penerimaan::create($request->all());

        return redirect()->route('admin.penerimaan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function approveMenunggu(Request $request)
    {
        Penerimaan::create([
            'daftar_id'   => $request->daftar_id,
            'persetujuan' => 'disetujui',
            'catatan'     => 'Disetujui oleh admin',
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil disetujui.');
    }

    public function rejectMenunggu(Request $request)
    {
        Penerimaan::create([
            'daftar_id'   => $request->daftar_id,
            'persetujuan' => 'ditolak',
            'catatan'     => 'Ditolak oleh admin',
        ]);

        return redirect()->back()->with('success', 'Pendaftaran ditolak.');
    }

    // 🔥 FIX BULK DELETE
    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        if (! $ids) {
            return back()->with('error', 'Tidak ada data dipilih');
        }

        // 🔥 Hapus relasi penerimaan dulu (biar aman)
        Penerimaan::whereIn('daftar_id', $ids)->delete();

        // 🔥 Hapus data siswa daftar
        Daftar_Eskul::whereIn('id', $ids)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
