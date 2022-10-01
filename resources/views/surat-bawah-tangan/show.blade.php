@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <form action="{{route('surat-bawah-tangan.destroy', $data->id)}}" method="post">
            <a href="{{route('surat-bawah-tangan.index')}}" class="btn btn-warning"><i class="fa fa-backward"></i></a>
            <a href="{{route('surat-bawah-tangan.edit', $data->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>

        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nomor Urut</th>
                    <td>{{$data->nomor_urut}}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td>{{$data->tanggal}}</td>
                </tr>
                <tr>
                    <th scope="row">Jenis</th>
                    <td>{{$data->jenis}}</td>
                </tr>
                <tr>
                    <th scope="row">Sifat Surat</th>
                    <td>{{$data->sifat->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection
