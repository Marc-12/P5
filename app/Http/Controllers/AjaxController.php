<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//load JSON package 
use Illuminate\Http\JsonResponse;
//
use Auth;
use App\Ajax;
use App\User;
use App\Users;

class AjaxController extends Controller
{
	public function ajax_call (Request $request)
	{		
		// /!\ ATTENTION !!
		//plus utile car je passe par le controller
		//
		$datas = Auth::user()->userInfos->displaySettings_user_infos; 
		return $datas;
		// return new JsonResponse ($datas);

		/*
		$user = Auth::User()->id;
		$data1 = Users::where('id', $user)->first(['id', 'email', 'name']);
		$data2 = Ajax::where('id_user_infos', $user)->first();
		$data = array('array1' => $data1,'array2' => $data2);
		return new JsonResponse ($data);
		*/
	}
	public function ajaxSendUserSettings (Request $request)
	{				
		$datas = $request->data;
		$user = Auth::User()->id;
		Ajax::where('id_user_infos', $user)->update(['displaySettings_user_infos' => $datas]);
		return redirect('maclasse');
	}
	public function ajaxUserResults (Request $request)
	{				
		// $data = Auth::user()->userInfos->work_user_infos;
		$data = Auth::user()->userInfos->work_user_infos; 
		echo $data;
	}
}