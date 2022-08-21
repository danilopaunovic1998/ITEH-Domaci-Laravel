<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChampionResource;
use App\Http\Resources\SkinCollection;
use App\Models\Skin;
use App\Models\Champion;
use Illuminate\Http\Request;

class ChampionSkinController extends Controller
{
    public function index($champion_id)
    {
        $champion = Champion::get()->where('id', '=', $champion_id)->first();
        if (is_null($champion))
            return response()->json('Champion not found', 404);
        $skins = Skin::get()->where('champion_id', '=', $champion_id);
        if (is_null($skins))
            return response()->json('Skins not found', 404);

        return response()->json(['champion' => new ChampionResource($champion), 'skins' => new SkinCollection($skins)]);
    }
}
