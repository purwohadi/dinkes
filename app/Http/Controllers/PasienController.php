<?php

namespace App\Http\Controllers;

use App\model\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    protected $pasien;

    /**
     * Instantiate a new PasienController instance.
     */
    public function __construct(Pasien $pasien)
    {
        $this->pasien  = $pasien;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pasiens = $this->pasien->paginate(5);        
        return view('pasien.index', compact('pasiens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
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
            'nm_pasien' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required'
        ]);

        unset($request['_token']);
        unset($request['_method']);

        $this->pasien->create($request->all());
        return redirect()->route('index')
            ->with('success', 'Pasien created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $this->pasien->where('no_rkm_medis',$request->no_rkm_medis)->first();
        $this->data = array('data' => $data);
        return view('pasien.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = $this->pasien->where('no_rkm_medis',$request->no_rkm_medis)->first();
        $this->data = array('data' => $data);
        return view('pasien.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'no_rkm_medis' => 'required',
            'nm_pasien' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required'
        ]);

        unset($request['_token']);
        unset($request['_method']);
        $this->pasien->where('no_rkm_medis',$request->no_rkm_medis)->update($request->all());

        return redirect()->route('index')
            ->with('success', 'Pasien updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->pasien->where('no_rkm_medis',$request->no_rkm_medis)->delete();
        return redirect()->route('index')
            ->with('success', 'Pasien deleted successfully');
    }
}
