<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Tagihan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagihanController extends Controller
{
    // tampilkan semua data tagihan
    public function index() : View
    {
        // data tagihan
        $tagihan = Tagihan::with(['proyek', 'klien', 'oleh'])->latest()->paginate(5);
        // tampilan tagihan
        return view('home.tagihan.index', compact('tagihan'));
    }

    public function destroy(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $pembelian = Pembelian::where('invoice', $id);
        $tagihan = Tagihan::where('invoice', $id);
        $pembelian->delete();
        $tagihan->delete();
        // kembalikan ke tampilan list pembelian
        return redirect()->route('tagihan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function update(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $pembelian = Pembelian::where('invoice', $id);
        $tagihan = Tagihan::where('invoice', $id);
        $var = $pembelian->first()->status == 0 ? 1 : 0;
        $pembelian->update([
            'status'     => $var,
        ]);
        $tagihan->update([
            'status'     => $var,
        ]);
        // kembalikan ke tampilan list pembelian
        return redirect()->route('tagihan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
