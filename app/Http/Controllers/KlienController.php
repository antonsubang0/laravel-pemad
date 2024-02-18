<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Pekerjaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlienController extends Controller
{
    // tampilkan semua data klien
    public function index() : View
    {
        // data klien
        $kliens = Klien::latest()->paginate(5);
        // tampilan klien
        return view('home.klien.index', compact('kliens'));
    }

    // menampilkan form menambahakan klien
    public function create() : View
    {
        return view('home.klien.create');
    }
    // proses tambah klien
    public function store(Request $request) : RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'hp'   => 'required|min:11',
            'alamat'   => 'required|min:20'
        ]);

        // menyimpan data ke database
        Klien::create([
            'name'     => $request->name,
            'hp'   => $request->hp,
            'alamat'   => $request->alamat,
            'ditambahkan_oleh' => Auth::id(),
        ]);

        // kembalikan ke tampilan list klien
        return redirect()->route('klien.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // tampilkan detail
    public function show(string $id) : View
    {
        // detail item klien dengan user penambahnya
        $klien = Klien::with(['user', 'pekerjaan', 'tipepekerjaan'])->findOrFail($id);
        return view('home.klien.show', compact('klien'));
    }
    // tampilkan form edit
    public function edit(string $id): View
    {
        // detail item klien
        $klien = Klien::findOrFail($id);
        return view('home.klien.edit', compact('klien'));
    }
    // proses update klien
    public function update(Request $request,string $id): RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'name'     => 'required|min:5',
            'hp'   => 'required|min:11',
            'alamat'   => 'required|min:20'
        ]);
        // tentukan titik point yg diupdate dengan id
        $klien = Klien::findOrFail($id);
        // update data ke database
        $klien->update([
            'name'     => $request->name,
            'hp'   => $request->hp,
            'alamat'   => $request->alamat,
            'ditambahkan_oleh' => Auth::id()
        ]);

        // kembalikan ke tampilan list klien
        return redirect()->route('klien.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    // proses hapus klien
    public function destroy(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $klien = Klien::findOrFail($id);
        $pekerjaan = Pekerjaan::where('klien_id', $id);
        // pproses hapus klien dan pekerjaan
        $klien->delete();
        $pekerjaan->delete();
        // kembalikan ke tampilan list klien
        return redirect()->route('klien.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
