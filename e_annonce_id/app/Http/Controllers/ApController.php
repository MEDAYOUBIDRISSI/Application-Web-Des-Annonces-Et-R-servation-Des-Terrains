<?php

namespace App\Http\Controllers;

use App\Reserver;
use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB; 
use Auth;
//new
use App\Http\Requests;
use App\Http\Resources\Reserver as ReserverResource;

class ApController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $listproduitdata = DB::table('reservers')
        ->join('terrains', 'terrains.id', '=', 'reservers.terrain_id')
        ->where('terrains.user_id','=',Auth::user()->id)
        ->select('terrains.nom as nom_pr',DB::raw('count(reservers.id) as sommeP'))
        ->groupBy('terrains.nom')
        ->get();
        $rows = [];
        $labels = [];

        foreach ($listproduitdata as $k) {
            # code...
            $rows[] = $k->sommeP;
            $labels[] = $k->nom_pr;
        }
        $data=[
            'labels'=>$labels,
            'rows'=>$rows
        ];
         
        //return json_encode($data);
        return response()->json(['data'=>$data]);
    }

    public function index_2()
    {
        // 
        $listproduitdata = DB::table('reservers')
        ->join('terrains', 'terrains.id', '=', 'reservers.terrain_id')
        ->join('heures', 'heures.id', '=', 'reservers.heure_id')
        ->where('terrains.user_id','=',Auth::user()->id)
        ->select('heures.heure as nom_pr',DB::raw('count(reservers.id) as sommeP'))
        ->groupBy('terrains.nom')
        ->get();
        $rows = [];
        $labels = [];

        foreach ($listproduitdata as $k) {
            # code...
            $rows[] = $k->sommeP;
            $labels[] = $k->nom_pr;
        }
        $data=[
            'labels'=>$labels,
            'rows'=>$rows
        ];
         
        //return json_encode($data);
        return response()->json(['data'=>$data]);
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
