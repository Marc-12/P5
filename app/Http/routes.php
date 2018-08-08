<?php

// 1er page 
Route::get('/', 'WelcomeController@index');
Route::resource('user', 'UserController');
Route::auth();
Route::get('/home', 'HomeController@index');
// FAIRE UN DON
Route::get('don', 'WelcomeController@don');
// Route::get('faire-don', ['as' => 'don','uses'=>'WelcomeController@don']);


Route::get('/registerSettings', 'UserController@newUserRegistered')->middleware('auth');
	// Route::get('/informations', ['as' => 'registerSettings','uses'=>'UserController@newUserRegistered']);
//formulaire register
Route::post('formUserSettings', 'UserController@formUserSettings');




// update formulaire Mes Informations
// Route::get('/updateUserSettings', 'UserController@updateMesInformationsPage');
	Route::get('/updateUserSettings', ['as' => 'updateUserSettings','uses'=>'UserController@updateMesInformationsPage'])->middleware('auth');
Route::post('updateUserSettingsForm', 'UserController@updateMesInformations');



// page -> MA CLASSE  
Route::get('/ma-classe', ['as' => 'maclasse','uses'=>'UserController@maclasse'])->middleware('auth');


// page + formulaire -> CONTACT  
Route::get('contact', ['as' => 'contact','uses'=>'UserController@contactFormPage'])->middleware('auth');
Route::post('formContact', 'UserController@contactForm');

	// PAGE -> MES RESULTATS  
	Route::get('/mesresultats', 'ResultsController@resultsPage')->middleware('auth');
	// Route::get('/mes-resultats', ['as' => 'mesresultats','uses'=>'ResultsController@resultsPage']);

// PAGE -> MACLASSE - FORM de choix d'opération 
	Route::get('/formOperationChoice', 'WorkChoice@operationPage')->middleware('auth');
	Route::get('/formOperation/{operation}', 'WorkChoice@operationPage');

	
// PAGE -> RESULTAT d'opération - FORM de l'opération renvoyé pour vérification
Route::post('addtionResultat', 'WorkChoice@additionCheckResult');
Route::post('soustractionResultat', 'WorkChoice@soustractionCheckResult');
Route::post('multiplicationResultat', 'WorkChoice@multiplicationCheckResult');
Route::post('divisionResteNulResultat', 'WorkChoice@divisionResteNulCheckResult');
//
//
//
//
//
// <--- AJAX --->
// USER GET RESULTS
Route::get('/ajaxGetUserResults', 'AjaxController@ajaxUserResults');
//test AJAX
Route::post('/ajax', 'AjaxController@ajax_call');
Route::post('/ajaxSendUserSettings', 'AjaxController@ajaxSendUserSettings');



// ADMIN 
//
//
//route ADMIN page:
// Route::get('/admin', 'Admin@adminPage')->middleware('admin');
Route::get('admin', ['as' => 'admin','uses'=>'Admin@adminPage'])->middleware('admin');
// ADMIN lire mes mails
   Route::get('adminContact', ['as' => 'adminContact','uses'=>'Admin@contactPage'])->middleware('admin');












//logOut
Route::get('/logout', 'UserController@logout');
