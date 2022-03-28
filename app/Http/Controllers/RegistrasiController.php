<?php

namespace App\Http\Controllers;

use App\model\Registrasi;
use App\model\Dokter;
use App\model\Poli;
use App\model\Pasien;

use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    protected $registrasi, $dokter, $poli, $pasien;

    /**
     * Instantiate a new RegistrasiController instance.
     */
    public function __construct(Registrasi $registrasi,
                                Dokter $dokter,
                                Poli $poli,
                                Pasien $pasien)
    {
        $this->registrasi   = $registrasi;
        $this->dokter       = $dokter;
        $this->poli         = $poli;
        $this->pasien         = $pasien;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrasis = $this->registrasi
                            ->select(['registrasi.no_rawat', 'registrasi.tgl_regis', 'registrasi.no_rkm_medis', 'dokter.nm_dokter', 'poli.nm_poli', 'registrasi.jenis_bayar'])
                            ->join('dokter','registrasi.kd_dokter','dokter.kd_dokter')
                            ->join('poli','registrasi.kd_poli','poli.kd_poli')
                            ->paginate(5);        
        return view('registrasi.index', compact('registrasis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokter = $this->dokter->get();
        $poli = $this->poli->get();
        $pasien = $this->pasien->get();
        $this->data = array('dokter' => $dokter,
                            'poli' => $poli,
                            'pasien' => $pasien,
                        );
        return view('registrasi.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_rkm_medis' => 'required',
            'kd_dokter' => 'required',
            'kd_poli' => 'required'
        ]);

        $request['tgl_regis'] = date('Y-m-d');
        $no = 1;
        $data = $this->registrasi->latest('created_at')->first();
        if($data)
        {
            $no = explode('/',$data->no_rawat);
            $no = intVal($no[3]) +1;
        }
        
        

        $request['no_rawat'] = date('Y/m/d')."/$no";

        unset($request['_token']);
        unset($request['_method']);

        $this->registrasi->create($request->all());
        return redirect()->route('indexRegistrasi')
            ->with('success', 'Registrasi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $this->registrasi->where('no_rawat',$request->no_rawat)->first();
        $this->data = array('data' => $data);
        return view('registrasi.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = $this->registrasi->where('no_rawat',$request->no_rawat)->first();

        $dokter = $this->dokter->get();
        $poli = $this->poli->get();
        $pasien = $this->pasien->get();

        $this->data = array('dokter' => $dokter,
                            'poli' => $poli,
                            'pasien' => $pasien,
                            'data' => $data
                        );

        return view('registrasi.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrasi $registrasi)
    {
        $request->validate([
            'no_rkm_medis' => 'required',
            'kd_dokter' => 'required',
            'kd_poli' => 'required'
        ]);

        unset($request['_token']);
        unset($request['_method']);
        $this->registrasi->where('no_rawat',$request->no_rawat)->update($request->all());

        return redirect()->route('indexRegistrasi')
            ->with('success', 'Registrasi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->registrasi->where('no_rawat',$request->no_rawat)->delete();
        return redirect()->route('indexRegistrasi')
            ->with('success', 'Registrasi deleted successfully');
    }
}
