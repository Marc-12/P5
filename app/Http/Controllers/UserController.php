<?php

namespace App\Http\Controllers;

//chargement des models
use App\UserInfos;
use App\UserInfos2;
// use App\Users;

use App\Contact;

// chargement des vérificateurs de formulaires: "Request"
use App\Http\Requests\UserPanelSettingsUpdateRequest;
use App\Http\Requests\MesInformationsRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserContactRequest;
//
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
//récupérer USer datas 
use Auth;
//pour utiliser JSON encode
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{
    protected $userRepository;
    protected $nbrPerPage = 4;


    public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}
	//LOGOUT
	public function logout()
	{
		auth()->logout();
		return redirect ('/');
	}
	// page + formulaire ---> SECOND REGISTRATION PAGE
	public function newUserRegistered()
	{
		return view('registerSettings');
	}
	public function formUserSettings(UserPanelSettingsUpdateRequest $request)
	{
		// Instantiation du nouveau model
		$data = new UserInfos2;
		// number max
		$data->maxNumber_user_infos = $request->input('number');
		// gender 
		$data->gender_user_infos = $request->input('gender');
		// age eleve
		$data->age_user_infos = $request->input('age');
		// classe eleve
		$data->class_user_infos = $request->input('level');
		//difficulty
		$data->difficulty_user_infos = $request->input('difficulty');
		// id user
		$data->id_user_infos = $request->user()->id;		
		
		// $jsonDatas = [{"operationName":"","operationStatus":"","operationNumbers":"","operationResult":,"userResult":"","date":""}];		
		// $data->work_user_infos = $jsonDatas; 
		
		$data->save();
		//Redirection
		$request->session()->flash('form', 'Votre compte a été créé avec succès.');			
		return redirect()->route('maclasse');
	}
	// page ---> MACLASSE
	public function maclasse(Request $request)
	{
		return view('maclasse');
		// return redirect()->route('maclasse');
	}	
	// page + formulaire ---> UPDATE MES INFORMATIONS  
	public function updateMesInformationsPage(request $request)
	{
		return view('forms/updateUserSettings');
	}
	public function updateMesInformations(MesInformationsRequest $request)
	{
		UserInfos::where('id', $request->user()->id)
		->update(['name' => $request->input('name'), 'email' => $request->input('email')]);		
		UserInfos2::where('id_user_infos', $request->user()->id)
		->update(['age_user_infos' => $request->input('age_user_infos'), 'gender_user_infos' => $request->input('gender'),'difficulty_user_infos' => $request->input('difficulty'), 'class_user_infos' => $request->input('level'), 'maxNumber_user_infos' => $request->input('maxNumber_user_infos'),]);		
		$request->session()->flash('form', 'Modification(s) prise(s) en compte.');			
		return redirect()->route('maclasse');
	}
	// page + formulaire ---> CONTACT 
	public function contactFormPage(Request $request) 
	{
		return view('forms/userContact');
		// return redirect('forms/userContact');
	}
	public function contactForm(UserContactRequest $request)
	{		
		Contact::insert(['id_User_Contacts' => $request->user()->id, 'objet_User_Contacts' => $request->input('object'), 'prenom_User_Contacts' => $request->input('firstname'),
		'nom_User_Contacts' => $request->input('lastname'), 'message_User_Contacts' => $request->input('message')]);
		$request->session()->flash('form', 'Votre message est pris en compte.<br>Notre équipe vous répondra dans les plus brefs délais.');			
		return redirect()->route('maclasse');
	}
	//
	//
	// OTHER LARAVEL
	public function index()
	{
		$users = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = $users->render();
		return view('index', compact('users', 'links'));
	}
	public function create()
	{
		return view('create');
	}
	public function store(UserCreateRequest $request)
	{
		$this->setAdmin($request);
		$user = $this->userRepository->store($request->all());
		return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
	}
	public function show($id)
	{
		$user = $this->userRepository->getById($id);
		return view('show',  compact('user'));
	}
	public function edit($id)
	{
		$user = $this->userRepository->getById($id);
		return view('edit',  compact('user'));
	}
	public function update(UserUpdateRequest $request, $id)
	{
		$this->setAdmin($request);
		$this->userRepository->update($id, $request->all());
		return redirect('user')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
	}
	public function destroy($id)
	{
		$this->userRepository->destroy($id);
		return redirect()->back();
	}
	private function setAdmin($request)
	{
		if(!$request->has('admin'))
		{
			$request->merge(['admin' => 0]);
		}		
	}
}