<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            
                'title' => 'required|unique:posts,title,' . $this->id,
                'excerpt' => 'required',
                'body' => 'required',
                'image_path' => 'mimes:jpg,png,jpeg|max:5048' 
        ];

        if (in_array($this->method(), ['POST'])) 
        {
            $rules = ['image_path' => 'required|mimes:jpg,png,jpeg|max:5048'];
        }

        return $rules;
    }
}
