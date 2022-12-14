@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <h3>{{$data->nama}}</h3>
        <form action="{{route('akta-notaris.destroy', $data->id)}}" method="post">
            <a href="{{route('akta-notaris.index')}}" class="btn btn-warning"><i class="fa fa-backward"></i></a>
            <a href="{{route('akta-notaris.edit', $data->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
            <a href="{{route('akta-notaris-pihak.create')}}?id={{$data->id}}" class="btn btn-info">Tambah Pihak</a>
            <a href="{{route('akta-notaris-proses.edit', $data->id)}}" class="btn btn-info">Update Proses</a>
            <a href="{{route('transaksi.create')}}?akta=notaris&id={{$data->id}}" class="btn btn-info">Biaya Masuk/Keluar</a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Nomor</th>
                            <td>{{$data->nomor}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal</th>
                            <td>@if ($data->tanggal) {{ $data->tanggal }} @else <small>(belum di set)</small> @endif</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis</th>
                            <td>{{$data->jenis->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Register</th>
                            <td>{{$data->register}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Client</th>
                            <td>@if ($data->client_id) {{ $data->client->nama }} @else <small>(belum di set)</small> @endif</td>
                        </tr>
                        <tr>
                            <th scope="row">PIC</th>
                            <td>@if ($data->staff_id) {{ $data->staff->nama }} @else <small>(belum di set)</small> @endif</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <table class="table table-hover table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">Tahapan</th>
                            <th scope="col">Keterangan</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->proses as $proses)
                        <tr>
                            <td>{{$proses->jenis_proses->deskripsi}}</td>
                            <td>{{$proses->keterangan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-responsive">
                <thead class="table-success">
                    <tr class="align-middle">
                        <th rowspan="2">Pihak ke-</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Selaku</th>
                        <th colspan="8" class="align-middle text-center">Data</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Dusun</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->pihak as $pihak)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$pihak->nama}}</td>
                        <td>{{$pihak->selaku}}</td>
                        <td>{{$pihak->alamat}}</td>
                        <td>{{$pihak->rt}}</td>
                        <td>{{$pihak->rw}}</td>
                        <td>{{$pihak->dusun}}</td>
                        @if($pihak->kelurahan_id)
                        <td>{{$pihak->kelurahan->name}}</td>
                        <td>{{$pihak->kelurahan->kecamatan->name}}</td>
                        <td>{{$pihak->kelurahan->kecamatan->kabupaten->name}}</td>
                        <td>{{$pihak->kelurahan->kecamatan->kabupaten->provinsi->name}}</td>
                        @else
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @endif
                        <td>
                            <a href="{{route('akta-notaris-pihak.edit', $pihak->id)}}?id={{$data->id}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pihak->id }}"><i class="fa fa-trash"></i></button>
                            <div class="modal fade" id="exampleModal{{ $pihak->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $pihak->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $pihak->id }}">Konfirmasi hapus</h5>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus item ini?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('akta-notaris-pihak.destroy', $pihak->id)}}" method="post">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
