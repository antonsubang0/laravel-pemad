<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Proyek;
use App\Models\Tipepekerjaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    // tampilkan semua proyek
    public function index() : View {
        // data proyek
        $proyeks = Proyek::with(['klien', 'tipekrj'])->latest()->paginate(5);
        // tampilan data proyek
        return view('home.proyek.index', compact('proyeks'));
    }

    // menampilkan form menambahakan proyek
    public function create() : View
    {
        $tipe = Tipepekerjaan::all();
        $klien = Klien::all();
        return view('home.proyek.create')->with('tipe', $tipe)->with('klien', $klien);
    }
    // proses tambah proyek
    public function store(Request $request) : RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'proyek'     => 'required|min:5',
            'harga_proyek'   => 'required|numeric',
            'tipepekerjaan_id'   => 'required|numeric',
            'by_klien_id'  => 'required|numeric',
        ]);

        // menyimpan data ke database
        Proyek::create([
            'proyek'     => $request->proyek,
            'harga_proyek'   => $request->harga_proyek,
            'tipepekerjaan_id'   => $request->tipepekerjaan_id,
            'by_klien_id' => $request->by_klien_id,
        ]);

        // kembalikan ke tampilan list proyek
        return redirect()->route('proyek.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // tampilkan detail proyek
    public function show(string $id) : View
    {
        // detail item proyek dengan user penambahnya
        $proyeks = Proyek::with(['klien', 'tipekrj'])->findOrFail($id);
        // tampilan data proyek
        return view('home.proyek.show', compact('proyeks'));
    }
    // tampilkan form edit
    public function edit(string $id): View
    {
        // detail item proyek
        $proyek = Proyek::with(['klien', 'tipekrj'])->findOrFail($id);
        $tipe = Tipepekerjaan::all();
        $klien = Klien::all();
        return view('home.proyek.edit', compact('proyek'))->with('tipe', $tipe)->with('klien', $klien);
    }
    // proses update klien
    public function update(Request $request,string $id): RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'proyek'     => 'required|min:5',
            'harga_proyek'   => 'required|numeric',
            'tipepekerjaan_id'   => 'required|numeric',
            'by_klien_id'  => 'required|numeric',
        ]);
        // tentukan titik point yg diupdate dengan id
        $proyek = Proyek::findOrFail($id);
        // update data ke database
        $proyek->update([
            'proyek'     => $request->proyek,
            'harga_proyek'   => $request->harga_proyek,
            'tipepekerjaan_id'   => $request->tipepekerjaan_id,
            'by_klien_id' => $request->by_klien_id,
        ]);

        // kembalikan ke tampilan list proyek
        return redirect()->route('proyek.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    // proses hapus proyek
    public function destroy(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $proyek = Proyek::findOrFail($id);
        // pproses hapus proyek
        $proyek->delete();
        // kembalikan ke tampilan list proyek
        return redirect()->route('proyek.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
