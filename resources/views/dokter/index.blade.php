@extends('layouts.app')

@section('content')

    <br>    

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dokter </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('dokter/create')}}" title="Add Dokter"> <i class="fas fa-plus-circle"></i>
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
            <th>Kode Dokter</th>
            <th>Nama Dokter</th>
            <th width="150px">Actions</th>
        </tr>
        @foreach ($dokters as $key => $dokter)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$dokter->kd_dokter}}</td>
                <td>{{$dokter->nm_dokter}}</td>
                <td align="center">
                    <form action="{{route('deleteDokter',['kd_dokter' => $dokter->kd_dokter])}}" method="POST">
                    <a href="{{route('showDokter',['kd_dokter' => $dokter->kd_dokter]) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>

                    <a href="{{route('editDokter',['kd_dokter' => $dokter->kd_dokter]) }}">
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

    {!! $dokters->links() !!}

@endsection