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
        <form action="{{ route('akta-badan-jenis.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="name" required>
            </div>
            <div class="card my-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Sifat Akta</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0 add-input"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <label>Sifat ke 1</label>
                        <div class="col-10 mb-md-0">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2" name="sifat[]">
                            </div>
                        </div>
                    </div>
                    <div class="row proses2">
                        <label>Sifat ke 2</label>
                        <div class="col-10 mb-md-0">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2" name="sifat[]" >
                            </div>
                        </div>
                        <div class="col-2">
                            <a class="btn btn-danger mb-0 delete"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        var max_fields = 10;
        var wrapper = $(".card-body");
        var add_button = $(".add-input");

        var x = 2;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append(
                    `<div class="row proses${x}">
                        <label>Sifat ke ${x}</label>
                        <div class="col-10 mb-md-0">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2" name="sifat[]" >
                            </div>
                        </div>
                        <div class="col-2">
                            <a class="btn btn-danger mb-0 delete"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>`
                );
            }
        });

        $(wrapper).on("click", ".delete", function (e) {
            e.preventDefault();
            $(`.proses${x}`).remove();
            x--;
        })
    });

</script>
@endsection
