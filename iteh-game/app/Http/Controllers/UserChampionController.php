<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChampionCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserChampion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserChampionController extends Controller
{
    //vraca sve champion-e koje logovani user poseduje
    public function index()
    {

        $user = Auth::user();
        $champions = User::join('user_champions', 'users.id', '=', 'user_champions.user_id')
            ->join('champions', 'user_champions.champion_id', '=', 'champions.id')
            ->where('users.id', '=', $user->id)
            ->distinct('user_champions.champion_id')
            ->get(['champions.*']);

        return response()->json(['user' => new UserResource($user), 'Champions owned:' => new ChampionCollection($champions)]);
    }

    //dodaje championa logovanom korisniku
    public function store($champion_id)
    {
        $uc = new UserChampion;

        $uc->user_id = Auth::user()->id;
        $uc->champion_id = $champion_id;

        $uc->save();
        return response()->json(["message" => 'Champion je kupljen']);
    }

    //brisanje championa logovanog korisnika
    public function destroy($champion_id)
    {
        $deleted =  DB::table('user_champions')->where('user_id', '=', Auth::user()->id)->where('champion_id', '=', $champion_id)->delete();
        return response()->json(["message" => 'Champion je prodat']);
    }
}
