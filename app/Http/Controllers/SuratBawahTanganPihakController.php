<?php

namespace App\Http\Controllers;

use App\Models\SuratBawahTangan;
use App\Models\SuratBawahTanganPihak;
use Illuminate\Http\Request;

class SuratBawahTanganPihakController extends Controller
{
    public function index()
    {
        //
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
        //
    }

    public function edit($id)
    {
        $surat = SuratBawahTangan::find($id);
        $data = SuratBawahTanganPihak::where('surat_bawah_tangan_id', $id)->get();
        return view('surat-bawah-tangan/edit-pihak', compact('data', 'surat'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
