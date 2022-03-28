<?php

namespace App\Http\Controllers;

use App\model\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    protected $poli;

    /**
     * Instantiate a new PoliController instance.
     */
    public function __construct(Poli $poli)
    {
        $this->poli  = $poli;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polie = $this->poli->paginate(5);        
        return view('poli.index', compact('polie'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poli.create');
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
            'kd_poli' => 'required',
            'nm_poli'=> 'required'
        ]);

        unset($request['_token']);
        unset($request['_method']);

        $this->poli->create($request->all());
        return redirect()->route('indexPoli')
            ->with('success', 'Poli created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $this->poli->where('kd_poli',$request->kd_poli)->first();
        $this->data = array('data' => $data);
        return view('poli.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = $this->poli->where('kd_poli',$request->kd_poli)->first();
        $this->data = array('data' => $data);

        return view('poli.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poli $poli)
    {
        $request->validate([
            'kd_poli' => 'required',
            'nm_poli' => 'required'
        ]);

        unset($request['_token']);
        unset($request['_method']);
        $this->poli->where('kd_poli',$request->kd_poli)->update($request->all());

        return redirect()->route('indexPoli')
            ->with('success', 'Poli updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->poli->where('kd_poli',$request->kd_poli)->delete();
        return redirect()->route('indexPoli')
            ->with('success', 'Poli deleted successfully');
    }
}
