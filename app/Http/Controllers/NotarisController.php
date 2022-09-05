<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notaris;
use App\Models\Provinsi;

class NotarisController extends Controller
{
    public function index(Request $request)
    {
        $notaris = Notaris::all()->sortBy('nama');
        return view('notaris/index', compact('notaris'));
    }

    public function create()
    {
        $provinsi = Provinsi::pluck('name', 'code');
        return view('notaris/create', compact('provinsi'));
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
            'group' => 'nullable',
            'npwp' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',
            'kelurahan_id' => 'nullable',
        ]);
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->username),
            'role' => 'notaris',
            'status' => '1'
        ]);
        $data = array_merge($validate, ["user_id" => $user->id]);
        $notaris = Notaris::create($data);
        return redirect('kelola-notaris')->with('success', 'Berhasil menambahkan data Notaris.');
    }

    public function show($id)
    {
        $notaris = Notaris::find($id);
        return view('notaris/show', compact('notaris'));
    }

    public function edit($id)
    {
        $notaris = Notaris::find($id);
        $provinsi = Provinsi::pluck('name', 'code');
        return view('notaris/edit', compact('notaris', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'nullable',
            'telepon' => 'nullable',
            'group' => 'nullable',
            'npwp' => 'nullable',
            'alamat' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'dusun' => 'nullable',

        ]);
        $notaris = Notaris::whereId($id)->update($validate);
        return redirect('kelola-notaris')->with('success', 'Berhasil menambahkan data Notaris.');
    }

    public function destroy($id)
    {
        Notaris::whereId($id)->delete();
        return redirect('kelola-notaris')->with('success', 'Berhasil menghapus data Notaris.');
    }
}
