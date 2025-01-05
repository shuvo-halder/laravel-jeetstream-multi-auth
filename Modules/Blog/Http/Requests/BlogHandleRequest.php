<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogHandleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['required','max:255','min:3'],
            'image'=>['required','mimes:png,jpeg,jpg,png']
        ];
    }

    public function messages(){
        return [
            'name.required'=>'name must need to this field',
            'image.required'=>'image must upload in this inputed field',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
