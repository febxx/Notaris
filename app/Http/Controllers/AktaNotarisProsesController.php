<?php

namespace App\Http\Controllers;

use App\Models\AktaNotaris;
use App\Models\AktaNotarisProses;
use App\Models\AktaNotarisJenisProses;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AktaNotarisProsesController extends Controller
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
        $data = AktaNotaris::find($id);
        $proses = AktaNotarisJenisProses::where('akta_notaris_jenis_id', $data->akta_notaris_jenis_id)->pluck('deskripsi', 'id');
        return view('akta-notaris/edit-proses', compact('data', 'proses'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'akta_notaris_jenis_proses_id' => 'required',
            'keterangan' => 'nullable',
        ]);
        $tanggal = Carbon::now();
        $data = array_merge($validate, ['akta_notaris_id' => $id, 'tanggal' => $tanggal]);
        AktaNotarisProses::create($data);
        return view()->back()->with('success', 'Berhasil menambahkan data baru.');
    }

    public function destroy($id)
    {
        //
    }
}
