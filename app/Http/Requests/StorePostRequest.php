<?php

namespace App\Http\Requests;

use App\Rules\Overthree;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    
    {

        // dd($this->post);
        return [
           
            "url" => 'active_url',
            'title'=>['required' , 'unique:posts,title' , 'min:3'],
            'description'=>['required' , 'min:10'],
            'content'=>['required' , 'min:100'],
            'image'=>['mimes:jpg,png'],
            'AuthorId'=>[new Overthree]
        ];
    }
}
