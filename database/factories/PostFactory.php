<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->sentence(),
            'user_id'=> function(){
                if($user = User::inRandomOrder()->first()){
                    return $user->id;
                }
            },
        ];
    }
}