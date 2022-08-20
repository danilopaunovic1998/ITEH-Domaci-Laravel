<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'attack',
        'defence',
    ];

    public function skins(){
        return $this->hasMany(Skin::class);
    }
}
