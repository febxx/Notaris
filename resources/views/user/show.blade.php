@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td>{{$data->nama}}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{$data->email}}</td>
                </tr>
                <tr>
                    <th scope="row">Telepon</th>
                    <td colspan="2">{{$data->telepon}}</td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td colspan="2">{{$data->alamat}}</td>
                </tr>
                <tr>
                    <th scope="row">RT</th>
                    <td colspan="2">{{$data->rt}}</td>
                </tr>
                <tr>
                    <th scope="row">RW</th>
                    <td colspan="2">{{$data->rw}}</td>
                </tr>
                <tr>
                    <th scope="row">Dusun</th>
                    <td colspan="2">{{$data->dusun}}</td>
                </tr>
                <tr>
                    <th scope="row">Kelurahan</th>
                    <td colspan="2">@if($data->kelurahan_id){{$data->kelurahan->name}}@endif</td>
                </tr>
                <tr>
                    <th scope="row">Group</th>
                    <td colspan="2">{{$data->group}}</td>
                </tr>
                <tr>
                    <th scope="row">NPWP</th>
                    <td colspan="2">{{$data->npwp}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection
