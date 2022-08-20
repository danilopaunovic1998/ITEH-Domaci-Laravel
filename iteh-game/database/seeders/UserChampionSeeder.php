<?php

namespace Database\Seeders;

use App\Models\UserChampion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserChampionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserChampion::factory(100)->create();
    }
}
