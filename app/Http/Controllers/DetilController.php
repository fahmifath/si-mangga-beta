<?php

namespace App\Http\Controllers;

use App\Models\Detil;
use Illuminate\Http\Request;

class DetilController extends Controller
{
    // Menampilkan daftar detil
    public function index()
    {
        $detils = Detil::all(); // Mengambil semua data dari tabel 'detils'
        return view('detils.index', compact('detils')); // Menampilkan ke view 'index'
    }

    // Menampilkan form untuk membuat detil baru
    public function create()
    {
        return view('detils.create');
    }

    // Menyimpan data detil baru
    public function store(Request $request)
    {
        $request->validate([
            'detil' => 'required|max:255',
            'kode' => 'required|max:255',
        ]);

        Detil::create($request->all()); // Menyimpan data ke dalam database
        return redirect()->route('detils.index'); // Kembali ke halaman daftar detil
    }

    public function show(Detil $detil)
    {
        return view('detils.show', compact('detil'));
    }

    // Menampilkan form untuk mengedit detil
    public function edit(Detil $detil)
    {
        return view('detils.edit', compact('detil'));
    }

    // Menyimpan perubahan detil
    public function update(Request $request, Detil $detil)
    {
        $request->validate([
            'detil' => 'required|max:255',
            'kode' => 'required|max:255',
        ]);

        $detil->update($request->all()); // Mengupdate data detil
        return redirect()->route('detils.index'); // Kembali ke halaman daftar detil
    }

    // Menghapus detil
    public function destroy(Detil $detil)
    {
        $detil->delete(); // Menghapus detil
        return redirect()->route('detils.index'); // Kembali ke halaman daftar detil
    }
}
