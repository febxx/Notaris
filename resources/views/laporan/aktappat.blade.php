<!DOCTYPE html>
<html>

<head>
    <title>Hi</title>
    <style>
        .text-center {
            text-align: center !important
        }

        table {
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
            background-color: black;
        }

        table caption {
            font-size: .5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid black;
            padding: .35em;
        }

        table th,
        table td {
            text-align: center;
            /* border: 1px solid black; */
            font-size: .3em;
        }

        .container {
            align-items: center;
            display: flex;
            flex-wrap: inherit;
            justify-content: space-between;
            margin: 0 auto;
        }

    </style>
</head>

<body>
    <h3 class="text-center">LAPORAN BULANAN AKTA PPAT</h3>
    <h3 class="text-center">{{$bulan}} {{$year}}</h3>
    <p></p>
    <div class="container">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th rowspan="3">NO</th>
                    <th colspan="2">Akta</th>
                    <th rowspan="3">Bentuk Pembuatan Hukum</th>
                    <th rowspan="3">Jenis dan No. Hak</th>
                    <th>Letak Tanah</th>
                    <th colspan="2">Luas</th>
                    <th rowspan="3">Harga Transaksi</th>
                    <th colspan="2">SPPT PBB</th>
                    <th colspan="2">SSP</th>
                    <th colspan="2">SSB</th>
                    <th rowspan="3">Keterangan</th>
                </tr>
                <tr>
                    <th rowspan="2">Nomor</th>
                    <th rowspan="2">Tanggal</th>
                    <th>a. Desa/Kel</th>
                    <th rowspan="2">Tanah (m2)</th>
                    <th rowspan="2">Bangunan (m2)</th>
                    <th rowspan="2">NJOP/Tahun</th>
                    <th>NJOP Tanah (Rp)</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">(Rp)</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">(Rp)</th>
                </tr>
                <tr>
                    <th>b. Kecamatan</th>
                    <th>NJOP Bangunan (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td rowspan="2">{{$loop->iteration}}</td>
                    <td rowspan="2">{{$item->nomor}}</td>
                    <td rowspan="2">{{$item->tanggal}}</td>
                    <td rowspan="2">{{$item->jenis->deskripsi}}</td>
                    <td rowspan="2">{{$item->jenis->name}}</td>
                    <td>{{$item->kelurahan->name}}</td>
                    <td rowspan="2">{{$item->luas_tanah}}</td>
                    <td rowspan="2">{{$item->luas_bangunan}}</td>
                    <td rowspan="2">Rp. {{$item->nilai_pengalihan}}</td>
                    <td rowspan="2">Rp. {{$item->njop_tahun}}</td>
                    <td>{{$item->njop_tanah}}</td>
                    <td rowspan="2">{{$item->ssp_tanggal}}</td>
                    <td rowspan="2">Rp. {{$item->ssp_nilai}}</td>
                    <td rowspan="2">{{$item->ssb_tanggal}}</td>
                    <td rowspan="2">Rp. {{$item->ssb_nilai}}</td>
                    <td rowspan="2">{{$item->keterangan}}</td>
                </tr>
                <tr>
                    <td>{{$item->kelurahan->kecamatan->name}}</td>
                    <td>Rp. {{$item->njop_bangunan}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
