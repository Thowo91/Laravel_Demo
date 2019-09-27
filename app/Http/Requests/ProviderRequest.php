<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
            $return['name'] = 'required|unique:providers';
        }
        elseif (request()->isMethod('PUT')) {
            $return['name'] = 'bail|required|unique:providers,name,' . $this->provider->id;
        }

        return $return;
    }
}
