<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notaris;
use App\Models\SuratSifat;
use App\Models\SuratBawahTangan;
use App\Models\SuratBawahTanganPihak;
use Illuminate\Http\Request;

class SuratBawahTanganController extends Controller
{
    public function index()
    {
        $data = SuratBawahTangan::all();
        return view('surat-bawah-tangan/index', compact('data'));
    }

    public function create()
    {
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $sifat = SuratSifat::where('notaris_id', $notaris->id)->pluck('name', 'id');
        return view('surat-bawah-tangan/create', compact('sifat'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $validate = $request->validate([
            'nomor_urut' => 'required',
            'tanggal' => 'nullable',
            'jenis' => 'required',
            'surat_sifat_id' => 'required',
        ]);
        $data = array_merge($validate, ['notaris_id' => $notaris->id]);
        $surat = SuratBawahTangan::create($data);

        foreach ($request['nama'] as $key => $value) {
            if ($request['nama'][$key]) {
                SuratBawahTanganPihak::create([
                    'nama' => $value,
                    'surat_bawah_tangan_id' => $surat->id,
                    'alamat' => $request['alamat'][$key],
                    'rt' => $request['rt'][$key],
                    'rw' => $request['rw'][$key],
                    'dusun' => $request['dusun'][$key],
                ]);
            }
        }
        return redirect('surat-bawah-tangan')->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {
        $data = SuratBawahTangan::find($id);
        return view('surat-bawah-tangan/show', compact('data'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $sifat = SuratSifat::where('notaris_id', $notaris->id)->pluck('name', 'id');
        $data = SuratBawahTangan::find($id);
        return view('surat-bawah-tangan/edit', compact('data', 'sifat'));
    }

    public function update(Request $request, $id)
    {
        SuratBawahTangan::whereId($id)->update([
            'nomor_urut' => $request->nomor_urut,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'surat_sifat_id' => $request->surat_sifat_id,
        ]);
        return redirect('surat-bawah-tangan')->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        SuratBawahTangan::whereId($id)->delete();
        return redirect('surat-bawah-tangan')->with('success', 'Berhasil menghapus data.');
    }
}
