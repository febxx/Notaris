@extends('layouts.app')

@section('content')
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    @include('layouts.nav')
    <div class="container-fluid py-4">
        <h3>{{$data->nama}}</h3>
        <form action="" method="post">
            <a href="{{route('surat-sifat.index')}}" class="btn btn-warning"><i class="fa fa-backward"></i></a>
            <a href="{{route('surat-sifat.edit', $data->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td>{{$data->id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sifat Surat</th>
                            <td>{{$data->name}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection
