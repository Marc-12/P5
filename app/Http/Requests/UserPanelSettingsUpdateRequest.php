<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;


class UserPanelSettingsUpdateRequest extends Request
{
    public function authorize()
	{
		return true;
	}
	public function rules()
	{
		return [
			'age' => 'required|min:1|max:110|numeric',
			'number' => 'required|min:10|numeric',
		];
	}
	public function messages()
	{
		return [
			'age.required' => 'Veuillez indiquer votre âge.',
			'age.max' => 'Veuillez indiquer un âge inférieur à 110 ans.',
			'age.min' => 'Veuillez indiquer votre âge.',
			'age.numeric' => 'Veuillez indiquer votre âge avec des chiffres.',		
			'number.numeric' => 'Veuillez écrire un nombre avec des chiffres.',
			'number.min' => 'Veuillez écrire un nombre minimum de 10.',
			'number.required' => 'Veuillez écrire un nombre minimum de 10.',
		];
	}
}