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
        <form action="{{ route('akun.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Nama Akun</label>
                <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
            </div>
            <div class="form-group">
                <label>Debit (Rp)</label>
                <input type="text" class="form-control" name="debit" value="{{$data->debit}}" required>
            </div>
            <div class="form-group">
                <label>Kredit (Rp)</label>
                <input type="text" class="form-control" name="kredit" value="{{$data->kredit}}" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{$data->tanggal}}" required>
            </div>
            <div class="form-group">
                <label>Kategori Akun</label>
                <select class="form-select form-select-lg" name="kategori_akun_id">
                    <option disabled selected value>--- Pilih Kategori ---</option>
                    @foreach ($kategori as $id => $name)
                        <option  value="{{ $id }}" {{($data->kategori_akun_id == $id) ? 'selected':''}}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="{{$data->keterangan}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
