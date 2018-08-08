<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Admin extends Controller
{
    public function adminPage ()
	{
		// return redirect()->route('admin');
		return view('admin/admin');
	}
	public function contactPage ()
	{
		// return redirect()->route('admin');
		return view('admin/contact');
	}
}
