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
        <form action="{{ route('transaksi.store') }}" method="post">
            @csrf
            <input type="hidden" name="akta" value="{{$akta}}">
            <input type="hidden" name="id_akta" value="{{$id_akta}}">
            <div class="form-group">
                <label>Jenis</label>
                <select class="form-select form-select-lg" name="jenis" required>
                    <option value="1">Biaya Masuk</option>
                    <option value="2">Biaya Keluar</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nominal</label>
                <input type="text" class="form-control mb-2" name="nominal" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control mb-2" name="keterangan" required>
            </div>
            <div class="form-group">
                <label for="nama">Kategori Akun</label>
                <select class="form-select form-select-lg" name="kategori_akun_id" required>
                    <option disabled selected value>--- Pilih Kategori Akun ---</option>
                    @foreach ($kategori as $id => $name)
                        <option  value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
