<?php

namespace App\Http\Controllers;

use App\Accept_pub;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB; 
use Auth;
use App\Http\Requests;
use App\Http\Resources\Accept_pub as Accept_pubResource;

class AcceptPubController extends Controller
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
     * @param  \App\Accept_pub  $accept_pub
     * @return \Illuminate\Http\Response
     */
    public function acpshow($id)
    {
        $data = DB::select('SELECT us.* FROM users us inner JOIN accept_pubs u on us.id = u.user_id
                WHERE u.publication_id = ? and valide=0',[$id]);
        return json_encode($data);
    }

    public function interesseacp($iduser,$idpup)
    {
        $data = DB::select('SELECT * FROM accept_pubs WHERE publication_id = ?  and user_id = ?',[$idpup,$iduser]);
        $acp = Accept_pub::find($data[0]->id);
        $acp->valide=1;
        $acp->save();
        
        return new Accept_pubResource($acp);
    }
    public function delinteresseacp($iduser,$idpup)
    {
        $data = DB::select('SELECT * FROM accept_pubs WHERE publication_id = ?  and user_id = ?',[$idpup,$iduser]);
        $acp = Accept_pub::find($data[0]->id);
        $acp->valide=2;
        $acp->save();
        
        return new Accept_pubResource($acp);
    }

    public function allpub()
    {
        $publication = DB::select('SELECT  p.* from publications p inner JOIN users u
        on p.user_id = u.id WHERE p.id IN (SELECT accept_pubs.publication_id 
        FROM accept_pubs WHERE accept_pubs.user_id = ? and accept_pubs.valide = 0) AND p.user_id != ?
        ORDER BY p.id asc ',[Auth::user()->id,Auth::user()->id]);
        
        $pubs=array();
        $array2= array();
        $i=0;

        foreach($publication as $pub)
        {
            $User=DB::table('users')->where("id","=",$pub->user_id)->get();
            $pubs[$i][0]=$pub;
            $pubs[$i++][1]=$User;
        }
        return response()->json($pubs);
    }
    public function allpubval()
    {
        $publication = DB::select('SELECT  p.* from publications p inner JOIN users u
        on p.user_id = u.id WHERE p.id IN (SELECT accept_pubs.publication_id 
        FROM accept_pubs WHERE accept_pubs.user_id = ? and accept_pubs.valide = 1) AND p.user_id != ?
        ORDER BY p.id asc ',[Auth::user()->id,Auth::user()->id]);
        
        $pubs=array();
        $array2= array();
        $i=0;

        foreach($publication as $pub)
        {
            $User=DB::table('users')->where("id","=",$pub->user_id)->get();
            $pubs[$i][0]=$pub;
            $pubs[$i++][1]=$User;
        }
        return response()->json($pubs);
    }
    public function allpubpasval()
    {
        $publication = DB::select('SELECT  p.* from publications p inner JOIN users u
        on p.user_id = u.id WHERE p.id IN (SELECT accept_pubs.publication_id 
        FROM accept_pubs WHERE accept_pubs.user_id = ? and accept_pubs.valide = 2) AND p.user_id != ?
        ORDER BY p.id asc ',[Auth::user()->id,Auth::user()->id]);
        
        $pubs=array();
        $array2= array();
        $i=0;

        foreach($publication as $pub)
        {
            $User=DB::table('users')->where("id","=",$pub->user_id)->get();
            $pubs[$i][0]=$pub;
            $pubs[$i++][1]=$User;
        }
        return response()->json($pubs);
    }

    public function acpstore($pub)
    {
        $ACP = new Accept_pub();
        $ACP->date_val="2019-09-09";
        $ACP->valide=0;
        $ACP->publication_id=$pub;
        $ACP->user_id=Auth::user()->id;
        $ACP->save();
        return new Accept_pubResource($ACP);
    }

    public function delacp($id)
    {
        $Publication=DB::table('accept_pubs')
        ->where("publication_id","=",$id)
        ->where("user_id","=",Auth::user()->id)
        ->get();
        $acp = Accept_pub::find($Publication[0]->id);
        $acp->delete();
        return new Accept_pubResource($acp);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accept_pub  $accept_pub
     * @return \Illuminate\Http\Response
     */
    public function edit(Accept_pub $accept_pub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accept_pub  $accept_pub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accept_pub $accept_pub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accept_pub  $accept_pub
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Publication=DB::table('accept_pubs')
        ->where("publication_id","=",$id)
        ->where("user_id","=",Auth::user()->id)
        ->get();
            //
            return $Publication;
            if ($Publication->delete()) {
                return new Accept_pubResource($Publication);
            }
    }
}
