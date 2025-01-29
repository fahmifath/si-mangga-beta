<?php

namespace App\Http\Controllers;

use App\Models\Detil;
use App\Models\SubDetil;
use Illuminate\Http\Request;

class SubDetilController extends Controller
{
    // Menampilkan daftar detil
    public function index()
    {
        // Ambil semua SubDetil dengan relasi detil

        $detils = Detil::with('subDetils')->get();

        // Kelompokkan berdasarkan nama Detil
        $groupedSubDetils = $detils->flatMap(function ($detil) {
            // Ambil SubDetil yang terkait dengan Detil ini
            return $detil->subDetils->map(function ($subDetil) use ($detil) {
                return [
                    'detil_name' => $detil->detil,
                    'kode' => $detil->kode,
                    'sub_detil' => $subDetil
                ];
            });
        })->groupBy('detil_name');


        return view('sub_detils.index', compact('groupedSubDetils'));
    }

    // Menampilkan form untuk membuat detil baru
    public function create()
    {
        $detils = Detil::all(); // Mengambil semua data detil
        return view('sub_detils.create', compact('detils'));
    }

    // Menyimpan data detil baru
    public function store(Request $request)
    {
        $request->validate([
            'sub_detil' => 'required|max:255',
            'detil_id' => 'required|numeric',
            // 'volume_output' => 'required|numeric',
            'quantity' => 'required|numeric',
            'satuan' => 'required|max:255',
            'harga_satuan' => 'required|numeric',
        ]);

        SubDetil::create($request->all()); // Menyimpan data ke dalam database
        return redirect()->route('sub_detils.index'); // Kembali ke halaman daftar detil
    }


    // Menampilkan form untuk mengedit detil
    public function edit(SubDetil $sub_detil)
    {
        $detils = Detil::all(); // Mengambil semua data detil
        return view('sub_detils.edit', compact('sub_detil', 'detils'));
    }

    // Menyimpan perubahan detil
    public function update(Request $request, SubDetil $sub_detil)
    {
        $request->validate([
            'sub_detil' => 'required|max:255',
            'detil_id' => 'required|numeric',
            // 'volume_output' => 'required|numeric',/\\
            'quantity' => 'required|numeric',
            'satuan' => 'required|max:255',
            'harga_satuan' => 'required|numeric',
        ]);

        $sub_detil->update($request->all()); // Mengupdate data detil
        return redirect()->route('sub_detils.index'); // Kembali ke halaman daftar detil
    }

    // Menghapus detil
    public function destroy(SubDetil $sub_detil)
    {
        $sub_detil->delete(); // Menghapus detil
        return redirect()->route('sub_detils.index'); // Kembali ke halaman daftar detil
    }
}
