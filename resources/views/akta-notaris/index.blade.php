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
        <a href="{{ route('akta-notaris.create') }}" class="btn btn-dark">Tambah Akta</a>
        <table class="table table-bordered" id="akta-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Akta Umum</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Client</th>
                    <th scope="col">PIC</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nomor }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis->name }}</td>
                    <td>@if ($item->tanggal) {{ $item->tanggal }} @else <small>(belum di set)</small> @endif</td>
                    <td>@if ($item->client_id) {{ $item->client->nama }} @else <small>(belum di set)</small> @endif</td>
                    <td>@if ($item->staff_id) {{ $item->staff->nama }} @else <small>(belum di set)</small> @endif</td>
                    <td>
                        <a href="{{route('akta-notaris.show', $item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="{{route('akta-notaris.edit', $item->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function () {
        $('#akta-table').DataTable({
            "dom": 'Bfrtip',
            "pageLength": 25,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": false,
        });
    });

    $.extend(true, $.fn.dataTable.defaults.oLanguage.oPaginate, {
        sNext: '<i class="fa fa-chevron-right" ></i>',
        sPrevious: '<i class="fa fa-chevron-left" ></i>'
    });

</script>
@endsection
