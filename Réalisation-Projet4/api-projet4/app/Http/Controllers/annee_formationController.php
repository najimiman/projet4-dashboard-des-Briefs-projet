<?php

namespace App\Http\Controllers;

use App\Models\Annee_formation;
use App\Models\AnneFormation;
use App\Models\Formateur;
use App\Models\Groupes;
use App\Models\Groupes_apprenant;
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
    //methode id formateur and select year
    public function methodeanne($formateur, $annescolaire)
    {
        $result = DB::table('groupes')
            ->selectRaw(
                'groupes.id,groupes.Nom_groupe,
                formateur.id as id_formateur,
                formateur.Nom_formateur,
                anne_formation.Annee_scolaire',
            )
            ->join('anne_formation', 'groupes.Annee_formation_id', '=', 'anne_formation.id')
            ->join('formateur', 'groupes.Formateur_id', '=', 'formateur.id')
            ->where('formateur.id', $formateur)
            ->where('anne_formation.Annee_scolaire', $annescolaire)
            
            // ->orderBy('exo.id', 'asc')
            // ->limit(0,1)
            ->first();
        return $result;
    }
    //methode count nb apprenent en group
    public function methodecountnbapprene($idgroup)
    {
        $result = DB::table('groupes_apprenant')
            ->selectRaw(
                'groupes.Nom_groupe,COUNT(groupes_apprenant.Apprenant_id) as nb'
            )
            ->join('groupes', 'groupes_apprenant.Groupe_id', '=', 'groupes.id')
            ->where('groupes_apprenant.Groupe_id', $idgroup)
            ->groupBy('groupes.Nom_groupe')
            ->first();
        return $result;
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
