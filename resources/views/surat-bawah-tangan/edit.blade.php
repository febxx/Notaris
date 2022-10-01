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
        <form action="{{ route('surat-bawah-tangan.update', $data->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nama">Sifat Surat</label>
                <select class="form-select form-select-lg" name="surat_sifat_id" id="jenis" required>
                    <option disabled selected value>--- Pilih Sifat ---</option>
                    @foreach ($sifat as $id => $name)
                        <option  value="{{ $id }}" {{($data->surat_sifat_id == $id) ? 'selected' : ''}}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{$data->tanggal}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Nomor Urut</label>
                        <input type="text" class="form-control" name="nomor_urut" value="{{$data->nomor_urut}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="exampleRadios1" value="Disahkan" {{($data->jenis == 'Disahkan') ? 'checked' : ''}}>
                    <label class="form-check-label" for="exampleRadios1"> Legalisasi (Disahkan) </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="exampleRadios2" value="Dibukukan" {{($data->jenis == 'Dibukukan') ? 'checked' : ''}}>
                    <label class="form-check-label" for="exampleRadios2"> Warmerking (Dibukukan) </label>
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

        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append(
                    `<div class="card proses${x}">
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
            $(`.proses${x}`).remove();
            x--;
        })
    });

</script>
@endsection
