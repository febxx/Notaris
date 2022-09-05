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
        <h5> Tahapan Proses Akta {{$jenis->name}}</h5>
        <form action="{{ route('akta-notaris-jenis-proses.update', $jenis->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card my-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Tahapan Pengurusan Akta</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0 add-input"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @forelse ($data as $item)
                    <div class="row proses{{ $loop->iteration }}">
                        <label>Proses ke {{ $loop->iteration }}</label>
                        <input type="hidden" name="id[]" value="{{$item->id}}">
                        <div class="col-md-5 mb-md-0">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control mb-2" name="proses[]" value="{{$item->deskripsi}}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Jangka Waktu</label>
                                <input type="text" class="form-control mb-2" name="waktu[]" value="{{$item->jangka_waktu}}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <label class="text-white">halowasap</label>
                            <a class="btn btn-danger mb-0 delete"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    @empty
                    <div class="row proses1">
                        <label>Proses ke 1</label>
                        <input type="hidden" name="id[]" value="">
                        <div class="col-md-5 mb-md-0">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control mb-2" name="proses[]">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Jangka Waktu</label>
                                <input type="text" class="form-control mb-2" name="waktu[]">
                            </div>
                        </div>
                    </div>
                    <div class="row proses2">
                        <label>Proses ke 2</label>
                        <input type="hidden" name="id[]" value="">
                        <div class="col-md-5 mb-md-0">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control mb-2" name="proses[]">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Jangka Waktu</label>
                                <input type="text" class="form-control mb-2" name="waktu[]">
                            </div>
                        </div>
                    </div>
                    @endforelse
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

        var x = parseInt('{{ count($data)}}') == 0 ? 2 : parseInt('{{ count($data)}}');
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append(
                    `<div class="row proses${x}">
                        <label>Proses ke ${x}</label>
                        <input type="hidden" name="id[]" value="">
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
            $(this).parent('div').parent('div').remove();
            x--;
        })
    });

</script>
@endsection
