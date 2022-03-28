@extends('layouts.app')

@section('content')

    <br>
    

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pasien </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('pasien/create')}}" title="Add Pasien"> <i class="fas fa-plus-circle"></i>
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
            <th>No Rekam Medis</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th width="150px">Actions</th>
        </tr>
        @foreach ($pasiens as $key => $pasien)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$pasien->no_rkm_medis}}</td>
                <td>{{$pasien->nm_pasien}}</td>
                <td>{{$pasien->jk}}</td>
                <td>{{$pasien->alamat}}</td>
                <td>{{$pasien->tempat_lahir}}</td>
                <td>{{$pasien->tgl_lahir}}</td>
                <td align="center">
                    <form action="{{route('delete',['no_rkm_medis' => $pasien->no_rkm_medis])}}" method="POST">
                    <a href="{{route('show',['no_rkm_medis' => $pasien->no_rkm_medis]) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>

                    <a href="{{route('edit',['no_rkm_medis' => $pasien->no_rkm_medis]) }}">
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

    {!! $pasiens->links() !!}

@endsection