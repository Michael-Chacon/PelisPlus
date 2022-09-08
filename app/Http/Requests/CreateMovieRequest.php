<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\validation\Rule;

class CreateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|int',
            'url' => [
                'required',
                Rule::unique('movies')->ignore($this->route('movie')),
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'img' => ['required', 'image'],
        ];
    }
}
