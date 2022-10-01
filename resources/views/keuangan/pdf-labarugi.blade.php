<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    <style>
        .text-center {
            text-align: center !important
        }
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }
        .container{align-items:center;display:flex;flex-wrap:inherit;justify-content:space-between;margin: 0 auto;}
    </style>
</head>
<body>
    <h3 class="text-center">LAPORAN LABA RUGI</h3>
    <h3 class="text-center">{{$start}} - {{$end}}</h3>
    <p></p>
    <div class="container">
        <table class="table table-bordered table-responsive">
            <tr>
                <th>Pendapatan</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($pendapatan as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->nominal)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Pendapatan</th>
                <th>@rp($pendapatan->sum('nominal'))</th>
            </tr>
            <tr>
                <th>Biaya Operasional</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($biaya as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->nominal)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Biaya Operasional</th>
                <th>@rp($biaya->sum('nominal'))</th>
            </tr>
            <tr>
                <th colspan="2">LABA BERSIH OPERASIONAL</th>
                <th>@rp($pendapatan->sum('nominal')-$biaya->sum('nominal'))</th>
            </tr>
            <tr><th colspan="3"></th></tr>
            <tr>
                <th>Pendapatan Lainnya</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($pendapatanlain as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->nominal)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Pendapatan</th>
                <th>@rp($pendapatanlain->sum('nominal'))</th>
            </tr>
            <tr>
                <th>Biaya Keluar Lainnya</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($biayalain as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->nominal)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Biaya Keluar Lainnya</th>
                <th>@rp($biayalain->sum('nominal'))</th>
            </tr>
            <tr>
                <th colspan="2">LABA BERSIH</th>
                <th>@rp($pendapatan->sum('nominal')-$biaya->sum('nominal')+$pendapatanlain->sum('nominal')-$biayalain->sum('nominal'))</th>
            </tr>
        </table>
    </div>
</body>
</html>
