<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DivisionFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'quotient' => 'required|numeric',						
			'reste' => 'required|numeric|min:0|max:0',						
        ];
    }
	public function messages()
	{
		return [
			'quotient.required' => 'Alors quel est le quotient de la division ?',
			'quotient.numeric' => 'Le quotient doit être un chiffre !',	
			'reste.required' => 'Alors quel est le reste de la division ?',
			'reste.numeric' => 'Le reste de la division doit être un chiffre !',	
			'reste.min' => 'Le reste doit être égal à zéro car c\'est une division sans reste (reste = 0).',	
			'reste.max' => 'Le reste doit être égal à zéro car c\'est une division sans reste (reste = 0).',	
		];
	}
}
