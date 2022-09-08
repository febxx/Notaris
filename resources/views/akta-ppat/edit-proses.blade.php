@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session()->get('success') }}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h5> Perbarui Status Akta</h5>
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nomor</th>
                    <td>{{$data->nomor}}</td>
                </tr>
                <tr>
                    <th scope="row">NOP</th>
                    <td>{{$data->nop}}</td>
                </tr>
                <tr>
                    <th scope="row">Jenis</th>
                    <td>{{$data->jenis->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td>@if ($data->tanggal) {{ $data->tanggal }} @else <small>(belum di set)</small> @endif</td>
                </tr>
                <tr>
                    <th scope="row">Register</th>
                    <td>{{$data->register}}</td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('akta-ppat-proses.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="jenis">Status/Proses</label>
                <select class="form-select form-select-lg" name="akta_ppat_jenis_proses_id" id="jenis" required>
                    <option disabled selected value>--- Pilih Jenis ---</option>
                    @foreach ($proses as $id => $name)
                        <option  value="{{ $id }}" {{ ($data->jenis->id == $id) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
