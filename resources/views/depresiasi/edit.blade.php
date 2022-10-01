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
        <form action="{{ route('depresiasi.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Nominal</label>
                <input type="text" class="form-control mb-2" name="nominal" value="{{$data->nominal}}">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control mb-2" name="keterangan" value="{{$data->keterangan}}">
            </div>
            <div class="form-group">
                <label for="nama">Akun</label>
                <select class="form-select form-select-lg" name="akun_id" id="jenis" required>
                    <option disabled selected value>--- Pilih Akun ---</option>
                    @foreach ($akun as $id => $name)
                        <option  value="{{ $id }}" {{($data->akun_id == $id) ? 'selected':''}}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
