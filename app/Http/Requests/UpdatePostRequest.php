<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
           
            "url" => 'active_url',
            'title'=>['required' ,Rule::unique('posts', 'title')->ignore($this->post) , 'min:3'],
            'description'=>['required' , 'min:10'],
            'content'=>['required' , 'min:100'],
            'image'=>['mimes:jpg,png']
        ];
    }
}