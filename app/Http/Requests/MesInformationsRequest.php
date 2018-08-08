<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Repositories\UserRepository;



class MesInformationsRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {		
		$id = $this->input('hiddenId');
        return [
			'name' => 'required|min:3|max:255|unique:users,name,'.$id,					
            'email' => 'required|email|max:255|unique:users,email,'.$id,		
            'age_user_infos' => 'required|min:1|max:110|numeric',
            'maxNumber_user_infos' => 'required|min:10|numeric',
        ];
    }
	public function messages()
	{
		return [			
			'name.required' => 'Veuillez indiquer indiquer votre prénom',
			'name.unique' => 'Désolé ! Ce prénom existe déjà.',
			'name.max' => 'Veuillez écrire un prénomm de moins de 255 caractères.',
			'name.min' => 'Veuillez écrire un email de plus de 3 caractères.',		
			'email.required' => 'Veuillez indiquer un email.',
			'email.email' => 'Veuillez indiquer un email valide du type: abcd@efgh.fr .',
			'email.max' => 'Veuillez écrire un email de moins de 255 caractères.',
			'email.unique' => 'Désolé ! Cet email existe déjà.',
			'age_user_infos.required' => 'Veuillez indiquer votre âge.',
			'age_user_infos.max' => 'Veuillez indiquer un âge inférieur à 110 ans.',
			'age_user_infos.min' => 'Veuillez indiquer votre âge.',
			'age_user_infos.numeric' => 'Veuillez indiquer votre âge avec des chiffres.',
			'maxNumber_user_infos.numeric' => 'Veuillez écrire un nombre avec des chiffres.',
			'maxNumber_user_infos.min' => 'Veuillez écrire un nombre.',
			'maxNumber_user_infos.required' => 'Veuillez écrire un nombre minimum de 10.',
		];
	}
}
