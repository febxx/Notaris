<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Akun;
use App\Models\Notaris;
use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $data = Depresiasi::all();
        return view('depresiasi/index', compact('data'));
    }

    public function create()
    {
        $akun = Akun::where('kategori_akun_id', 4)->pluck('nama', 'id');
        return view('depresiasi/create', compact('akun'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nominal' => 'required',
            'keterangan' => 'required',
            'akun_id' => 'required',
        ]);
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $data = array_merge($validate, ['notaris_id' => $notaris->id]);
        Depresiasi::create($data);
        return redirect('depresiasi')->with('success', 'Berhasil menambah data.');
    }

    public function show($id)
    {
        $data = Depresiasi::find($id);
        return view('depresiasi/show', compact('data'));
    }

    public function edit($id)
    {
        $data = Depresiasi::find($id);
        $akun = Akun::where('kategori_akun_id', 4)->pluck('nama', 'id');
        return view('depresiasi/edit', compact('data', 'akun'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nominal' => 'required',
            'keterangan' => 'required',
            'akun_id' => 'required',
        ]);
        Depresiasi::whereId($id)->update($validate);
        return redirect('depresiasi')->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        Depresiasi::whereId($id)->delete();
        return redirect('akun')->with('success', 'Berhasil menghapus data.');
    }
}
