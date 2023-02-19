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
    public function rules(): array
    {
        return [
            'name_ar' => 'required|max:100|unique:offers,name_ar',
            'name_en' => 'required|max:100|unique:offers,name_en',
            'price' => 'required|numeric',
             'details_ar' => 'required',
            'details_en' => 'required',

        ];
    }

     public function messages(): array
     {
        return [
            'name_ar.required' => __('messages.offersName-Required'),
            'name_ar.unique' => __('messages.offersName-Unique'),
            'name_en.required' => __('messages.offersName-Required'),
            'name_en.unique' => __('messages.offersName-Unique'),
            'price.required' => __('messages.offersPrice-Required'),
            'price.numeric' => __('messages.offersPrice'),
            'details_ar.required' => __('messages.offersDetails'),
            'details_en.required' => __('messages.offersDetails'),

            'success' => __('messages.success'),
        ];
    }
}
