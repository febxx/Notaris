@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <form action="{{route('akun.destroy', $data->id)}}" method="post">
            <a href="{{route('akun.index')}}" class="btn btn-warning"><i class="fa fa-backward"></i></a>
            <a href="{{route('akun.edit', $data->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>

        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nama Akun</th>
                    <td>{{$data->nama}}</td>
                </tr>
                <tr>
                    <th scope="row">Debit (Rp)</th>
                    <td>{{$data->debit}}</td>
                </tr>
                <tr>
                    <th scope="row">Kredit (Rp)</th>
                    <td>{{$data->kredit}}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td>{{$data->tanggal}}</td>
                </tr>
                <tr>
                    <th scope="row">Kategori Akun</th>
                    <td>{{$data->kategori->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Keterangan</th>
                    <td>{{$data->keterangan}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection
