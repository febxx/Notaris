@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <form action="{{route('akta-notaris-jenis.destroy', $data->id)}}" method="post">
            <a href="{{route('akta-notaris-jenis.index')}}" class="btn btn-warning"><i class="fa fa-backward"></i></a>
            <a href="{{route('akta-notaris-jenis.edit', $data->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>

        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td>{{$data->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Proses</th>
                    <td>
                        @foreach ($data->proses as $proses)
                            <li>{{ $proses->deskripsi }}</li>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection
