<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
// ajouté dans le controller:
//
use Mail;
//
//
use App\Contact;
use App\Users;

class Admin extends Controller
{
    public function adminPage ()
	{
		// affichage eMAIL
		$countAllMail = Contact::count('id');
		$countNewMail = Contact::where('state_user_contacts', '=', 0)->count('id');
		return view('admin/admin', ['allMail' => $countAllMail, 'newMail' => $countNewMail]);
	}
	public function emailPage ()
	{
		$users = Contact::orderBy('created_at', 'DSC')->get();
        return view('admin/email/email', ['users' => $users]);
	}
	public function ajaxDeleteMail (Request $request, $valueID)
	{
		// $data = \App\Contact::findOrFail($valueID);
		$data = Contact::findOrFail($valueID)->delete();
		// $data->delete();
	}
	public function AnswerMailPage ($valueUserID, $valueID)
	{
		return view('admin/email/answerMail', ['userId' => $valueUserID, 'mailid' => $valueID]);
	}
	public function AnswerMailContent (Request $request, $valueUserID, $valueID)
	{
		//content in variable 
		$content = $request->input('text');
		
		//Récupérer email de l'user
		$userMail = Users::findOrFail($valueUserID)->email;
		// echo $userMail;
		
			//rien dans variable data
			$data = ['content' => $content];
			// envoyer EMAIL
			Mail::send('admin.email.template-email.answerMail', $data, function ($message) use ($userMail) 
			{
				$message->from('P5@example.com', 'P5 Application');
				$message->to($userMail)->subject('Projet 5');
			});
		// UPDATE database MAIL answered	
		Contact::where('id', $valueID)->update(['state_user_contacts' => 1]);
		//Redirection
		$request->session()->flash('MailFlash', 'Email envoyé avec succès.');			
		return redirect()->route('emailPage');
	}
}
