<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penawaran;
use App\Models\Tagihan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PenawaranController extends Controller
{
    // tampilkan semua data penawaran
    public function index() : View
    {
        // data penawaran
        $penawaran = Penawaran::with(['proyek', 'oleh', 'yangnawar', 'tipekrj'])->latest()->paginate(5);
        // tampilan penawaran
        return view('home.penawaran.index', compact('penawaran'));
    }

    // proses update klien
    public function update(string $id): RedirectResponse
    {
        // validasi input form
        $penawaran = Penawaran::where('id', $id);
        $invoice = time();
        $temp = $penawaran->first();
        Pembelian::create([
            'proyek_id' => $temp->proyek_id,
            'harga_proyek' => $temp->harga_penawaran,
            'status' => 0,
            'by_klien_id' => $temp->by_klien_id,
            'invoice' => $invoice,
        ]);
        Tagihan::create([
            'proyek_id' => $temp->proyek_id,
            'harga_proyek' => $temp->harga_penawaran,
            'status' => 0,
            'by_klien_id' => $temp->by_klien_id,
            'invoice' => $invoice,
        ]);

        $penawaran->delete();

        // kembalikan ke tampilan list klien
        return redirect()->route('tawar')->with(['success' => 'Data Berhasil Diubah!']);
    }
    // proses hapus klien
    public function destroy(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $klien = Penawaran::findOrFail($id);
        $klien->delete();
        return redirect()->route('tawar')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
