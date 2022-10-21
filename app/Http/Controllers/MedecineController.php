<?php

namespace App\Http\Controllers;

use App\Models\Medecine;
use Illuminate\Http\Request;

class MedecineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Medecine[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Medecine::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Medecine::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medecine  $medecine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medecine $medecine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medecine  $medecine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medecine $medecine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medecine  $medecine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medecine $medecine)
    {
        //
    }
}
