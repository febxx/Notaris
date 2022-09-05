<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\AktaNotaris;
use App\Models\AktaNotarisPihak;
use Illuminate\Http\Request;

class AktaNotarisPihakController extends Controller
{
    public function index()
    {
        $data = AktaNotarisPihak::all();
        return view('akta-notaris-pihak/index', compact('data'));
    }

    public function create(Request $request)
    {
        $data = AktaNotaris::find($request->id);
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-notaris-pihak/create', compact('data', 'provinsi'));
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
        $data = array_merge($validate, ['akta_notaris_id' => $request->id]);
        AktaNotarisPihak::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {

    }

    public function edit(Request $request, $id)
    {
        $data = AktaNotaris::find($request->id);
        $pihak = AktaNotarisPihak::find($id);
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-notaris-pihak/edit', compact('data', 'pihak', 'provinsi'));
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
        $data = array_merge($validate, ['akta_notaris_id' => $request->id]);
        AktaNotarisPihak::whereId($id)->update($data);
        return redirect()->back()->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        AktaNotarisPihak::whereId($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data.');
    }
}
