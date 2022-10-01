<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Carbon\Carbon;
use App\Models\Notaris;
use App\Models\Transaksi;
use App\Models\KategoriAkun;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->all()) {
            $data = Transaksi::where('jenis', 2)->get();
            $jenis = 2;
        } else {
            $data = Transaksi::where('jenis', 1)->get();
            $jenis = 1;
        }
        return view('transaksi/index', compact('data', 'jenis'));
    }

    public function create(Request $request)
    {
        $akta = $request['akta'];
        $id_akta = $request['id'];
        $kategori = KategoriAkun::whereBetween('id', [9, 12])->pluck('name', 'id');
        return view('transaksi/create', compact('kategori', 'akta', 'id_akta'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jenis' => 'required',
            'nominal' => 'required',
            'tanggal' => 'nullable',
            'keterangan' => 'required',
            'kategori_akun_id' => 'required',
        ]);
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();

        if ($request['akta'] == 'notaris') {
            $data = array_merge($validate, ['akta_notaris_id' => $request['id_akta'],'notaris_id' => $notaris->id]);
        } elseif ($request['akta'] == 'badan') {
            $data = array_merge($validate, ['akta_badan_id' => $request['id_akta'],'notaris_id' => $notaris->id]);
        } elseif ($request['akta'] == 'ppat') {
            $data = array_merge($validate, ['akta_ppat_id' => $request['id_akta'],'notaris_id' => $notaris->id]);
        }

        Transaksi::create($data);
        return redirect('transaksi')->with('success', 'Berhasil menambahkan data baru.');

    }

    public function show($id)
    {
        $data = Transaksi::find($id);
        return view('transaksi/show', compact('data'));
    }

    public function edit($id)
    {
        $data = Transaksi::find($id);
        $kategori = KategoriAkun::whereBetween('id', [9, 12])->pluck('name', 'id');
        return view('transaksi/edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'jenis' => 'required',
            'nominal' => 'required',
            'tanggal' => 'nullable',
            'keterangan' => 'required',
            'kategori_akun_id' => 'required',
        ]);

        Transaksi::whereId($id)->update($validate);
        return redirect('transaksi')->with('success', 'Berhasil memperbarui data baru.');
    }

    public function destroy($id)
    {
        Transaksi::whereId($id)->delete();
        return redirect('transaksi')->with('success', 'Berhasil menghapus data baru.');
    }

    public function log(Request $request)
    {
        if ($request->all()) {
            $start = $request['start'];
            $end = $request['end'];
        } else {
            $date = Carbon::now();
            $start = $date->startOfMonth()->format('Y-m-d');
            $end = $date->endOfMonth()->format('Y-m-d');
        }
        $pemasukan = Transaksi::whereBetween('tanggal', [$start, $end])->where('jenis', 1)->get();
        $pengeluaran = Transaksi::whereBetween('tanggal', [$start, $end])->where('jenis', 2)->get();
        return view('transaksi/log', compact('pemasukan', 'pengeluaran', 'start', 'end'));
    }

    public function logPdf(Request $request)
    {
        $start = $request['start'];
        $end = $request['end'];
        $pemasukan = Transaksi::whereBetween('tanggal', [$start, $end])->where('jenis', 1)->get();
        $pengeluaran = Transaksi::whereBetween('tanggal', [$start, $end])->where('jenis', 2)->get();
        $pdf = PDF::loadView('transaksi/logPdf', compact('pemasukan', 'pengeluaran', 'start', 'end'));
        $filename = 'Log transaksi - '.$start.'/'.$end;
        return $pdf->download($filename);
    }
}
