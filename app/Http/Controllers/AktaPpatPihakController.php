<?php

namespace App\Http\Controllers;

use App\Models\AktaPpat;
use App\Models\AktaPpatPihak;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class AktaPpatPihakController extends Controller
{
    public function index()
    {
        $data = AktaPpatPihak::all();
        return view('akta-ppat-pihak/index', compact('data'));
    }

    public function create(Request $request)
    {
        $data = AktaPpat::find($request->id);
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-ppat-pihak/create', compact('data', 'provinsi'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nik' => 'nullable',
            'selaku' => 'required',
            'npwp' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'kelurahan_id' => 'nullable',
        ]);
        $data = array_merge($validate, ['akta_ppat_id' => $request->id]);
        AktaPpatPihak::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $data = AktaPpat::find($request->id);
        $pihak = AktaPpatPihak::find($id);
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-ppat-pihak/edit', compact('data', 'pihak', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nik' => 'nullable',
            'selaku' => 'required',
            'npwp' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'kelurahan_id' => 'nullable',
        ]);
        $data = array_merge($validate, ['akta_ppat_id' => $request->id]);
        AktaPpatPihak::whereId($id)->update($data);
        return redirect()->back()->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        AktaPpatPihak::whereId($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data.');
    }
}
