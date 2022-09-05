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
        <form action="{{ route('akta-notaris-jenis.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="name" value="{{ $data->name }}" required>
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

        var x = parseInt('{{ count($data->proses)}}') == 0 ? 2 : parseInt('{{ count($data->proses)}}');
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append(
                    `<div class="row proses${x}">
                        <label>Proses ke ${x}</label>
                        <div class="col-md-5 mb-md-0">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control mb-2" name="proses[]" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Jangka Waktu</label>
                                <input type="text" class="form-control mb-2" name="waktu[]" >
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label class="text-white">halowasap</label>
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
