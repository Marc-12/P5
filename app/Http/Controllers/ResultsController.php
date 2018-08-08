<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ResultsController extends Controller
{
    public function resultsPage()
	{	
		return view('forms/maclasseResultats');	
	}
}
