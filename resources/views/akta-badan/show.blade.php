@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <h3>{{$data->nama}}</h3>
        <form action="" method="post">
            <a href="{{route('akta-badan.index')}}" class="btn btn-warning"><i class="fa fa-backward"></i></a>
            <a href="{{route('akta-badan.edit', $data->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
            <a href="{{route('transaksi.create')}}?akta=badan&id={{$data->id}}" class="btn btn-info">Biaya Masuk/Keluar</a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Nomor</th>
                            <td>{{$data->nomor}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal</th>
                            <td>@if ($data->tanggal) {{ $data->tanggal }} @else <small>(belum di set)</small> @endif</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis</th>
                            <td>{{$data->jenis->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sifat</th>
                            <td>{{$data->sifat->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Register</th>
                            <td>{{$data->register}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td>{{$data->alamat}}</td>
                        </tr>
                        <tr>
                            <th scope="row">RT</th>
                            <td>{{$data->rt}}</td>
                        </tr>
                        <tr>
                            <th scope="row">RW</th>
                            <td>{{$data->rw}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Dusun</th>
                            <td>{{$data->dusun}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Kelurahan</th>
                            <td>{{$data->kelurahan->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Client</th>
                            <td>@if ($data->client_id) {{ $data->client->nama }} @else <small>(belum di set)</small> @endif</td>
                        </tr>
                        <tr>
                            <th scope="row">PIC</th>
                            <td>@if ($data->staff_id) {{ $data->staff->nama }} @else <small>(belum di set)</small> @endif</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
