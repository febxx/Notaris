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
        <form action="{{ route('transaksi.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Jenis</label>
                <select class="form-select form-select-lg" name="jenis" required>
                    <option value="1" {{($data->jenis == 1) ? 'selected': ''}}>Biaya Masuk</option>
                    <option value="2" {{($data->jenis == 2) ? 'selected': ''}}>Biaya Keluar</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nominal</label>
                <input type="text" class="form-control mb-2" name="nominal" value="{{$data->nominal}}" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{$data->tanggal}}">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control mb-2" name="keterangan" value="{{$data->keterangan}}" required>
            </div>
            <div class="form-group">
                <label for="nama">Kategori Akun</label>
                <select class="form-select form-select-lg" name="kategori_akun_id" required>
                    <option disabled selected value>--- Pilih Kategori Akun ---</option>
                    @foreach ($kategori as $id => $name)
                        <option  value="{{ $id }}" {{($data->kategori_akun_id==$id) ? 'selected': ''}}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
