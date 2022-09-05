<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notaris;
use App\Models\AktaNotarisJenis;
use App\Models\AktaNotarisJenisProses;
use Illuminate\Http\Request;

class AktaNotarisJenisProsesController extends Controller
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
        $jenis = AktaNotarisJenis::find($id);
        $data = AktaNotarisJenisProses::where('akta_notaris_jenis_id', $id)->get();
        return view('akta-notaris-jenis/edit-proses', compact('data', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $jenis = AktaNotarisJenis::find($id);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();

        $proses_jenis = [];

        foreach($request['id'] as $key => $value) {
            $proses = [
                'id' => $request['id'][$key],
                'deskripsi' => $request['proses'][$key],
                'jangka_waktu' => $request['waktu'][$key],
                'notaris_id' => $notaris->id,
                'akta_notaris_jenis_id' => $jenis->id,
            ];
            array_push($proses_jenis, $proses);
        }
        $del = $jenis->proses()->whereNotIn('id', $request->id)->delete();
        $jenis->proses()->upsert($proses_jenis, ['id']);
        return redirect('akta-notaris-jenis')->with('success', 'Berhasil memperbarui data.');

    }

    public function destroy($id)
    {
        AktaNotarisJenisProses::whereId($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data.');
    }
}
