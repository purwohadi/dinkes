@extends('layouts.app')

@section('content')

    <br>    

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Poli </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('poli/create')}}" title="Add Poli"> <i class="fas fa-plus-circle"></i>
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
            <th>Kode Poli</th>
            <th>Nama Poli</th>
            <th width="150px">Actions</th>
        </tr>
        @foreach ($polie as $key => $poli)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$poli->kd_poli}}</td>
                <td>{{$poli->nm_poli}}</td>
                <td align="center">
                    <form action="{{route('deletePoli',['kd_poli' => $poli->kd_poli])}}" method="POST">
                    <a href="{{route('showPoli',['kd_poli' => $poli->kd_poli]) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>

                    <a href="{{route('editPoli',['kd_poli' => $poli->kd_poli]) }}">
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

    {!! $polie->links() !!}

@endsection