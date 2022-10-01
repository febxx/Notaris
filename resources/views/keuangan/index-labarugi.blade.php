@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <form>
            <table>
                <tr>
                    <td><label>Tanggal Awal</label></td>
                    <td><label>Tanggal Akhir</label></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <input type="date" class="form-control" name="start" value="{{$start}}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="date" class="form-control" name="end" value="{{$end}}">
                        </div>
                    </td>
                    <td><button type="submit" class="btn btn-primary">Filter</button></td>
                    <td><a href="{{route('labarugipdf')}}?start={{$start}}&end={{$end}}" class="btn btn-info">Cetak PDF</a></td>
                </tr>
            </table>
        </form>
        <table class="table table-bordered">
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
</main>
@endsection
