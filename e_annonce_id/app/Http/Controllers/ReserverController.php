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

class ReserverController extends Controller
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

    public function mesreservation()
    {
        //
        // $reserver=DB::table('reservers')
        // ->where('user_id','=',3)
        // ->orderBy('id', 'desc')
        // ->get();
        //return json_encode($reserver);

        // return ReserverResource::collection($reserver);
        $reserver = DB::select('
        SELECT r.id,r.created_at,r.date_reservation,h.heure,t.nom,c.brand_name from 
        reservers r inner JOIN users u on r.user_id=u.id 
        inner join heures h on r.heure_id=h.id 
        inner join terrains t on r.terrain_id=t.id 
        inner join users c on c.id=t.user_id 
        where u.id=?
        ',[Auth::user()->id]);
        return json_encode($reserver);
    }

    public function listreservationall($id)
    {
        //
        $reserver = DB::select('
        SELECT u.nom,u.prenom,u.email,u.url,t.nom as nomter,r.date_reservation,h.heure,r.created_at from users u 
        inner join reservers r on u.id=r.user_id 
        inner join terrains t on t.id=r.terrain_id 
        inner join heures h on h.id=r.heure_id where t.id=?
        order by r.date_reservation desc',[$id]);
        return json_encode($reserver);
    }

    public function listreservationall_clube()
    {
        //
        $reserver = DB::select('
        SELECT u.nom,u.prenom,u.email,u.url,t.nom as nomter,r.date_reservation,h.heure,r.created_at from users u 
        inner join reservers r on u.id=r.user_id 
        inner join terrains t on t.id=r.terrain_id 
        inner join heures h on h.id=r.heure_id where t.user_id=?
        order by r.date_reservation desc',[Auth::user()->id]);
        return json_encode($reserver);
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
        $reserver = new Reserver();
        $reserver->date_reservation = $request->input('date_reservation');
        $reserver->heure_id = $request->input('heure_id');
        $reserver->user_id = $request->input('user_id');
        $reserver->terrain_id = $request->input('terrain_id');
        $reserver->Save();
        return new ReserverResource($reserver);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reserver  $reserver
     * @return \Illuminate\Http\Response
     */
    public function show(Reserver $reserver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserver  $reserver
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserver $reserver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserver  $reserver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserver $reserver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserver  $reserver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserver $reserver)
    {
        //
    }
}
