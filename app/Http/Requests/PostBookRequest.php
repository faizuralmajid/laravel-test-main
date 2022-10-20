<?php

namespace App\Http\Requests;

use App\Rules\PublisedYearRule;
use Illuminate\Foundation\Http\FormRequest;

class PostBookRequest extends FormRequest
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
        // @TODO implement
        return [
            'isbn' => 'required|min:13|numeric|unique:books,isbn',
            'title' => 'required',
            'description' => 'required',
            'published_year' => ['required','numeric','integer',new PublisedYearRule]
        ];
    }
}
