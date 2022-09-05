@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main
    class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg {{ (Request::is('rtl') ? 'overflow-hidden' : '') }}">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-11 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <h3 class="mb-1 pt-2 font-weight-bolder">Selamat datang!</h3>
                                    <h5>
                                        Anda berhasil login sebagai
                                        @if (auth()->user()->isAdmin())
                                        Admin
                                        @endif
                                        @if (auth()->user()->isNotaris())
                                        Notaris
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100">
                                    <img src="{{asset('assets/img/shapes/waves-white.svg')}}"
                                        class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div
                                        class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-100 position-relative z-index-2 pt-4"
                                            src="{{asset('assets/img/illustrations/rocket-white.png')}}" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
