<?php

namespace App\Http\Controllers;

use App\Models\SuratSifat;
use App\Models\Notaris;
use Illuminate\Http\Request;
use Auth;

class SuratSifatController extends Controller
{
    public function index()
    {
        $data = SuratSifat::all();
        return view('surat-sifat/index', compact('data'));
    }

    public function create()
    {
        return view('surat-sifat/create');
    }

    public function store(Request $request)
    {
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $data = array_merge($request->all(), ['notaris_id' => $notaris->id]);
        SuratSifat::create($data);
        return redirect('surat-sifat')->with('success', 'Berhasil menambah data.');

    }

    public function show($id)
    {
        $data = SuratSifat::find($id);
        return view('surat-sifat/show', compact('data'));
    }

    public function edit($id)
    {
        $data = SuratSifat::find($id);
        return view('surat-sifat/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        SuratSifat::whereId($id)->update($request->all());
        return redirect('surat-sifat')->with('success', 'Berhasil menghapus data.');
    }

    public function destroy($id)
    {
        SuratSifat::whereId($id)->delete();
        return redirect('surat-sifat')->with('success', 'Berhasil menghapus data.');
    }
}
