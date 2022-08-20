<?php

namespace Database\Factories;

use App\Models\UserSkin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSkin>
 */
class UserSkinFactory extends Factory
{
    protected $model = UserSkin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,10),
            'skin_id'=>$this->faker->numberBetween(1,100),
        ];
    }
}
