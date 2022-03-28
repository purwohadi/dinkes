@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Nomor Rekam Medis </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['no_rkm_medis']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Nama Pasien </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['nm_pasien']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Jenis Kelamin </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['jk']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Alamat </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['alamat']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Tempat Lahir </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['tempat_lahir']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Tanggal Lahir </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['tgl_lahir']}}
            </div>
        </div>

       
    </div>
@endsection