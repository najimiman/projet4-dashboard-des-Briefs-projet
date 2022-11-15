<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class tachecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tache::all();
       
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
        $request->validate([
            'nameT'=>'required',
            'dateD'=>'required',
            'dateF'=>'required',
            'description'=>'required',
        ]);
        $tache=new Tache();
        $tache->nameT=$request->input('nameT');
        $tache->dateD=$request->input('dateD');
        $tache->dateF=$request->input('dateF');
        $tache->description=$request->input('description');
        $tache->save();
        return $tache;
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
        $idtache=Tache::findOrFail($id);
        return $idtache;
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
        $tache=Tache::findOrFail($id);
        $tache->nameT=$request->input('nameT');
        $tache->dateD=$request->input('dateD');
        $tache->dateF=$request->input('dateF');
        $tache->description=$request->input('description');
        $tache->save();
        return $tache;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tache=Tache::findOrFail($id);
        $tache->delete();
        return response()->json(['data'=>[],'message'=>'deleted']);
    }
}
