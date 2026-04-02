<?php

namespace App\Http\Controllers;

use App\Models\Daftar_Eskul;
use App\Models\Eskul;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarEskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if ($request->filled('filter_tahun')) {
            session(['filter_tahun' => $request->filter_tahun]);
        }

        $tahunFilter = session('filter_tahun'); // ini global filter dari dropdown sidebar

        $eskul = Eskul::all();

        $tahunAjaran = Daftar_Eskul::select('tahun_ajaran')->distinct()->pluck('tahun_ajaran');
        $kelasList = Daftar_Eskul::select('kelas')->distinct()->pluck('kelas');

        $query = Daftar_Eskul::with(['user', 'eskul']);

        
        if ($tahunFilter) {
            $query->where('tahun_ajaran', $tahunFilter);
        }

        
        if ($request->filled('tahun_ajaran')) {
            $query->where('tahun_ajaran', $request->tahun_ajaran);
        }

        if ($request->filled('ekstrakurikuler')) {
            $query->whereHas('eskul', function ($q) use ($request) {
                $q->where('nama_eskul', $request->ekstrakurikuler);
            });
        }

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        $daftar = $query->paginate(10)->appends($request->all());

        return view('admin.daftar_eskul.index', compact('daftar', 'eskul', 'tahunAjaran', 'kelasList', 'tahunFilter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarEskul = Daftar_Eskul::all();
        $eskul = Eskul::all();
        $user = User::all();
        return view('admin.daftar_eskul.create', compact('eskul', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas' => 'required|string|max:50',
            'eskul_id' => 'required|exists:eskuls,id',
            'tahun_ajaran' => 'required|string|max:10',
            'no_telp' => 'nullable|string|max:15',
            'alasan' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['kelas', 'eskul_id', 'tahun_ajaran', 'no_telp', 'alasan']);
        $data['user_id'] = auth()->id();

        Daftar_Eskul::create($data);

        return redirect()->route('home')->with('success', 'Pendaftaran berhasil! Silahkan tunggu konfirmasi dari admin.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftar_Eskul $daftar_Eskul)
    {
        $daftarEskul = Daftar_Eskul::with(['user', 'eskul'])->find($daftar_Eskul->id);
        $user = User::all();
        $eskul = Eskul::all();
        return view('admin.daftar_eskul.create', compact('daftar_Eskul', 'eskul', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar_Eskul $daftar_Eskul)
    {
        $user = User::all();
        $eskul = Eskul::all();
        return view('admin.daftar_eskul.edit', [
            'daftar_Eskul' => $daftar_Eskul,
            'user' => $user,
            'eskul' => $eskul,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftar_Eskul $daftar_Eskul)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'kelas' => 'required|string|max:50',
            'eskul_id' => 'required|exists:eskuls,id',
            'tahun_ajaran' => 'required|string|max:10',
            'no_telp' => 'nullable|string|max:15',
            'alasan' => 'nullable|string|max:255',
        ]);

        $daftar_Eskul->update($request->all());
        return redirect()->route('admin.daftar_eskul.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar_Eskul $daftar_Eskul)
    {
        $daftar_Eskul->delete();
        return redirect()->route('admin.daftar_eskul.index')->with('success', 'Data berhasil dihapus');
    }
}
