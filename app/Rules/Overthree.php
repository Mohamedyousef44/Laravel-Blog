<?php

namespace App\Rules;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Overthree implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $posts = Post::all()->where('user_id' , $value );
        // dd(count($posts));
        if(count($posts) > 3){
            $fail('any :attribute must post 3 posts only');
        }
    }
}
