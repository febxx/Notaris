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

        <a href="{{ route('akta-badan-jenis.create') }}" class="btn btn-dark">Tambah Jenis Akta</a>

        <table class="table table-bordered" id="akta-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Akta</th>
                    <th scope="col">Sifat Akta</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->jenis->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{route('akta-badan-jenis-sifat.show', $item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="{{route('akta-badan-jenis-sifat.edit', $item->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="fa fa-trash"></i></button>
                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Konfirmasi hapus</h5>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus item ini?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('akta-badan-jenis-sifat.destroy', $item->id)}}" method="post">
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
</main>
@endsection

@section('js')
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
