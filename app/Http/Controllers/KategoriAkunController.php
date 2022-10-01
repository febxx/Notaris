<?php

namespace App\Http\Controllers;

use App\Models\KategoriAkun;
use Illuminate\Http\Request;

class KategoriAkunController extends Controller
{
    public function index()
    {
        $data = KategoriAkun::all()->sortBy('name');
        return view('akun/kategori', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(KategoriAkun $kategoriAkun)
    {
        //
    }

    public function edit(KategoriAkun $kategoriAkun)
    {
        //
    }

    public function update(Request $request, KategoriAkun $kategoriAkun)
    {
        //
    }

    public function destroy(KategoriAkun $kategoriAkun)
    {
        //
    }
}
