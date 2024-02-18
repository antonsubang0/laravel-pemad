<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Tagihan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PembelianController extends Controller
{
    // tampilkan semua data pembelian
    public function index() : View
    {
        // data pembelian
        $pembelian = Pembelian::with(['proyek', 'klien', 'oleh'])->latest()->paginate(5);
        // tampilan pembelian
        return view('home.pembelian.index', compact('pembelian'));
    }

    public function destroy(string $id) : RedirectResponse
    {
        // cari titik poin dengan id
        $pembelian = Pembelian::where('invoice', $id);
        $tagihan = Tagihan::where('invoice', $id);
        $pembelian->delete();
        $tagihan->delete();
        // kembalikan ke tampilan list pembelian
        return redirect()->route('pembelian')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
