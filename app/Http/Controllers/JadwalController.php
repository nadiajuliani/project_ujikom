<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Eskul;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eskuls = Eskul::all();
        return view('admin.jadwal.create', compact('eskuls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'eskul_id' => 'required|exists:eskuls,id',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);
        Jadwal::create($request->all());
        return redirect()->route('admin.jadwal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return view('admin.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $eskuls = Eskul::all();
        return view('admin.jadwal.edit', compact('jadwal', 'eskuls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->update($request->all());
        return redirect()->route('admin.jadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index');
    }
}
