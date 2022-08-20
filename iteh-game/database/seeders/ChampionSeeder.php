<?php

namespace Database\Seeders;

use App\Models\Champion;
use Database\Factories\ChampionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChampionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Champion::factory(20)->create();
    }
}
