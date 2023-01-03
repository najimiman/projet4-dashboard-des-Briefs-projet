<?php

namespace App\Http\Controllers;

use App\Models\Annee_formation;
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
        return Annee_formation::all();
    }
    //methode id formateur and select year
    public function methodeanne($formateur, $annescolaire)
    {
        $result = DB::table('Groupes')
            ->selectRaw(
                'Groupes.id,Groupes.Nom_groupe,
                Formateur.id as id_formateur,
                Formateur.Nom_formateur,
                Annee_formation.Annee_scolaire',
            )
            ->join('Annee_formation', 'Groupes.Annee_formation_id', '=', 'Annee_formation.id')
            ->join('Formateur', 'Groupes.Formateur_id', '=', 'Formateur.id')
            ->where('Formateur.id', $formateur)
            ->where('Annee_formation.Annee_scolaire', $annescolaire)
            
            // ->orderBy('exo.id', 'asc')
            // ->limit(0,1)
            ->first();
        return $result;
    }
    //methode count nb apprenent en group
    public function methodecountnbapprene($idgroup)
    {
        $result = DB::table('Groupes_apprenant')
            ->selectRaw(
                'Groupes.Nom_groupe,COUNT(Groupes_apprenant.Apprenant_id) as nb'
            )
            ->join('Groupes', 'Groupes_apprenant.Groupe_id', '=', 'Groupes.id')
            ->where('Groupes_apprenant.Groupe_id', $idgroup)
            ->groupBy('Groupes.Nom_groupe')
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
