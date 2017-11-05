<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lon' => 'required|numeric|min:0',
            'lat' => 'required|numeric|min:0',
            'direction' => 'required|numeric|between:0,1',
            'token' => 'required'
        ];
    }
}
