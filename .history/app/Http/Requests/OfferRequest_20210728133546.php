<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        return
            [
                'name_ar' => 'required|max:100|unique:offers,name_ar',
                'name_en' => 'required|max:100|unique:offers,name_en',
                'price' => 'required|numeric',
                'details' => 'required',
                'details' => 'required',

            ];
    }

    public function messages()
    {
        return[
                     'name.unique' => __(key:'messages.offer name required'),
                     'price.numeric' =>trans(key:'messages.enter number'),
         ];
    }

}
