<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Client;
use App\Models\Notaris;
use App\Models\Provinsi;
use App\Models\AktaNotaris;
use App\Models\AktaBadan;
use App\Models\AktaBadanJenis;
use App\Models\AktaBadanJenisSifat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;

class AktaBadanController extends Controller
{
    public function index()
    {
        $data = AktaBadan::all();
        return view('akta-badan/index', compact('data'));
    }

    public function create()
    {
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $jenis = AktaBadanJenis::pluck('name', 'id');
        $staff = Staff::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $client = Client::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-badan/create', compact('jenis', 'staff', 'client', 'provinsi'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'akta_badan_jenis_id' => 'required',
            'akta_badan_jenis_sifat_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'nullable',
            'nomor' => 'required|unique:akta_badan',
            'staff_id' => 'nullable',
            'client_id' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'kelurahan_id' => 'nullable',
        ]);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $register = $this->generateRegister();
        $data = array_merge($validate, ['notaris_id' => $notaris->id, 'register' => $register]);
        AktaBadan::create($data);
        return redirect('akta-badan')->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {
        $data = AktaBadan::find($id);
        return view('akta-badan/show', compact('data'));
    }

    public function edit($id)
    {
        $data = AktaBadan::find($id);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $jenis = AktaBadanJenis::pluck('name', 'id');
        $sifat = AktaBadanJenisSifat::where('akta_badan_jenis_id', $data->jenis->id)->pluck('name', 'id');
        $staff = Staff::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $client = Client::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $provinsi = Provinsi::pluck('name', 'code');
        return view('akta-badan/edit', compact('data', 'jenis', 'sifat', 'staff', 'client', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'akta_badan_jenis_id' => 'required',
            'akta_badan_jenis_sifat_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'nullable',
            'nomor' => 'required',
            'staff_id' => 'nullable',
            'client_id' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'kelurahan_id' => 'nullable',
        ]);
        AktaBadan::whereId($id)->update($validate);
        return redirect('akta-badan')->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        //
    }

    public function getSifatAktaBadan(Request $request)
    {
        $data = AktaBadanJenisSifat::where('akta_badan_jenis_id', $request->id)->pluck('name', 'id');
        return response()->json($data);
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
