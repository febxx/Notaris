<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Staff;
use App\Models\Client;
use App\Models\Notaris;
use App\Models\AktaPpat;
use App\Models\AktaBadan;
use App\Models\AktaNotaris;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AktaNotarisJenis;

class AktaNotarisController extends Controller
{
    public function index()
    {
        $data = AktaNotaris::all()->sortBy('name');
        return view('akta-notaris/index', compact('data'));
    }

    public function create()
    {
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $jenis = AktaNotarisJenis::where('notaris_id', $notaris->id)->pluck('name', 'id');
        $staff = Staff::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $client = Client::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        return view('akta-notaris/create', compact('jenis', 'staff', 'client'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'akta_notaris_jenis_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'nullable',
            'nomor' => 'required|unique:akta_notaris',
            'staff_id' => 'nullable',
            'client_id' => 'nullable',
        ]);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $register = $this->generateRegister();
        $data = array_merge($validate, ['notaris_id' => $notaris->id, 'register' => $register]);
        AktaNotaris::create($data);
        return redirect('akta-notaris')->with('success', 'Berhasil menambahkan data baru.');
    }

    public function show($id)
    {
        $data = AktaNotaris::find($id);
        return view('akta-notaris/show', compact('data'));
    }

    public function edit($id)
    {
        $data = AktaNotaris::find($id);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $jenis = AktaNotarisJenis::where('notaris_id', $notaris->id)->pluck('name', 'id');
        $staff = Staff::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        $client = Client::where('notaris_id', $notaris->id)->pluck('nama', 'id');
        return view('akta-notaris/edit', compact('data', 'jenis', 'staff', 'client'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'akta_notaris_jenis_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'nullable',
            'nomor' => 'required',
            'staff_id' => 'nullable',
            'client_id' => 'nullable',
        ]);
        AktaNotaris::whereId($id)->update($validate);
        return redirect('akta-notaris')->with('success', 'Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        //
    }

    public function generateRegister($length = 8) {

        $randomString = strtoupper(Str::random($length));
        if (!AktaNotaris::where('register', $randomString)->first() and !AktaBadan::where('register', $randomString)->first() and !AktaPpat::where('register', $randomString)->first()) {
            return $randomString;
        } else {
            return $this->generateRegister();
        }
    }
}
