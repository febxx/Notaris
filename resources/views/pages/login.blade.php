@extends('layouts.app')

@section('content')
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 blur blur-rounded shadow py-2 start-0 end-0 mx4">
                <div class="container-fluid">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3"
                        href="{{ url('dashboard') }}">
                        Notaris
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ url('register') }}">
                                    <i class="fas fa-user-circle opacity-6 me-1"></i>
                                    Register
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-2"
                                    href="{{ url('login') }}">
                                    <i class="fas fa-key opacity-6 me-1"></i>
                                    Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                <p class="mb-0">Silahkan login</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="/login">
                                    @csrf
                                    <label>Username</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="username" required>
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    @error('error')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
