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
        <form action="{{ route('akta-ppat.store') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <h6>Data Akta</h6>
                <div class="col">
                    <div class="form-group">
                        <label for="jenis">Jenis Akta</label>
                        <select class="form-select form-select-lg" name="akta_ppat_jenis_id" id="jenis" required>
                            <option disabled selected value>--- Pilih Jenis ---</option>
                            @foreach ($jenis as $id => $name)
                                <option  value="{{ $id }}" {{ ($data->jenis->id == $id) ? 'selected' : ''}}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$data->tanggal}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="nomor">Nomor</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" value="{{$data->nomor}}" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="staff">PIC</label>
                        <select class="form-select form-select-lg" name="staff_id" id="staff">
                            <option disabled selected value>--- Pilih Staff ---</option>
                            @foreach ($staff as $id => $name)
                                <option  value="{{ $id }}" {{($data->staff_id) ? 'selected':''}}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="client">Corporate Client</label>
                        <select class="form-select form-select-lg" name="client_id" id="client">
                            <option disabled selected value>--- Pilih Client ---</option>
                            @foreach ($client as $id => $name)
                                <option  value="{{ $id }}" {{($data->client_id) ? 'selected':''}}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <h6>Kedudukan Objek</h6>
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
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" value="{{$data->rt}}">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw" value="{{$data->rw}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="dusun">Dusun</label>
                        <input type="text" class="form-control" id="dusun" name="dusun" value="{{$data->dusun}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <h6>Data Pajak</h6>
                <div class="col">
                    <div class="form-group">
                        <label>NOP</label>
                        <input type="text" class="form-control" name="nop" value="{{$data->nop}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Nilai Pengalihan</label>
                        <input type="text" class="form-control" name="nilai_pengalihan" value="{{$data->nilai_pengalihan}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Luas Tanah</label>
                        <input type="text" class="form-control" name="luas_tanah" value="{{$data->luas_tanah}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>NJOP Tanah</label>
                        <input type="text" class="form-control" name="njop_tanah" value="{{$data->njop_tanah}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Luas Bangunan</label>
                        <input type="text" class="form-control" name="luas_bangunan" value="{{$data->luas_bangunan}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>NJOP Bangunan</label>
                        <input type="text" class="form-control" name="njop_bangunan" value="{{$data->njop_bangunan}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Tanggal SSP</label>
                        <input type="date" class="form-control" name="ssp_tanggal" value="{{$data->ssp_tanggal}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>SSP Nilai</label>
                        <input type="text" class="form-control" name="ssp_nilai" value="{{$data->ssp_nilai}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tanggal SSPD</label>
                        <input type="date" class="form-control" name="sspd_tanggal" value="{{$data->sspd_tanggal}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>SSPD Nilai</label>
                        <input type="text" class="form-control" name="sspd_nilai" value="{{$data->sspd_nilai}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tanggal SSB</label>
                        <input type="date" class="form-control" name="ssb_tanggal" value="{{$data->ssb_tanggal}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>SSB Nilai</label>
                        <input type="text" class="form-control" name="ssb_nilai" value="{{$data->ssb_nilai}}">
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
