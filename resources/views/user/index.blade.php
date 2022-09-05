@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main
    class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
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
        @if (Request::is('kelola-staff'))
        <a href="{{ route('kelola-staff.create') }}" class="btn btn-dark">Tambah Staff</a>
        @elseif (Request::is('kelola-client'))
        <a href="{{ route('kelola-client.create') }}" class="btn btn-dark">Tambah Client</a>
        @endif
        <table class="table table-bordered" id="user-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->user->username }}</td>
                    <td>
                        @if($item->user->status == 1)
                        Aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                    <td>
                        @if (Request::is('kelola-staff'))
                        <a href="{{route('kelola-staff.show', $item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="{{route('kelola-staff.edit', $item->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
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
                                        <form action="{{route('kelola-staff.destroy', $item->id)}}" method="post">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif (Request::is('kelola-client'))
                        <a href="{{route('kelola-client.show', $item->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="{{route('kelola-client.edit', $item->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
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
                                        <form action="{{route('kelola-client.destroy', $item->id)}}" method="post">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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
    $(function() {
        $('#user-table').DataTable({
            "dom": 'Bfrtip',
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
