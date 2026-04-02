<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    // ===============================
    // TAMPIL DATA SISWA
    // ===============================
    public function index()
    {
        $siswa = User::where('is_admin', 'false')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.siswa.index', compact('siswa'));
    }

    // ===============================
    // FORM TAMBAH SISWA
    // ===============================
    public function create()
    {
        return view('admin.siswa.create');
    }

    // ===============================
    // SIMPAN SISWA MANUAL
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'kelas'    => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'kelas'    => $request->kelas,
            'is_admin' => false,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data berhasil ditambahkan');

    }

    // ===============================
    // FORM EDIT SISWA
    // ===============================
    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    // ===============================
    // UPDATE SISWA
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'kelas' => 'required',
        ]);

        $siswa = User::findOrFail($id);
        $siswa->update([
            'name'  => $request->name,
            'email' => $request->email,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    // ===============================
    // HAPUS SISWA
    // ===============================
    public function bulkDelete(Request $request)
    {
        if (! $request->ids) {
            return back()->with('error', 'Pilih data dulu!');
        }

        User::whereIn('id', $request->ids)->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }

    // ===============================
    // IMPORT SISWA DARI EXCEL
    // ===============================
    public function import(Request $request)
    {
    $import = new SiswaImport;
    Excel::import($import, $request->file('file'));

    $success   = $import->success;
    $duplicate = $import->duplicate;

    // 🔥 SATU NOTIF SAJA
    if ($success > 0 && $duplicate > 0) {
        $message = "Import selesai: $success berhasil, $duplicate gagal (email duplikat)";
    } elseif ($success > 0) {
        $message = "Import berhasil: $success data";
    } else {
        $message = "Import gagal: semua data duplikat";
    }

    return redirect()->back()->with('success', $message);
}

}
