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
                <th>Aset Lancar</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($aktivaLancar as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->debit)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Aset Lancar</th>
                <th>@rp($aktivaLancar->sum('debit'))</th>
            </tr>
            <tr>
                <th>Aset Tetap</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($aktivaTetap as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->debit)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Aset Tetap</th>
                <th>@rp($aktivaTetap->sum('debit'))</th>
            </tr>
            <tr>
                <th>Depresiasi</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($depresiasi as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->nominal)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">TOTAL DEPRESISASI</th>
                <th>@rp($depresiasi->sum('nominal'))</th>
            </tr>
            <tr>
                <th colspan="2">TOTAL ASET</th>
                <th>@rp($aktivaLancar->sum('debit')+$aktivaTetap->sum('debit')-$depresiasi->sum('nominal'))</th>
            </tr>
            <tr><th colspan="3"></th></tr>
            <tr>
                <th>Modal</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($ekuitas as $item)
            <tr>
                <td>{{ $item->keterangan }} (Kredit)</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->kredit)</td>
            </tr>
            <tr>
                <td>{{ $item->keterangan }} (Debit)</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->debit)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Modal</th>
                <th>@rp($ekuitas->sum('kredit')-$ekuitas->sum('debit'))</th>
            </tr>
            <tr>
                <th>Liabilitas/Hutang</th>
                <th>Tanggal</th>
                <th>Nominal</th>
            </tr>
            @foreach ($hutang as $item)
            <tr>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>@rp($item->debit)</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total Liabilitas/Hutang</th>
                <th>@rp($hutang->sum('debit'))</th>
            </tr>
            <tr>
                <th colspan="2">Total Liabilitas/Hutang dan Modal</th>
                <th>@rp($ekuitas->sum('kredit')-$ekuitas->sum('debit')+$hutang->sum('debit'))</th>
            </tr>
        </table>
    </div>
</main>
@endsection
