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
        <h5> Surat Bawah Tangan {{$surat->nomor_urut}}</h5>
        <form action="{{ route('surat-bawah-tangan-pihak.update', $surat->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card my-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Pihak</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0 add-input"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3 card-pihak">
                    @forelse ($data as $item)
                    <div class="card pihak{{$loop->iteration}} mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Pihak ke {{$loop->iteration}}</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn btn-danger mb-0 delete"><i class="fas fa-minus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control mb-2" name="nama[]" value="{{$item->nama}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control mb-2" name="alamat[]" value="{{$item->alamat}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" class="form-control mb-2" name="rt[]" value="{{$item->rt}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" class="form-control mb-2" name="rw[]" value="{{$item->rw}}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Dusun</label>
                                        <input type="text" class="form-control mb-2" name="dusun[]" value="{{$item->dusun}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

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
        var wrapper = $(".card-pihak");
        var add_button = $(".add-input");

        var x = parseInt('{{ count($data)}}') == 0 ? 0 : parseInt('{{ count($data)}}');
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append(
                    `<div class="card pihak${x} mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Pihak ke ${x}</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn btn-danger mb-0 delete"><i class="fas fa-minus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control mb-2" name="nama[]">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control mb-2" name="alamat[]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" class="form-control mb-2" name="rt[]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" class="form-control mb-2" name="rw[]" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Dusun</label>
                                        <input type="text" class="form-control mb-2" name="dusun[]" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                );
            }
        });

        $(wrapper).on("click", ".delete", function (e) {
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').parent('div').remove();
            x--;
        })
    });

</script>
@endsection
