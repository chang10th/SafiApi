<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;
use Illuminate\Http\Request;

class PractitionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Practitioner[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Practitioner::with('practitionerstate')->get();
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
     * @return Practitioner[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return Practitioner::all()->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Practitioner $practitioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practitioner $practitioner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practitioner $practitioner)
    {
        //
    }
}
