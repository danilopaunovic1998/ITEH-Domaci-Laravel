<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkinCollection;
use App\Http\Resources\SkinResource;
use App\Models\Skin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkinController extends Controller
{
    //display all skins
    public function index()
    {
        $skins = Skin::all();
        return new SkinCollection($skins);
    }

    //display skin with ID
    public function show(Skin $skin)
    {
        return new SkinResource($skin);
    }

    //add new skin
    public function store(Request $request)
    {
        $skin = new Skin;

        $skin->name = $request->name;
        $skin->color = $request->color;
        $skin->champion_id = $request->champion_id;

        $skin->save(); 
          
    }

    //update skin with id

    public function update(Request $request, Skin $skin)
    {
        $skin = Skin::where('id','=', $skin->id)->first();

        $skin->update($request->all());
        return $skin;
    }

    //delete champion with ID

    public function destroy(Skin $skin)
    {
        $deleted = DB::table('skins')->where('id','=',$skin->id)->delete();
    }
}
