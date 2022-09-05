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
        <h5> Perbarui Status Akta</h5>
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nomor</th>
                    <td>{{$data->nomor}}</td>
                </tr>
                <tr>
                    <th scope="row">Akta Umum</th>
                    <td>{{$data->nama}}</td>
                </tr>
                <tr>
                    <th scope="row">Jenis</th>
                    <td>{{$data->jenis->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td>@if ($data->tanggal) {{ $data->tanggal }} @else <small>(belum di set)</small> @endif</td>
                </tr>
                <tr>
                    <th scope="row">Register</th>
                    <td>{{$data->register}}</td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('akta-notaris-pihak.update', $pihak->id) }}?id={{$data->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pihak->nama }}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $pihak->nik }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="selaku">Selaku</label>
                        <input type="text" class="form-control" id="selaku" name="selaku" value="{{ $pihak->selaku }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp" value="{{ $pihak->npwp }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <label>Tempat Tinggal</label>
                <div class="col">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <select class="form-select form-select-lg" name="provinsi" id="provinsi">
                            <option disabled selected value>--- Pilih Provinsi ---</option>
                            @foreach ($provinsi as $id => $name)
                                <option  value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten</label>
                        <select class="form-select form-select-lg" name="kabupaten" id="kabupaten">
                            <option disabled selected value>--- Pilih Kabupaten ---</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <select class="form-select form-select-lg" name="kecamatan" id="kecamatan">
                            <option disabled selected value>--- Pilih Kecamatan ---</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan</label>
                        <select class="form-select form-select-lg" name="kelurahan_id" id="kelurahan">
                            <option disabled selected value>--- Pilih Kelurahan ---</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pihak->alamat }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" value="{{ $pihak->rt }}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw" value="{{ $pihak->rw }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="dusun">Dusun</label>
                        <input type="text" class="form-control" id="dusun" name="dusun" value="{{ $pihak->dusun }}">
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
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#provinsi').on('change', function () {
            $.ajax({
                url: '{{ url("getKabupaten") }}',
                method: 'POST',
                data: {
                    id: $(this).val()
                },
                success: function (response) {
                    $('#kabupaten').empty();
                    $('#kecamatan').empty();
                    $('#kelurahan').empty();
                    $('#kabupaten').append(
                        '<option disabled selected value>--- Pilih Kabupaten ---</option>'
                        )
                    $('#kecamatan').append(
                        '<option disabled selected value>--- Pilih Kecamatan ---</option>'
                        )
                    $('#kelurahan').append(
                        '<option disabled selected value>--- Pilih Kelurahan ---</option>'
                        )

                    $.each(response, function (id, name) {
                        $('#kabupaten').append(new Option(name, id))
                    })
                }
            })
        });

        $('#kabupaten').on('change', function () {
            $.ajax({
                url: '{{ url("getKecamatan") }}',
                method: 'POST',
                data: {
                    id: $(this).val()
                },
                success: function (response) {
                    $('#kecamatan').empty();
                    $('#kelurahan').empty();
                    $('#kecamatan').append(
                        '<option disabled selected value>--- Pilih Kecamatan ---</option>'
                        )
                    $('#kelurahan').append(
                        '<option disabled selected value>--- Pilih Kelurahan ---</option>'
                        )

                    $.each(response, function (id, name) {
                        $('#kecamatan').append(new Option(name, id))
                    })
                }
            })
        });

        $('#kecamatan').on('change', function () {
            $.ajax({
                url: '{{ url("getKelurahan") }}',
                method: 'POST',
                data: {
                    id: $(this).val()
                },
                success: function (response) {
                    $('#kelurahan').empty();
                    $('#kelurahan').append(
                        '<option disabled selected value>--- Pilih Kelurahan ---</option>'
                        )
                    $.each(response, function (id, name) {
                        $('#kelurahan').append(new Option(name, id))
                    })
                }
            })
        });
    });
</script>
@endsection
