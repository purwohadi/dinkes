@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Registrasi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('indexPoli')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

    <form action="{{route('updateRegistrasi')}}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <strong>No Rekam Medis </strong>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-select" name="no_rkm_medis">
                            @foreach($pasien as $rowPasien)
                                <option value="{{$rowPasien->no_rkm_medis}}" {{($data->no_rkm_medis == $rowPasien->no_rkm_medis)?'selected':''}}>{{$rowPasien->no_rkm_medis.' - '.$rowPasien->nm_pasien}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
    
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <strong>Dokter</strong>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-select" name="kd_dokter">
                            @foreach($dokter as $rowDokter)
                                <option value="{{$rowDokter->kd_dokter}}"  {{($data->kd_dokter == $rowDokter->kd_dokter)?'selected':''}}>{{$rowDokter->kd_dokter.' - '.$rowDokter->nm_dokter}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <strong>Poli </strong>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-select" name="kd_poli">
                            @foreach($poli as $rowPoli)
                                <option value="{{$rowPoli->kd_poli}}"  {{($data->kd_poli == $rowPoli->kd_poli)?'selected':''}}>{{$rowPoli->kd_poli.' - '.$rowPoli->nm_poli}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>           
                
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <strong>Jenis Bayar </strong>
                    </div>
                    <div class="form-group col-md-6">
                        <select class="form-select" name="jenis_bayar">
                            <option value="BPJS" {{($data->jenis_bayar == "BPJS")?'selected':''}}>BPJS</option>
                            <option value="UMUM" {{($data->kd_pjenis_bayaroli == "UMUM")?'selected':''}}>Umum</option>
                          </select>
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