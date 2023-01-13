<?php

namespace App\Http\Controllers;

use App\Models\Annee_formation;
use App\Models\AnneFormation;
use App\Models\Brief;
use App\Models\Formateur;
use App\Models\Groupes;
use App\Models\Groupes_apprenant;
use App\Models\PreparationBrief;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class annee_formationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AnneFormation::all();
    }
    // public function formation(Request $request,$id){
    // //22222
    //  $year = AnneFormation::findOrFail($id);
    //     $group = Groupes::where('Annee_formation_id', $year->id)->first();
    //     $studentCount = $group->students->count();
    //     $total_done = Tache::where('Etat','=','terminer')->get()->count();
    //     $total_pause = Tache::where('Etat','=','en pause')->get()->count();
    //     $total_standby = Tache::where('Etat','=','en cours')->get()->count();
    //     $total_states = ($total_done + $total_pause + $total_standby);
    //     $group_progress = ($total_done * 100)/$total_states;
    //     return [
    //                 'year' => $year,
    //                 'group' => $group,
    //                 'studentCount' => $studentCount,
    //                 'group_av' => intval($group_progress),
    //             ];
    // }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
