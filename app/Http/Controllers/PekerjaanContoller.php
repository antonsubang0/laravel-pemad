<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Pekerjaan;
use App\Models\Tipepekerjaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PekerjaanContoller extends Controller
{
    // tampilkan semua data klien
    public function index() : View
    {
        // data klien
        $pekerjaan = Klien::with(['pekerjaan', 'tipepekerjaan'])->latest()->paginate(5);
        // dd($pekerjaan);
        // tampilan klien
        return view('home.pekerjaan.index', compact('pekerjaan'));
    }

    public function edit(string $id): View
    {
        // detail item klien
        $klien = Klien::with('pekerjaan')->findOrFail($id);
        $tipe = Tipepekerjaan::all();
        return view('home.pekerjaan.edit', compact('klien'))->with('tipe', $tipe);
    }
    // proses update klien
    public function update(Request $request,string $id): RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'tipepekerjaan_id'     => 'required|numeric',
            'pekerjaan'   => 'required|min:5'
        ]);
        // tentukan titik point yg dicreate/diupdate dengan id
        $pekerjaan = Pekerjaan::where('klien_id', $id);
        if (count($pekerjaan->get()) == 0) {
            Pekerjaan::create([
                'klien_id' => $id,
                'tipepekerjaan_id'     => $request->tipepekerjaan_id,
                'pekerjaan'   => $request->pekerjaan
            ]);
        } else  {
            $pekerjaan->update([
                'tipepekerjaan_id'     => $request->tipepekerjaan_id,
                'pekerjaan'   => $request->pekerjaan
            ]);
        }
        // kembalikan ke tampilan pekerjaan klien
        return redirect()->route('pekerjaan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
