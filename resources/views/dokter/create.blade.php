@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Dokter</h2>
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
    
    <form action="{{route('simpanDokter')}}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Kode Dokter </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="kd_dokter" class="form-control" placeholder="Kode Dokter">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-2">
                    <strong>Nama Dokter </strong>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="nm_dokter" class="form-control" placeholder="Nama Dokter">
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



    <script type="text/javascript">

        $(function() {
            $('.date').datepicker({  
                format: 'mm-dd-yyyy'
            }); 
        });

         
    </script> 