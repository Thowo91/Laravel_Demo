<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifRequest extends FormRequest
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
        $return = [
            'monthly_price' => 'required',
            'connection_price' => 'required',
            'provider_id' => 'required',
            'status' => 'required',
        ];

        if (request()->isMethod('POST')) {
            $return['name'] = 'required|unique:tarifs';
        }
        elseif (request()->isMethod('PUT')) {
            $return['name'] = 'bail|required|unique:tarifs,name,' . $this->tarif->id;
        }

        return $return;
    }
}
