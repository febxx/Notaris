<?php

namespace App\Http\Controllers;

use App\Models\AktaPpat;
use App\Models\AktaBadan;
use App\Models\AktaNotaris;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use App\Mail\NotifEmail;
use Illuminate\Support\Facades\Mail;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $akta = $request['akta'];
        return view('laporan/index', compact('akta'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $year = $request['tahun'];
        $month = $request['bulan'];
        $date = Carbon::parse($year."-".$month."-01");
        $start = $date->startOfMonth()->format('Y-m-d H:i:s');
        $end = $date->endOfMonth()->format('Y-m-d H:i:s');
        $bulan = $this->nama_bulan($month);
        $filename = 'akta-'.$request['akta']."-".$month.$year.".pdf";
        if ($request['akta'] == 'notaris') {
            $data = AktaNotaris::whereBetween('tanggal', [$start, $end])->get();
            $pdf = PDF::loadView('laporan/aktanotaris', compact('data', 'bulan', 'year'));

        } else if ($request['akta'] == 'badan') {
            $data = AktaBadan::whereBetween('tanggal', [$start, $end])->get();
            $pdf = PDF::loadView('laporan/aktabadan', compact('data', 'bulan', 'year'));

        } else if ($request['akta'] == 'ppat') {
            $data = AktaPpat::whereBetween('tanggal', [$start, $end])->get();
            $pdf = PDF::loadView('laporan/aktappat', compact('data', 'bulan', 'year'));

        }
        return $pdf->download($filename);

    }

    public function nama_bulan($bulan)
    {
        $array_bulan = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return $array_bulan[$bulan];
    }

    public function notif()
    {
        Mail::to("ajifebri5@gmail.com")->send(new NotifEmail());
		return "Email telah dikirim";
    }
}
