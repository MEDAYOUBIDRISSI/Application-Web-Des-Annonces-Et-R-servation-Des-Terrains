<?php

namespace App\Http\Controllers;

use App\Terrain;
use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB; 
use Auth;
//new
use App\Http\Requests;
use App\Http\Resources\Terrain as TerrainResource;

class TerrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrain=DB::table('terrains')->where("user_id","=",Auth::user()->id)->get();
        $pubs=array();
        $array2= array(); 
        $i=0;
        foreach($terrain as $pub)
        {
            $Image=DB::table('images')->where("terrain_id","=",$pub->id)->get();
            $pubs[$i][0]=$pub;
            $pubs[$i++][1]=$Image;
        }
        return response()->json($pubs);
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
        $terrain=new Terrain();
        $terrain->nom=$request->input('nom');
        $terrain->longeur=$request->input('longeur');
        $terrain->largeur=$request->input('largeur');
        $terrain->pack_id=$request->input('pack_id');
        $terrain->categorie_id=$request->input('categorie_id');
        $terrain->type_id=$request->input('type_id');
        $terrain->user_id=$request->input('user_id');  
        if($request->url != null)
        {
            $exploaded=explode(',',$request->url);
                $decoded=base64_decode($exploaded[1]);
            if(str_contains($exploaded[0],'jpeg'))
            {
                $extension='jpg';
            }
            else
            {
                $extension='png';
            }

            $fileName=str_random().'.'.$extension;

            $path=public_path().'/'.$fileName;

            file_put_contents($path,$decoded); 

            $var = explode("/", $path);
            $terrain->url=$var[1];
        }
        $terrain->save();
        return new TerrainResource($terrain);

            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $terrain=DB::table('terrains')->where("id","=",$id)->get();
        return TerrainResource::collection($terrain);
    }

    public function showterrains($id)
    {
        //
        $terrain=DB::table('terrains')->where("user_id","=",$id)->get();
        //
        //return $terrain;
        return TerrainResource::collection($terrain);
    }
    public function detailterrain($id)
    {
        //
        $terrain=DB::table('terrains')->where("id","=",$id)->get();

        return TerrainResource::collection($terrain); 
        
    }
    public function detailterrain2($id)
    {
        //
        $terrain=DB::table('terrains')->where("id","=",$id)->get();

        $pubs=array();
        $array2= array();
        $i=0;
        foreach($terrain as $pub)
        {
            $User=DB::table('heures')->get();
            $pubs[$i][0]=$pub;
            $pubs[$i++][1]=$User;
        }
        return response()->json($pubs);
        
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function edit(Terrain $terrain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terrain $terrain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terrain $terrain)
    {
        //
    }
}
