@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                Laporan Keuangan
            </div>
            <div class="card-body">
                <a href="{{route('labarugi')}}" class="btn btn-primary">Laba Rugi</a>
                <a href="{{route('neraca')}}" class="btn btn-primary">Neraca</a>
            </div>
        </div>
    </div>
</main>
@endsection
