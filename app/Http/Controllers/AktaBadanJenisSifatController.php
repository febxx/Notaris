<?php

namespace App\Http\Controllers;

use App\Models\AktaBadanJenisSifat;
use Illuminate\Http\Request;

class AktaBadanJenisSifatController extends Controller
{
    public function index()
    {
        $data = AktaBadanJenisSifat::all();
        return view('akta-badan-jenis/index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data = AktaBadanJenisSifat::find($id);
        return view('akta-badan-jenis/show', compact('data'));
    }

    public function edit($id)
    {
        $data = AktaBadanJenisSifat::find($id);
        return view('akta-badan-jenis/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        AktaBadanJenisSifat::whereId($id)->update(['name' => $request->name]);
        return redirect('akta-badan-jenis-sifat')->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        AktaBadanJenisSifat::whereId($id)->delete();
        return redirect('akta-badan-jenis-sifat')->with('success', 'Berhasil menghapus data.');
    }
}
