@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <form action="{{route('transaksi.destroy', $data->id)}}" method="post">
            <a href="{{route('transaksi.index')}}" class="btn btn-warning"><i class="fa fa-backward"></i></a>
            <a href="{{route('transaksi.edit', $data->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>

        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Jenis</th>
                    <td>{{($data->jenis == 1) ? 'Biaya Masuk':'Biaya Keluar'}}</td>
                </tr>
                <tr>
                    <th scope="row">Nominal (Rp)</th>
                    <td>@rp($data->nominal)</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td>{{$data->tanggal}}</td>
                </tr>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td>{{$data->keterangan}}</td>
                </tr>
                <tr>
                    <th scope="row">Kategori Akun</th>
                    <td>{{$data->kategori_akun->name}}</td>
                </tr>
                @if($data->akta_notaris_id)
                <tr>
                    <th scope="row">Akta</th>
                    <td>Akta Umum - {{$data->akta_notaris->nama}}</td>
                </tr>
                @elseif($data->akta_badan_id)
                <tr>
                    <th scope="row">Akta</th>
                    <td>Akta Badan - {{$data->akta_badan->nama}} </td>
                </tr>
                @elseif($data->akta_ppat_id)
                <tr>
                    <th scope="row">Akta</th>
                    <td>Akta PPAT - {{$data->akta_ppat->nama}}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</main>
@endsection
