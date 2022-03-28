@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Poli</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('dokter')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>    
    <br>

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
    
    <form action="{{route('simpanPoli')}}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Kode Poli </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="kd_poli" class="form-control" placeholder="Kode Poli">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Nama Poli </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="nm_poli" class="form-control" placeholder="Nama Poli">
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

