<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfesorRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'predmet_id' => 'required',
            'oblikNastave_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'predmet_id.required' => 'Унесите предмет.',
            'oblikNastave_id.required' => 'Унесите облик наставе.',
        ];
    }
}
