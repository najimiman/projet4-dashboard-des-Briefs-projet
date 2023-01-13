<?php

namespace App\Http\Controllers;

use App\Models\AnneFormation;
use App\Models\Apprenant;
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
    public function years()
    {
        $years = AnneFormation::all();
        return $years;
    }
    public function formation(Request $reaquest, $id)
    {
        $year = AnneFormation::findOrFail($id);
        $group = Groupes::where('Annee_formation_id', $year->id)->first();
        $studentCount = $group->students->count();

        $brief_info = [];
        $students = $group->students()->get();

        foreach ($students as $student) {
            $b = Brief::where('Apprenant_id', $student->id)->get();
        }
        foreach ($b as $brief) {
            $brief_aff = PreparationBrief::where('id', $brief->Preparation_brief_id)->get();
        }

        $total_tasks_briefs = [];
        $total_tasksDone_briefs = [];
        foreach ($students as $student) {
            foreach ($b as $brief) {

                $total_task_brief =  Tache::where('preparation_brief_id', $brief->Preparation_brief_id)
                    ->get()->count();
                $total_taskDone_brief = Tache::where('preparation_brief_id', $brief->Preparation_brief_id)
                    ->where('Etat', 'terminer')
                    ->get()->count();
                if ($total_task_brief != 0) {
                    $brief_av = (100 / $total_task_brief) * $total_taskDone_brief;
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
        if ($total_tasks_briefs_count != 0) {
            $group_av = (100 / $total_tasks_briefs_count) * $total_tasksDone_briefs_count;
        } else {
            $group_av = 0;
        }
        return [
            'year' => $year,
            'group' => $group,
            'studentCount' => $studentCount,
            'brief_aff' => $brief_aff,
            'briefs' => collect($brief_info)->unique(),
            'group_av' => $group_av
        ];
    }


    public function studentAv()
    {
        $students = Apprenant::all();
        $briefs = PreparationBrief::all();
        foreach ($students as $student) {
            foreach ($briefs as $brief) {
                $task_done = Tache::where('Apprenant_id', $student->id)
                    ->where('preparation_brief_id', $brief->id)
                    ->where('Etat', 'terminer')
                    ->get()->count();
                $totalTasks = Tache::where('Apprenant_id', $student->id)
                    ->where('preparation_brief_id', $brief->id)
                    ->get()->count();
                if ($totalTasks != 0) {
                    $brief_id = $brief->id;
                    $brief_name = $brief->Nom_du_brief;
                    $student_id = $student->id;
                    $name = $student->Nom;
                    $studentAv = ((100 / $totalTasks) * ($task_done));
                    $arr[] = [
                        'student_name' => $name,
                        'av' => $studentAv,
                        'brief' => $brief_id,
                        'student_id' => $student_id,
                        'brief_name' => $brief_name
                    ];
                }
            }
        }
        return response()->json([
            'arr'   => $arr,
        ]);
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
