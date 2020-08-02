<?php

namespace App\Http\Controllers;

use App\Pack;
use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB; 
use Auth;
//new
use App\Http\Requests;
use App\Http\Resources\Pack as PackResource;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //Get Pack
        $Pack=Pack::all();

        //return
        return PackResource::collection($Pack);
    }
    public function indexclube()
    { 
        $Pack=DB::table('packs')
        ->where('user_id','=',Auth::user()->id) 
        ->get();

        //return
        return PackResource::collection($Pack);
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
        $Pack=$request->isMethod('put')?Pack::findOrFail($request->pack_id):new Pack;
        $Pack->id=$request->input('pack_id');
        $Pack->user_id=$request->input('user_id');
        $Pack->prix_matain=$request->input('prix_matain');
        $Pack->prix_soir=$request->input('prix_soir');
        $Pack->heure_debut_matin=$request->input('heure_debut_matin');
        $Pack->heure_debut_soir=$request->input('heure_debut_soir');
        if($Pack->save())
        {
            return new PackResource($Pack);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //
        $Pack=Pack::findOrFail($id);
        //
        return new PackResource($Pack);
    }

    public function showterrain($id)
    {
        $pack=DB::table('packs')->where("id","=",$id)->get();

        return PackResource::collection($pack);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $Pack = Pack::find($id);
        $Pack->prix_matain=$request->input('prix_matain');
        $Pack->prix_soir=$request->input('prix_soir');
        $Pack->heure_debut_matin=$request->input('heure_debut_matin');
        $Pack->heure_debut_soir=$request->input('heure_debut_soir');
        if($Pack->save())
        {
            return new PackResource($Pack);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pack $pack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //
         $Pack=Pack::findOrFail($id);
        //
        if ($Pack->delete()) {
            return new PackResource($Pack);
        }
    }
}
