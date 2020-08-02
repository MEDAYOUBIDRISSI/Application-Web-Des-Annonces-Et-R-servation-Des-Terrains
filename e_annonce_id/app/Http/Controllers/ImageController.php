<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB; 
use Auth;
//new
use App\Http\Requests;
use App\Http\Resources\Image as ImageResource;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $Image=DB::table('images')->where("publication_id","=",$id)->get();

        //return json_encode($Image);
         return ImageResource::collection($Image);
    }
    public function index_terrain($id)
    {
        $Image=DB::table('images')->where("terrain_id","=",$id)->get();

         return ImageResource::collection($Image);
    }

    public function imageusers()
    {
        $Image=DB::table('images')->where("user_id","=",Auth::user()->id)->get();

         return ImageResource::collection($Image);
    }

    public function imageusers_edite($id)
    {
        $Image=DB::table('images')->where("user_id","=",$id)->get();

         return ImageResource::collection($Image);
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
    public function storeimg(Request $request)
    {
        //
        $image=new Image();
        $image->terrain_id=$request->input('terrain_id');
        
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
            $image->url=$var[1];
        }

        if($image->save())
        {
            return new ImageResource($image);
        }
    }

    public function imageprofile(Request $request)
    {
        //
        $image=new Image();
        $image->user_id=$request->input('user_id');
        
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
            $image->url=$var[1];
        }

        if($image->save())
        {
            return new ImageResource($image);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }

    public function authclient()
    {
        $User=DB::table('images')->where("user_id","=",1)->get();

        //return
        return ImageResource::collection($User);
    }

    public function store_img_pub_1(Request $request)
    {
        //
        $maxpub = DB::table('publications')->max('id');
            $img_pub = new Image();
            if ($requist->hasFile('url')) 
            {
                $path = $requist->url->store('images');
                $var = explode("/", $path);
                $url = $requist->file("url")->storeAs("images", $var1[1], 'public');

                $img_pub->publication_id=$maxpub;
                $img_pub->url = "http://localhost:8000/storage/".$url;
            }

        $img_pub->Save(); 

        return new ImageResource($img_pub);
    }
}
