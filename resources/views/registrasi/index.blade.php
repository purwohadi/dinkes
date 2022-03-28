@extends('layouts.app')

@section('content')

    <br>    

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrasi </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('registrasi/create')}}" title="Add Registrasi"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Nomor Rawat</th>
            <th>Tanggal Registrasi</th>
            <th>Nomor Rekam Medis</th>
            <th>Dokter</th>
            <th>Poli</th>
            <th>Jenis Bayar</th>
            <th width="150px">Actions</th>
        </tr>
        @foreach ($registrasis as $key => $registrasi)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$registrasi->no_rawat}}</td>
                <td>{{$registrasi->tgl_regis}}</td>
                <td>{{$registrasi->no_rkm_medis}}</td>
                <td>{{$registrasi->nm_dokter}}</td>
                <td>{{$registrasi->nm_poli}}</td>
                <td>{{$registrasi->jenis_bayar}}</td>
                <td align="center">
                    <form action="{{route('deleteRegistrasi',['no_rawat' => $registrasi->no_rawat])}}" method="POST">
                    <a href="{{route('showRegistrasi',['no_rawat' => $registrasi->no_rawat]) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>

                    <a href="{{route('editRegistrasi',['no_rawat' => $registrasi->no_rawat]) }}">
                        <i class="fas fa-edit  fa-lg"></i>
                    </a>
                    
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $registrasis->links() !!}

@endsection