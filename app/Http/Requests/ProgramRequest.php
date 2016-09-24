<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProgramRequest extends Request
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
            'espb' => 'required',
            'program_id' => 'required',
            'predmet_id' => 'required',
            'godinaStudija_id' => 'required',
            'semestar' => 'required',
            'tipPredmeta_id' => 'required',
            'predavanja' => 'required',
            'vezbe' => 'required',
            'skolskaGodina_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'espb.required' => 'Унесите број ЕСПБ бодова.',
            'studijskiProgram_id.required' => 'Унесите студијски програм.',
            'predmet_id.required' => 'Унесите предмет.',
            'godinaStudija_id.required' => 'Унесите годину студија.',
            'semestar.required' => 'Унесите семестар.',
            'tipPredmeta_id.required' => 'Унесите тип предмета.',
            'predavanja.required' => 'Унесите број часова предавања.',
            'vezbe.required' => 'Унесите број часова вежби.',
            'skolskaGodina_id.required' => 'Унесите школску годину.',            
        ];
    }
}
