<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notaris;
use App\Models\AktaNotarisJenis;
use App\Models\AktaNotarisJenisProses;
use Illuminate\Http\Request;

class AktaNotarisJenisController extends Controller
{
    public function index()
    {
        $data = AktaNotarisJenis::all()->sortBy('name');
        return view('akta-notaris-jenis/index', compact('data'));
    }

    public function create()
    {
        return view('akta-notaris-jenis/create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(['name' => 'required']);
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $data = array_merge($validate, ['notaris_id' => $notaris->id]);
        $jenis_akta = AktaNotarisJenis::create($data);

        foreach ($request['proses'] as $key => $value) {
            if ($request['proses'][$key]) {
                AktaNotarisJenisProses::create([
                    'deskripsi' => $request['proses'][$key],
                    'jangka_waktu' => $request['waktu'][$key],
                    'notaris_id' => $notaris->id,
                    'akta_notaris_jenis_id' => $jenis_akta->id,
                ]);
            }
        }
        return redirect('akta-notaris-jenis')->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {
        $data = AktaNotarisJenis::find($id);
        return view('akta-notaris-jenis/show', compact('data'));
    }

    public function edit($id)
    {
        $data = AktaNotarisJenis::find($id);
        return view('akta-notaris-jenis/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        AktaNotarisJenis::whereId($id)->update(['name' => $request->name]);
        return redirect('akta-notaris-jenis')->with('success', 'Berhasil memperbarui data.');

    }

    public function destroy($id)
    {
        AktaNotarisJenis::whereId($id)->delete();
        return redirect('akta-notaris-jenis')->with('success', 'Berhasil menghapus data.');
    }
}
