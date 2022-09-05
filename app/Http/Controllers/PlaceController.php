<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class PlaceController extends Controller
{
    public function getProvinsi(Request $request)
    {
        $data = Provinsi::all();
        return response()->json($data);
    }

    public function getKabupaten(Request $request)
    {
        $data = Kabupaten::where('province_code', $request->id)->pluck('name', 'code');
        return response()->json($data);
    }

    public function getKecamatan(Request $request)
    {
        $data = Kecamatan::where('city_code', $request->id)->pluck('name', 'code');
        return response()->json($data);
    }

    public function getKelurahan(Request $request)
    {
        $data = Kelurahan::where('district_code', $request->id)->pluck('name', 'id');
        return response()->json($data);
    }
}
