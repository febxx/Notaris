<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use App\Models\Notaris;
use App\Models\Akun;
use App\Models\Transaksi;
use App\Models\Depresiasi;
use App\Models\KategoriAkun;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    public function index()
    {
        return view('keuangan.index');
    }
    public function indexLabaRugi(Request $request)
    {
        if ($request->all()) {
            $start = $request['start'];
            $end = $request['end'];
        } else {
            $date = Carbon::now();
            $start = $date->startOfMonth()->format('Y-m-d');
            $end = $date->endOfMonth()->format('Y-m-d');
        }
        $pendapatan = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 9)->get();
        $biaya = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 10)->get();
        $pendapatanlain = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 11)->get();
        $biayalain = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 12)->get();

        return view('keuangan/index-labarugi', compact('pendapatan', 'biaya', 'pendapatanlain', 'biayalain', 'start', 'end'));
    }

    public function pdfLabaRugi(Request $request)
    {
        $start = $request['start'];
        $end = $request['end'];
        $pendapatan = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 9)->get();
        $biaya = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 10)->get();
        $pendapatanlain = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 11)->get();
        $biayalain = Transaksi::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 12)->get();
        $pdf = PDF::loadView('keuangan/pdf-labarugi', compact('pendapatan', 'biaya', 'pendapatanlain', 'biayalain', 'start', 'end'));
        $filename = 'Laba Rugi - '.$start.'/'.$end;
        return $pdf->download($filename);
    }

    public function indexNeraca(Request $request)
    {
        if ($request->all()) {
            $start = $request['start'];
            $end = $request['end'];
        } else {
            $date = Carbon::now();
            $start = $date->startOfMonth()->format('Y-m-d');
            $end = $date->endOfMonth()->format('Y-m-d');
        }
        $user = Auth::user();
        $notaris = Notaris::where('user_id', $user->id)->first();
        $aktivaLancar = Akun::whereBetween('tanggal', [$start, $end])->whereBetween('kategori_akun_id', [1, 3])->where('notaris_id', $notaris->id)->get();
        $aktivaTetap = Akun::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 4)->where('notaris_id', $notaris->id)->get();
        $ekuitas = Akun::whereBetween('tanggal', [$start, $end])->where('kategori_akun_id', 8)->where('notaris_id', $notaris->id)->get();
        $hutang = Akun::whereBetween('tanggal', [$start, $end])->whereBetween('kategori_akun_id', [5, 7])->where('notaris_id', $notaris->id)->get();
        $depresiasi = Depresiasi::where('notaris_id', $notaris->id)->get();

        return view('keuangan/index-neraca', compact('aktivaLancar', 'aktivaTetap', 'ekuitas', 'hutang', 'depresiasi', 'start', 'end'));
    }

    public function pdfNeraca(Request $request)
    {

    }
}
