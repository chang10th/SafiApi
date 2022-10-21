<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\MedecineVisitreport;
use App\Models\Practitioner;
use App\Models\Visit;
use App\Models\Visitreport;
use App\Models\Visitstate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return [
            'visitsTodayDone'=> Visit::whereDate('attendedDate', Carbon::today())
                ->where([
                    ['employee_id',Auth::user()->getAuthIdentifier()],
                    ['visitstate_id',2],
                ])
                ->with('practitioner')
                ->get(),

            'visitsTomorrow'=> Visit::whereDate('attendedDate', Carbon::tomorrow())
                ->where('employee_id',Auth::user()->getAuthIdentifier())
                ->with('practitioner')
                ->get(),
            ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Practitioner[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
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
    public function storeVisit(Request $request)
    {
        Visit::create([
            'practitioner_id'=>$request->practitioner_id,
            'employee_id'=>$request->employee_id,
            'attendedDate'=>$request->attendedDate,
            'visitstate_id'=>$request->visitstate_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::with('practitioner','employee')->find($id);
        return [
            'visitDetails'=>$visit,
            // On récupère le dernier compte-rendu en triant par date via le orderBy()
            'report'=>Visitreport::where('visit_id', $visit->id)
                ->orderBy('creationDate','desc')
                ->first(),
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Visit[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Visit::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        // On vérifie que la date est supérieur à celle d'aujourd'hui
        if ($request->attendedDate > Carbon::today())
        {
            Visit::where('id',$id)
                ->update([
                    'attendedDate'=>$request->attendedDate,
                ]);
            return Visit::find($id);
        }
    }

    public function delete($id)
    {
        Visit::where('id',$id)->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        //
    }

    public function storeVisitreport(Request $request)
    {
        Visitreport::create([
            'visit_id'=>$request->visit_id,
            'creationDate'=>$request->creationDate,
            'comment'=>$request->comment,
            'starScore'=>$request->starScore,
            'visitreportstate_id'=>$request->visitreportstate_id,
        ]);

        // On récupère le compte-rendu que l'on vient de créer pour y joindre les médicaments si il y en a.

//        $visitreport=Visitreport::where('visit_id', $request->visit_id)
//            ->orderBy('creationDate','desc')
//            ->first();
//
//        if(!is_null($request->medecines))
//        {
//            foreach($request->medecines as $medecine)
//            MedecineVisitreport::create([
//                'medecine_id'=>$medecine->id,
//                'quantity'=>$medecine->quantity,
//                'visitreport_id'=>$visitreport->id,
//            ]);
//        }
    }
}
