<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserChampion;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        
        $this->call([
            UserSeeder::class,
            ChampionSeeder::class,
            SkinSeeder::class,
            UserChampionSeeder::class,
            UserSkinSeeder::class,
        ]);
    }
}
