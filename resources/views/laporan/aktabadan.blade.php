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
            background-color: #f8f8f8;
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
    <h3 class="text-center">LAPORAN BULANAN AKTA BADAN</h3>
    <h3 class="text-center">{{$bulan}} {{$year}}</h3>
    <p></p>
    <div class="container">
        <table class="table table-bordered table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>NO</th>
                    <th>NOMOR AKTA</th>
                    <th>TANGGAL</th>
                    <th>NAMA AKTA</th>
                    <th>SIFAT AKTA</th>
                    <th>ALAMAT</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>KELURAHAN</th>
                    <th>KECAMATAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nomor}}</td>
                    <td>{{$item->tanggal}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->sifat->name}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->rt}}</td>
                    <td>{{$item->rw}}</td>
                    <td>{{$item->kelurahan->name}}</td>
                    <td>{{$item->kelurahan->kecamatan->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
