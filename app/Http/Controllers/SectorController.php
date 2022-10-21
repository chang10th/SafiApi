<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        return Sector::all();
    }

    /**
     * Display the specified resource.
     *
     * @return Sector[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return Sector::all()->find($id);
    }
}
