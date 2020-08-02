<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

//new
use App\Http\Requests;
use App\Http\Resources\Categorie as CategorieResource;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categorie=Categorie::all();
        
        return CategorieResource::collection($Categorie);

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
        $Categorie=$request->isMethod('put')?Categorie::findOrFail($request->categorie_id):new Categorie;
        $Categorie->id=$request->input('categorie_id');
        $Categorie->libelle=$request->input('libelle');
        $Categorie->description=$request->input('description');

        if($Categorie->save())
        {
            return new CategorieResource($Categorie);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Categorie=Categorie::findOrFail($id);
        //
        return new CategorieResource($Categorie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $Categorie=Categorie::findOrFail($id);
        //
        if ($Categorie->delete()) {
            return new CategorieResource($Categorie);
        }
    }
}
