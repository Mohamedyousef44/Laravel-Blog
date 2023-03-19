<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> function(){
                if($user = User::inRandomOrder()->first()){
                    return $user->id;
                }
            },
            
            'post_id'=> function(){
                if($post = Post::inRandomOrder()->first()){
                    return $post->id;
                }
            },
            'content'=>fake()->sentence(),
        ];
    }
}
