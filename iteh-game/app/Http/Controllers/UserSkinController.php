<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkinCollection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Models\UserSkin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserSkinController extends Controller
{
    //vraca sve skin-ove koje loginovani user poseduje

    public function index()
    {
        $user = Auth::user();
        $skins = User::join('user_skins', 'users.id', '=', 'user_skins.user_id')
            ->join('skins', 'user_skins.skin_id', '=', 'skins.id')
            ->where('users.id', '=', $user->id)
            ->distinct('user_skins.skin_id')
            ->get(['skins.*']);

        return response()->json(['user' => new UserResource($user), 'Skins owned:' => new SkinCollection($skins)]);
    }

    //dodaje skin logovanom korisniku
    public function store($skin_id)
    {
        $us = new UserSkin;

        $us->user_id = Auth::user()->id;
        $us->skin_id = $skin_id;

        $us->save();
        return response()->json(["message" => 'Skin je kupljen']);
    }
    
    //brisanje skina logovanog korisnika
    public function destroy($skin_id)
    {
        $deleted =  DB::table('user_skins')->where('user_id', '=', Auth::user()->id)->where('skin_id', '=', $skin_id)->delete();
        return response()->json(["message" => 'Skin je prodat']);
    }
}
