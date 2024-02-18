<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Perusahaan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    // / tampilkan perusahaan
    public function index() : View
    {
        // data klien
        $perusahaan = Klien::with(['perusahaan'])->latest()->paginate(5);
        // dd($perusahaan);
        // tampilan perusahaan dari klien
        return view('home.perusahaan.index', compact('perusahaan'));
    }

    public function edit(string $id): View
    {
        // detail item klien
        $klien = Klien::with(['perusahaan'])->findOrFail($id);
        return view('home.perusahaan.edit', compact('klien'));
    }
    // proses update klien
    public function update(Request $request,string $id): RedirectResponse
    {
        // validasi input form
        $this->validate($request, [
            'bank' => 'required',
            'rekening' => 'required',
            'perusahaan' => 'required',
        ]);
        // tentukan titik point yg dicreate/diupdate dengan id
        $pekerjaan = Perusahaan::where('klien_id', $id);
        if (count($pekerjaan->get()) == 0) {
            Perusahaan::create([
                'bank' => $request->bank,
                'rekening' => $request->rekening,
                'nama_perusahaan' => $request->perusahaan,
                'klien_id' => $id,
            ]);
        } else  {
            $pekerjaan->update([
                'bank' => $request->bank,
                'rekening' => $request->rekening,
                'nama_perusahaan' => $request->perusahaan,
                'klien_id' => $id,
            ]);
        }
        // kembalikan ke tampilan pekerjaan klien
        return redirect()->route('perusahaan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
