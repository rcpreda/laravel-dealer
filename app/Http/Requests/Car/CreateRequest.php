<?php

namespace App\Http\Requests\Car;

use App\Http\Requests\Request;

class CreateRequest extends Request
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
            'type_condition_id' => 'required|integer|between:1,6',
            'manufacturer_id' => 'required|integer',
            'model_id' => 'required|integer',
        ];
    }
}
