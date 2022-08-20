<?php

namespace Database\Factories;

use App\Models\Skin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skin>
 */
class SkinFactory extends Factory
{
    protected $model = Skin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->lastName(),
            'color'=> $this->faker->colorName(),
            'champion_id'=>$this->faker->numberBetween(1,20),
        ];
    }
}
