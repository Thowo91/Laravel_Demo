<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerRequest extends FormRequest
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
        if (request()->isMethod('POST')) {
            $return['name'] = 'required|unique:manufacturers';
        }
        elseif (request()->isMethod('PUT')) {
            $return['name'] = 'bail|required|unique:manufacturers,name,' . $this->manufacturer->id;
        }

        return $return;
    }
}
