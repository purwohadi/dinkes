@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pasien</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

    <form action="{{route('update')}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>No Rekam Medis </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="no_rkm_medis" value="{{$data->no_rkm_medis}}" readonly>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Nama Pasien </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="nm_pasien" value="{{$data->nm_pasien}}" class="form-control" placeholder="Nama Pasien">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Jenis Kelamin </strong>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-select" name="jk">
                        <option value="L" {{($data->jk == 'L')?'selected':''}}>Laki-laki</option>
                        <option value="P"  {{($data->jk == 'P')?'selected':''}}>Perempuan</option>
                      </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Alamat </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" placeholder="Alamat">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Tempat Lahir </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="tempat_lahir" value="{{$data->tempat_lahir}}" class="form-control" placeholder="Tempat Lahir">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Tanggal Lahir </strong>
                </div>

                <div class="form-group col-md-6">
                    <input class="date form-control" type="text" value="{{$data->tgl_lahir}}" name="tgl_lahir">
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