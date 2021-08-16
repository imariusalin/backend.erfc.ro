<?php

namespace App\Http\Controllers;

use App\Models\Clienti;
use App\Models\User;
use Illuminate\Http\Request;
use DB;


class ClientiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clienti  = Clienti::all();
        return view('admin.clienti',compact('clienti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adauga_client');
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
            'nume_firma' => 'required',
            'cui_firma' => 'required',
            'owner' => 'required',
            'status' => 'required',
        ]);

        Clienti::create($request->all());

        return redirect()->route('clienti.index')->with('success','Client Adaugat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clienti  $clienti
     * @return \Illuminate\Http\Response
     */
    public function show(Clienti $clienti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clienti  $clienti
     * @return \Illuminate\Http\Response
     */
    public function edit(Clienti $clienti)
    {

        return view('admin.editeaza_client',compact('clienti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clienti  $clienti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Clienti $clienti)
    {
        $request->validate([
            'nume_firma' => 'required',
            'cui_firma' => 'required',
            'owner' => 'required',
            'status' => 'required',
        ]);

        $clienti->update($request->all());

        return redirect()->route('clienti.index')->with('success','Client Modificat.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clienti  $clienti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clienti $clienti)
    {
        $clienti->delete();

        return redirect()->route('clienti.index')->with('success','Client Sters.');

    }
}
