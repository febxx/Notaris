<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use App\Models\Notaris;
use App\Models\Provinsi;
use Auth;

class StaffController extends Controller
{
    public function index()
    {
        $data = Staff::all()->sortBy('nama');
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
            'role' => 'staff',
            'status' => '1'
        ]);
        $notaris_user = Auth::user();
        $notaris = Notaris::where('user_id', $notaris_user->id)->first();
        $data = array_merge($validate, ['user_id' => $user->id, 'notaris_id' => $notaris->id]);
        Staff::create($data);
        return redirect('kelola-staff')->with('success', 'Berhasil menambah data Staff.');
    }
    public function show($id)
    {
        $data = Staff::find($id);
        return view('user/show', compact('data'));
    }

    public function edit($id)
    {
        $data = Staff::find($id);
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
        Staff::whereId($id)->update($validate);
        return redirect('kelola-staff')->with('success', 'Berhasil memperbarui data Staff.');
    }

    public function destroy($id)
    {
        Staff::whereId($id)->delete();
        return redirect('kelola-staff')->with('success', 'Berhasil menghapus data Staff.');
    }
}
