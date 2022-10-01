<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notaris;
use App\Models\AktaPpatJenis;
use App\Models\AktaPpatJenisProses;
use Illuminate\Http\Request;

class AktaPpatJenisController extends Controller
{
    public function index()
    {
        $data = AktaPpatJenis::all()->sortBy('name');
        return view('akta-ppat-jenis/index', compact('data'));
    }

    public function create()
    {
        return view('akta-ppat-jenis/create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(['name' => 'required', 'deskripsi' => 'required']);
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $data = array_merge($validate, ['notaris_id' => $notaris->id]);
        $akta_jenis = AktaPpatJenis::create($data);

        foreach ($request['proses'] as $key => $value) {
            if ($request['proses'][$key]) {
                AktaPpatJenisProses::create([
                    'deskripsi' => $request['proses'][$key],
                    'jangka_waktu' => $request['waktu'][$key],
                    'notaris_id' => $notaris->id,
                    'akta_ppat_jenis_id' => $akta_jenis->id,
                ]);
            }
        }

        return redirect('akta-ppat-jenis')->with('success', 'Berhasil menambahkan data baru.');
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
