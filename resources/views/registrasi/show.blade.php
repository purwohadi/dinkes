@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('indexPoli')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Kode Poli </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['kd_poli']}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group col-md-3">
                <strong>Nama Poli </strong>
            </div>
            <div class="form-group col-md-6">
                {{$data['nm_poli']}}
            </div>
        </div>
    </div>
@endsection