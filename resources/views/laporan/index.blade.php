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
        <form action="{{ route('laporanpost') }}" method="post">
            @csrf
            <input type="hidden" name="akta" value="{{$akta}}">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Bulan</label>
                        <select class="form-select form-select-lg" name="bulan" required>
                            <option disabled selected value>--- Pilih Bulan ---</option>
                            @foreach(range(1,12) as $month)
                            <option value="{{$month}}">
                                {{date("F", strtotime('2022-'.$month))}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Bulan</label>
                        <select class="form-select form-select-lg" name="tahun" required>
                            <option disabled selected value>--- Pilih Tahun ---</option>
                            @for ($year = date('Y'); $year > date('Y') - 10; $year--)
                            <option value="{{$year}}">
                                    {{$year}}
                            </option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
