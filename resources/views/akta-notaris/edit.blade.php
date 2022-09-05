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
        <form action="{{ route('akta-notaris.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="jenis">Jenis Akta</label>
                        <select class="form-select form-select-lg" name="akta_notaris_jenis_id" id="jenis" required>
                            <option disabled selected value>--- Pilih Jenis ---</option>
                            @foreach ($jenis as $id => $name)
                                <option  value="{{ $id }}" {{ ($data->jenis->id == $id) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="akta">Akta Umum</label>
                        <input type="text" class="form-control" id="akta" name="nama" value="{{ $data->nama }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nomor">Nomor</label>
                        <input type="number" class="form-control" id="nomor" name="nomor" value="{{ $data->nomor }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="staff">PIC</label>
                        <select class="form-select form-select-lg" name="staff_id" id="staff">
                            <option disabled selected value>--- Pilih Staff ---</option>
                            @foreach ($staff as $id => $name)
                                <option  value="{{ $id }}" {{ ($data->staff_id == $id) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="client">PIC</label>
                        <select class="form-select form-select-lg" name="client_id" id="client">
                            <option disabled selected value>--- Pilih Client ---</option>
                            @foreach ($client as $id => $name)
                                <option  value="{{ $id }}" {{ ($data->client_id == $id) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
