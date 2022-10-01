<?php

namespace App\Http\Controllers;

use App\Models\AktaBadanJenis;
use App\Models\AktaBadanJenisSifat;
use Illuminate\Http\Request;

class AktaBadanJenisController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('akta-badan-jenis/create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validate = $request->validate(['name' => 'required|unique:akta_badan_jenis']);
        $akta_jenis = AktaBadanJenis::create($validate);

        foreach ($request['sifat'] as $key => $value) {
            if ($request['sifat'][$key]) {
                AktaBadanJenisSifat::create(['name' => $value,'akta_badan_jenis_id' => $akta_jenis->id]);
            }
        }

        return redirect('akta-badan-jenis-sifat')->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
