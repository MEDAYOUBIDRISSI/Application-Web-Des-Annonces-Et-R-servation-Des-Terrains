<?php

namespace App\Http\Controllers;

use App\User;
use App\Terrain;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB; 
use Auth;

//new
use App\Http\Requests;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexall()
    {
        $User=DB::table('users')->where("id","=",Auth::user()->id)->get();
        return UserResource::collection($User);
    }

    public function indexall_edite($id)
    {
        $User=DB::table('users')->where("id","=",$id)->get();
        return UserResource::collection($User);
    }

    public function friendlist()
    {
        //$User=DB::table('users')->where("id","=",$id)->get();
        $User = DB::select('select * from users where id in(SELECT distinct(ac.user_id) from publications p 
        inner join accept_pubs ac on p.id=ac.publication_id where p.user_id=?)
        ',[Auth::user()->id]);
        return response()->json($User);
        //return UserResource::collection($User);
    }

    public function notfriend()
    {
        //$User=DB::table('users')->where("id","=",$id)->get();
        $User = DB::select('select * from users where id not in(SELECT distinct(ac.user_id) from publications p 
        inner join accept_pubs ac on p.id=ac.publication_id where p.user_id=?) and id !=? and type="client"
        ',[Auth::user()->id,Auth::user()->id]);
        return response()->json($User);
        //return UserResource::collection($User);
    }

    public function indexclub()
    {
        //
        $User=DB::table('users')->where("type","=","clube")->get();

        //return $clube;
         return UserResource::collection($User);
    } 

    public function showclub($id)
    {
        //
        $User=DB::table('users')->where("id","=",$id)->get();
        //return $terrain;
        return UserResource::collection($User);
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
        $User=$request->isMethod('put')?User::findOrFail($request->User_id):new User;
        $User->id=$request->input('User_id');
        $User->nom=$request->input('nom');
        $User->prenom=$request->input('prenom');
        $User->brand_name=$request->input('brand_name');
        $User->email=$request->input('email');
        $User->password=$request->input('password');
        $User->dateNaissance=$request->input('dateNaissance');
        $User->tel=$request->input('tel');
        $User->adresse=$request->input('adresse');
        $User->laltitude=$request->input('laltitude');
        $User->longitude=$request->input('longitude');
        $User->ville=$request->input('ville');
        $User->type=$request->input('type');

        if($User->save())
        {
            return new UserResource($User);
        }
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
        $User=User::findOrFail($id);
        //
        return new UserResource($User);
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
         $User=User::findOrFail($id);
        //
        if ($User->delete()) {
            return new UserResource($User);
        }
    }

    ////MAI

    public function loginValideUser(Request $requist)
    {
        $user = DB::table('users')->where("email","=",$requist->input('email'))->where("password","=",$requist->input('password'))->first();
        if ($user!=null) {
            // auth()::guard(null)->login($user);
            // return redirect('index');
            $data=User::find($user->id);
            auth()->login($data);
            return redirect("index");
        } 
        else 
        {
            return redirect('logine');
        }
    
    }
    public function IdValideUser($id)
    {
        $user = User::find($id);
        return new UserResource($user);
        
    }
    public function storeClient(Request $requist)
    {
        $User = new User();
        $Image = new Image();
        if ($requist->hasFile('image')) {
            $path = $requist->image->store('images');
            $var = explode("/", $path);
            $url = $requist->file("image")->storeAs("images", $var[1], 'public');

            if ($requist->hasFile('coverture')) {
                $path1 = $requist->coverture->store('images');
                $var1 = explode("/", $path1);
                $url1 = $requist->file("coverture")->storeAs("images", $var1[1], 'public');
                $User->coverture ="http://localhost:8000/storage/".$url1;
            }
            else
            { 
                $User->coverture = "timeline-1.jpg";
            }
            
            $User->nom = $requist->input('nom');
            $User->prenom = $requist->input('prenom');
            $User->email = $requist->input('email');
            $User->password=$requist->input('password');
            $User->adresse = $requist->input('adresse');
            $User->dateNaissance = $requist->input('dateNaissance');
            $User->tel = $requist->input('tel');
            $User->ville = $requist->input('ville');
            $User->type = "client";
            $User->url ="http://localhost:8000/storage/".$url;
            $User->Save();
            auth()->login($User);
            return redirect('index');
        }

    }
    public function storeClube(Request $requist)
    {
        $User = new User();
        $Image = new Image();
        if ($requist->hasFile('image')) {
            $path = $requist->image->store('/');
            $var = explode("/", $path);
            $url = $requist->file("image")->storeAs("/", $var[0], 'public');

            if ($requist->hasFile('coverture')) {
                $path1 = $requist->coverture->store('/');
                $var1 = explode("/", $path1);
                $url1 = $requist->file("coverture")->storeAs("/", $var1[0], 'public');
                $User->coverture ="storage/".$url1;
            }
            else
            {
                $User->coverture = "timeline-1.jpg";
            }

            $User->nom = $requist->input('nom');
            $User->prenom = $requist->input('prenom');
            $User->brand_name = $requist->input('brand_name');
            $User->email = $requist->input('email');
            $User->password=$requist->input('password');
            $User->adresse = $requist->input('adresse');
            $User->tel = $requist->input('tel');
            $User->ville = $requist->input('ville');
            $User->laltitude = $requist->input('laltitude');
            $User->longitude = $requist->input('longitude');
            $User->type = "clube";
            $User->url ="storage/".$url;
            $User->Save();
            auth()->login($User);
            return redirect('index');
        }

    }

    public function authuser()
    { 
        $User=DB::table('users')->where("id","=",1)->get();
        return new UserResource($User);
    }

    public function lougout()
    {
        
        Auth::logout();
        
        return redirect('logine');
    }

}
