<?php

namespace App\Http\Controllers;

use App\Models\Tipepekerjaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TipePekrjaanContoller extends Controller
{
    // tampilkan semua data ttipe pekerjaan
    public function index() : View
    {
        // data tipe pekerjaan
        $tipes = Tipepekerjaan::latest()->paginate(5);
        // tampilan tipe pekerjaan
        return view('home.tipepeker.index', compact('tipes'));
    }

    // menampilkan form menambahakan tipe pekerjaan
    public function create() : View
    {
        return view('home.tipepeker.create');
    }
    // proses tambah tipe pekerjaan
    public function store(Request $request) : RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'tipe'     => 'required|min:3'
        ]);

        // menyimpan data ke database
        Tipepekerjaan::create([
            'tipe'     => $request->tipe
        ]);

        // kembalikan ke tampilan list tipe pekerjaan
        return redirect()->route('tipepekerjaan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    // tampilkan form edit
    public function edit(string $id): View
    {
        // detail item tipe pekerjaan
        $types = Tipepekerjaan::findOrFail($id);
        return view('home.tipepeker.edit', compact('types'));
    }
    // proses update tipe pekerjaan
    public function update(Request $request,string $id): RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'tipe'     => 'required|min:3'
        ]);
        // tentukan titik point yg diupdate dengan id
        $types =Tipepekerjaan::findOrFail($id);
        // update data ke database
        $types->update([
            'tipe'     => $request->tipe,
        ]);

        // kembalikan ke tampilan list tipe pekerjaan
        return redirect()->route('tipepekerjaan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    // proses hapus tipe pekerjaan
    public function destroy(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $types = Tipepekerjaan::findOrFail($id);
        // pproses hapus type pekerjaan
        $types->delete();
        // kembalikan ke tampilan list tipe pekerjaan
        return redirect()->route('tipepekerjaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
