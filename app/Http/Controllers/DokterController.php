<?php

namespace App\Http\Controllers;

use App\model\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    protected $dokter;

    /**
     * Instantiate a new DokterController instance.
     */
    public function __construct(Dokter $dokter)
    {
        $this->dokter  = $dokter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = $this->dokter->paginate(5);        
        return view('dokter.index', compact('dokters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokter.create');
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
            'kd_dokter' => 'required',
            'nm_dokter' => 'required',
        ]);

        unset($request['_token']);
        unset($request['_method']);

        $this->dokter->create($request->all());
        return redirect()->route('indexDokter')
            ->with('success', 'Dokter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Dokter  $dokter   
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $this->dokter->where('kd_dokter',$request->kd_dokter)->first();
        $this->data = array('data' => $data);
        return view('dokter.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = $this->dokter->where('kd_dokter',$request->kd_dokter)->first();
        $this->data = array('data' => $data);
        return view('dokter.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokter $dokter)
    {
        $request->validate([
            'kd_dokter' => 'required',
            'nm_dokter' => 'required',
        ]);

        unset($request['_token']);
        unset($request['_method']);
        $this->dokter->where('kd_dokter',$request->kd_dokter)->update($request->all());

        return redirect()->route('indexDokter')
            ->with('success', 'Dokter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->dokter->where('kd_dokter',$request->kd_dokter)->delete();
        return redirect()->route('indexDokter')
            ->with('success', 'Dokter deleted successfully');
    }
}
