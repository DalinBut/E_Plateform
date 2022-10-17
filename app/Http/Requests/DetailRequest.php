<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|min:9|max:10',
            'email' => 'required|email',
            'companyName' => 'required',
            'position' => 'required',
            'address' => 'required',
            'image' => '|image|mimes:jpeg,png,jpg,svg|max:2048'
        ];
    }
}
