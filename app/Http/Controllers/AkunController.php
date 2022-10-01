<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notaris;
use App\Models\Akun;
use App\Models\KategoriAkun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $data = Akun::all();
        return view('akun/index', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriAkun::pluck('name', 'id');
        return view('akun/create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'debit' => 'nullable',
            'kredit' => 'nullable',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'kategori_akun_id' => 'required',
        ]);
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $data = array_merge($validate, ['notaris_id' => $notaris->id]);
        Akun::create($data);
        return redirect('akun')->with('success', 'Berhasil menambah data.');
    }

    public function show($id)
    {
        $data = Akun::find($id);
        return view('akun/show', compact('data'));
    }

    public function edit($id)
    {
        $data = Akun::find($id);
        $kategori = KategoriAkun::pluck('name', 'id');
        return view('akun/edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'debit' => 'nullable',
            'kredit' => 'nullable',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'kategori_akun_id' => 'required',
        ]);
        Akun::whereId($id)->update($validate);
        return redirect('akun')->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        Akun::whereId($id)->delete();
        return redirect('akun')->with('success', 'Berhasil menghapus data.');
    }
}
