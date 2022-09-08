<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Staff;
use App\Models\Client;
use App\Models\Notaris;
use App\Models\AktaPpat;
use App\Models\AktaBadan;
use App\Models\AktaNotaris;
use App\Models\AktaPpatJenis;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use Illuminate\Support\Str;

class AktaPpatController extends Controller
{
    public function index()
    {
        $data = AktaPpat::all()->sortBy('name');
        return view('akta-ppat/index', compact('data'));
    }

    public function create()
    {
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $jenis = AktaPpatJenis::pluck('name', 'id');
        $staff = Staff::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $client = Client::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-ppat/create', compact('jenis', 'staff', 'client', 'provinsi'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'akta_ppat_jenis_id' => 'required',
            'tanggal' => 'nullable',
            'nomor' => 'required|unique:akta_badan',
            'staff_id' => 'nullable',
            'client_id' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'kelurahan_id' => 'nullable',
            'luas_tanah' => 'nullable',
            'luas_bangunan' => 'nullable',
            'nilai_pengalihan' => 'nullable',
            'nop' => 'nullable',
            'njop_tahun' => 'nullable',
            'njop_tanah' => 'nullable',
            'njop_bangunan' => 'nullable',
            'ssp_tanggal' => 'nullable',
            'ssp_nilai' => 'nullable',
            'sspd_tanggal' => 'nullable',
            'sspd_nilai' => 'nullable',
            'ssb_tanggal' => 'nullable',
            'ssb_nilai' => 'nullable',
            'keterangan' => 'nullable',
        ]);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $register = $this->generateRegister();
        $data = array_merge($validate, ['notaris_id' => $notaris->id, 'register' => $register]);
        AktaPpat::create($data);
        return redirect('akta-ppat')->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {
        $data = AktaPpat::find($id);
        return view('akta-ppat/show', compact('data'));
    }

    public function edit($id)
    {
        $data = AktaPpat::find($id);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $jenis = AktaPpatJenis::pluck('name', 'id');
        $staff = Staff::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $client = Client::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-ppat/edit', compact('data', 'jenis', 'staff', 'client', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function generateRegister($length = 8) {

        $randomString = strtoupper(Str::random($length));
        if (!AktaNotaris::where('register', $randomString)->first() and !AktaBadan::where('register', $randomString)->first()) {
            return $randomString;
        } else {
            return $this->generateRegister();
        }
    }
}
