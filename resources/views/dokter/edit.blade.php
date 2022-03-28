@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pasien</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('indexDokter')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('updateDokter')}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Kode Dokter </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="kd_dokter" class="form-control" placeholder="Kode Dokter" value="{{$data->kd_dokter}}" readonly>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Nama Dokter </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="nm_dokter" class="form-control" placeholder="Nama Dokter" value="{{$data->nm_dokter}}">
                </div>
            </div>   

            <div class="col-md-12 text-left">
                <div class="form-group col-md-2">
                </div>
                <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </div>
    </form>
@endsection