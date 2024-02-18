<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Permintaan;
use App\Models\Proyek;
use App\Models\Tipepekerjaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    // tampilkan semua permintaan
    public function index() : View {
        // data permintaan
        $permintaan = Permintaan::with(['klien', 'tipekrj'])->latest()->paginate(5);
        // tampilan data permintaan
        return view('home.permintaan.index', compact('permintaan'));
    }

    // menampilkan form menambahakan permintaan
    public function create() : View
    {
        $tipe = Tipepekerjaan::all();
        $klien = Klien::all();
        return view('home.permintaan.create')->with('tipe', $tipe)->with('klien', $klien);
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
        Permintaan::create([
            'proyek'     => $request->proyek,
            'harga_proyek'   => $request->harga_proyek,
            'tipepekerjaan_id'   => $request->tipepekerjaan_id,
            'by_klien_id' => $request->by_klien_id,
        ]);

        // kembalikan ke tampilan list proyek
        return redirect()->route('permintaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // tampilkan detail proyek
    public function show(string $id) : View
    {
        // detail item proyek dengan user penambahnya
        $permintaan = Permintaan::with(['klien', 'tipekrj'])->findOrFail($id);
        // tampilan data proyek
        return view('home.permintaan.show', compact('permintaan'));
    }
    // tampilkan form edit
    public function edit(string $id): View
    {
        // detail item proyek
        $permintaan = Permintaan::with(['klien', 'tipekrj'])->findOrFail($id);
        $tipe = Tipepekerjaan::all();
        $klien = Klien::all();
        return view('home.permintaan.edit', compact('permintaan'))->with('tipe', $tipe)->with('klien', $klien);
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
        $permintaan = Permintaan::findOrFail($id);
        // update data ke database
        $permintaan->update([
            'proyek'     => $request->proyek,
            'harga_proyek'   => $request->harga_proyek,
            'tipepekerjaan_id'   => $request->tipepekerjaan_id,
            'by_klien_id' => $request->by_klien_id,
        ]);

        // kembalikan ke tampilan list proyek
        return redirect()->route('permintaan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    // proses hapus proyek
    public function destroy(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $permintaan = Permintaan::findOrFail($id);
        // pproses hapus proyek
        $permintaan->delete();
        // kembalikan ke tampilan list proyek
        return redirect()->route('permintaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function terima(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $permintaan = Permintaan::where('id', $id);
        $temp = $permintaan->first();
        Proyek::create([
            'proyek'     => $temp->proyek,
            'harga_proyek'   => $temp->harga_proyek,
            'tipepekerjaan_id'   => $temp->tipepekerjaan_id,
            'by_klien_id' => $temp->by_klien_id,
        ]);
        // pproses hapus proyek
        $permintaan->delete();
        // kembalikan ke tampilan list proyek
        return redirect()->route('permintaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
