<?php

namespace App\Http\Controllers;

use App\Models\AnneFormation;
use App\Models\Brief;
use App\Models\Groupes;
use App\Models\PreparationBrief;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Dashbordcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

public function formation(Request $reaquest,$id){
        $year = AnneFormation::findOrFail($id);
        $group = Groupes::where('Annee_formation_id', $year->id)->first();
        $studentCount = $group->students->count();

        $brief_aff = $group->students->map(function ($student) {
            return $student->student_preparation_brief;
        })->unique('id');

        $brief_info = [];
        $students = $group->students()->get();

        $total_tasks_briefs = [];
        $total_tasksDone_briefs = [];
        foreach($students as $student){
            $b_aff = Brief::where('Apprenant_id', $student->id)->get();
            foreach($b_aff as $brief){

                $total_task_brief =  Tache::where('apprenant_P_brief_id', $brief->Preparation_brief_id )
                                                ->get()->count();
                $total_taskDone_brief = Tache::where('apprenant_P_brief_id', $brief->Preparation_brief_id )
                                                ->where('Etat', 'terminer')
                                              ->get()->count();
                if($total_task_brief != 0){
                    $brief_av = (100 / $total_task_brief)*$total_taskDone_brief;
                    $brief_name = PreparationBrief::where('id', $brief->Preparation_brief_id)->first()->Nom_du_brief;
                    $arr1 = [
                        'brief_av' => $brief_av,
                        'brief_name' => $brief_name
                    ];
                    array_push($brief_info, $arr1);
                }
                array_push($total_tasks_briefs, $total_task_brief);
                array_push($total_tasksDone_briefs, $total_taskDone_brief);
            }

        }
        array_pop($total_tasks_briefs);
        array_pop($total_tasksDone_briefs);
        $total_tasks_briefs_count = array_sum($total_tasks_briefs);
        $total_tasksDone_briefs_count = array_sum($total_tasksDone_briefs);
        if($total_tasks_briefs_count != 0){
            $group_av = (100/$total_tasks_briefs_count)*$total_tasksDone_briefs_count;
        }else{
            $group_av = 0;
        }

        return [
            'year' => $year,
            'group' => $group,
            'studentCount' => $studentCount,
            'brief_aff' => $brief_aff,
            'briefs' => $brief_info,
            'group_av' => $group_av
        ];
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
        //
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
