<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

//new
use App\Http\Requests;
use App\Http\Resources\Type as TypeResource;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Types
        $types=Type::all();

        //return
        return TypeResource::collection($types);
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
        $type=$request->isMethod('put')?Type::findOrFail($request->type_id):new Type;
        $type->id=$request->input('type_id');
        $type->libelle=$request->input('libelle');
        $type->description=$request->input('description');

        if($type->save())
        {
            return new TypeResource($type);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $id)
    {
        //
        $type=Type::findOrFail($id);
        //
        return new TypeResource($type);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //
        $type=Type::findOrFail($id);
        //
        if ($type->delete()) {
            return new TypeResource($type);
        }
        
    }
}
