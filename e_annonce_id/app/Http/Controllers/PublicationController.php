<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB; 
use Auth;
//new
use App\Http\Requests;
use App\Http\Resources\Publication as PublicationResource;
use App\Image;
 
class PublicationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publication=DB::table('publications')
        ->where('user_id','=',Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();

        
        // $pubs=array();
        // $array2= array();
        // $i=0;
        // foreach($publication as $pub)
        // {
        //     $Image=DB::table('images')->where("publication_id","=",$pub->id)->get();
        //     $pubs[$i][0]=$pub;
        //     $pubs[$i++][1]=$Image;
        // }
        // return response()->json($pubs);


        return PublicationResource::collection($publication);
    } 

    public function publication_edite($id)
    {
        $publication=DB::table('publications')
        ->where('user_id','=',$id)
        ->orderBy('id', 'desc')
        ->get();

        
        // $pubs=array();
        // $array2= array();
        // $i=0;
        // foreach($publication as $pub)
        // {
        //     $Image=DB::table('images')->where("publication_id","=",$pub->id)->get();
        //     $pubs[$i][0]=$pub;
        //     $pubs[$i++][1]=$Image;
        // }
        // return response()->json($pubs);


        return PublicationResource::collection($publication);
    } 

    public function indexall()
    {
        $publication = DB::select('
            SELECT  p.*
            from publications p inner JOIN users u
            on p.user_id = u.id
            WHERE p.id NOT IN 
                        (SELECT accept_pubs.publication_id 
                          FROM accept_pubs 
                          WHERE accept_pubs.user_id = ?)
                          AND p.user_id != ?
            ORDER BY p.id DESC
        ',[Auth::user()->id,Auth::user()->id]);

        // $publication=DB::table('publications')->join('accept_pubs', 'publications.id', '=', 'accept_pubs.user_id')
        // ->orderBy('id', 'desc')
        // ->get();


        
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


        //return PublicationResource::collection($publication);
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
        
        $publication=$request->isMethod('put')?Publication::findOrFail($request->publication_id):new Publication;
        $publication->id=$request->input('publication_id');
        $publication->titre=$request->input('titre');
        $publication->pub=$request->input('pub');
        $publication->user_id=$request->input('user_id');
        $publication->date_creation="1996-02-02";
        
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
        $publication->url=$var[1];

        }
        else{

            $publication->url='';
        }
        

        if($publication->save())
        {
            return new PublicationResource($publication);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Publication=Publication::findOrFail($id);
        //
        if ($Publication->delete()) {
            return new PublicationResource($Publication);
        }
    }
}
