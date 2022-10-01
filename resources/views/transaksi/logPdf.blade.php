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
        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        table tr {
            border: 1px solid #ddd;
            padding: .35em;
        }
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        table th, table td {
            font-size: .55em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .container{align-items:center;display:flex;flex-wrap:inherit;justify-content:space-between;margin: 0 auto;}
    </style>
</head>
<body>
    <h3 class="text-center">LOG TRANSAKSI</h3>
    <h3 class="text-center">{{$start}} - {{$end}}</h3>
    <p></p>
    <div class="container">
        <table class="table table-bordered table-responsive">
            <tr>
                <th>Pemasukan</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($pemasukan as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->nominal)</td>
            </tr>
            @endforeach
            <tr>
                <th>Pengeluaran</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($pengeluaran as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->nominal)</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
