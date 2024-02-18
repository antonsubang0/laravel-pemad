<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Pembelian;
use App\Models\Penawaran;
use App\Models\Proyek;
use App\Models\Tagihan;
use App\Models\Tipepekerjaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProyekContoller extends Controller
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
    public function beli(string $id): View
    {
        // detail item proyek
        $proyek = Proyek::with(['klien', 'tipekrj'])->findOrFail($id);
        $klien = Klien::all();
        return view('home.proyek.beli', compact('proyek'))->with('klien', $klien);
    }
    public function belistore(Request $request, string $id) : RedirectResponse
    {
        $this->validate($request, [
            'by_klien_id'  => 'required|numeric',
        ]);
        $invoice = time();
        // cari titik poin dengan id
        $result = Proyek::findOrFail($id)->first();
        Pembelian::create([
            'proyek_id' => $id,
            'harga_proyek' => $result->harga_proyek,
            'status' => 0,
            'by_klien_id' => $request->by_klien_id,
            'invoice' => $invoice,
        ]);
        Tagihan::create([
            'proyek_id' => $id,
            'harga_proyek' => $result->harga_proyek,
            'status' => 0,
            'by_klien_id' => $request->by_klien_id,
            'invoice' => $invoice,
        ]);
        // redirect ke pembelian
        return redirect()->route('proyek.index')->with(['success' => 'Data Berhasil Dibeli!']);
    }
    public function tawar(string $id): View
    {
        // detail item proyek
        $proyek = Proyek::with(['klien', 'tipekrj'])->findOrFail($id);
        $klien = Klien::all();
        return view('home.proyek.penawaran', compact('proyek'))->with('klien', $klien);
    }
    public function tawarstore(Request $request, string $id) : RedirectResponse
    {
        $this->validate($request, [
            'harga_tawar' =>  'required|numeric',
            'by_klien_id'  => 'required|numeric',
        ]);
        Penawaran::create([
            'proyek_id' => $id,
            'harga_penawaran' => $request->harga_tawar,
            'by_klien_id' => $request->by_klien_id,
        ]);
        // redirect ke penawaran
        return redirect()->route('proyek.index')->with(['success' => 'Data Berhasil Ditawar!']);
    }
}
