<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Repositories\UserRepository;

class OperationFormRequest  extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
			'userResult' => 'required|numeric',						
        ];
    }
	public function messages()
	{
		return [
			'userResult.required' => 'Alors quelle est la réponse ?',
			'userResult.numeric' => 'Désolé ! Utilise des chiffres pour répondre !',	
		];
	}
}