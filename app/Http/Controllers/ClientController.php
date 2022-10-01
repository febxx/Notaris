<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Client;
use App\Models\Notaris;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $data = Client::all()->sortBy('nama');
        return view('user/index', compact('data'));
    }

    public function create()
    {
        $provinsi = Provinsi::pluck('name', 'code');
        return view('user/create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $userValidate = $request->validate([
            'username' => 'required|unique:users'
        ]);
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'nullable',
            'telepon' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'kelurahan_id' => 'nullable',
        ]);
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->username),
            'role' => 'client',
            'status' => '1'
        ]);
        $users = Auth::user();
        $notaris = Notaris::where('user_id', $users->id)->first();
        $data = array_merge($validate, ['user_id' => $user->id, 'notaris_id' => $notaris->id]);
        Client::create($data);
        return redirect('kelola-client')->with('success', 'Berhasil menambah data Client.');
    }
    public function show($id)
    {
        $data = Client::find($id);
        return view('user/show', compact('data'));
    }

    public function edit($id)
    {
        $data = Client::find($id);
        $provinsi = Provinsi::pluck('name', 'code');
        return view('user/edit', compact('data', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'nullable',
            'telepon' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',

        ]);
        Client::whereId($id)->update($validate);
        return redirect('kelola-client')->with('success', 'Berhasil memperbarui data Client.');
    }

    public function destroy($id)
    {
        Client::whereId($id)->delete();
        return redirect('kelola-client')->with('success', 'Berhasil menghapus data Client.');
    }
}
