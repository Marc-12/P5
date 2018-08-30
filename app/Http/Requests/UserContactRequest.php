<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserContactRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'firstname' => 'required|min:3|max:20|alpha',
			'message' => 'required|max:300',
        ];
    }
	public function messages()
	{
		return [
			'firstname.required' => 'Veuillez indiquer votre prénom.',
			'firstname.min' => 'Veuillez indiquer un prénom de plus de 3 lettres.',
			'firstname.max' => 'Veuillez indiquer un prénom de moins de 20 lettres.',
			'firstname.alpha' => 'Veuillez écrire votre prénom en toutes lettres (sans chiffre-s).',
			'message.required' => 'Veuillez écrire un message.',
			'message.max' => 'Votre message doit comporter moins de 300 caractères.',
		];
	}
}
