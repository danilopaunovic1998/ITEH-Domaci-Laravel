<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChampionCollection;
use App\Http\Resources\ChampionResource;
use App\Models\Champion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChampionController extends Controller
{
    //display all champions
    public function index()
    {
        $champions = Champion::all();
        return new ChampionCollection($champions);
    }

    //display champion with ID
    public function show(Champion $champion)
    {
        return new ChampionResource($champion);
    }

    //add new champion
    public function store(Request $request)
    {
        $champion = new Champion;

        $champion->name = $request->name;
        $champion->attack = $request->attack;
        $champion->defence = $request->defence;

        $champion->save();
    }

    //update champion with id
    public function update(Request $request, Champion $champion)
    {
        $champion = Champion::where('id', '=', $champion->id)->first();

        
        $champion->update($request->all());
    }

    //delete champion with id

    public function destroy(Champion $champion)
    {
        $deleted = DB::table('champions')->where('id','=', $champion)->delete();
    }
}
