<?php

namespace App\Http\Controllers;

use App\Models\AktaPpat;
use App\Models\AktaPpatProses;
use App\Models\AktaPpatJenisProses;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AktaPpatProsesController extends Controller
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
        $data = AktaPpat::find($id);
        $proses = AktaPpatJenisProses::where('akta_ppat_jenis_id', $data->akta_ppat_jenis_id)->pluck('deskripsi', 'id');
        return view('akta-ppat/edit-proses', compact('data', 'proses'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'akta_ppat_jenis_proses_id' => 'required',
            'keterangan' => 'nullable',
        ]);
        $tanggal = Carbon::now();
        $data = array_merge($validate, ['akta_ppat_id' => $id, 'tanggal' => $tanggal]);
        AktaPpatProses::create($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan data baru.');
    }

    public function destroy($id)
    {
        //
    }
}
