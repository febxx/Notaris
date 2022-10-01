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
                    <td><a href="{{route('log-pdf')}}?start={{$start}}&end={{$end}}" class="btn btn-info">Cetak PDF</a></td>
                </tr>
            </table>
        </form>
        <table class="table table-bordered">
            <tbody>
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
            </tbody>
        </table>
    </div>
</main>
@endsection
