<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadProductRequest extends FormRequest
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
            //
            'name'=>'required|string|max:255',
            'cat_id'=>'required|string|max:255',
            'description'=>'required|string',
            'spec'=>'required|string',
            'price'=>'required',
            'picture'=>'required|image|max:700'
        ];
    }
}
