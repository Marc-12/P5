<?php

// 1er page 
Route::get('/', 'WelcomeController@index');
Route::get('/', ['as' => 'index','uses'=>'WelcomeController@index']);

Route::resource('user', 'UserController');
Route::auth();
Route::get('/home', 'HomeController@index');
// FAIRE UN DON
Route::get('faire-un-don', ['as' => 'don','uses'=>'WelcomeController@don']);


Route::get('/registerSettings', 'UserController@newUserRegistered')->middleware('auth');
	// Route::get('/informations', ['as' => 'registerSettings','uses'=>'UserController@newUserRegistered']);
//formulaire register
Route::post('formUserSettings', 'UserController@formUserSettings')->middleware('auth');




// update formulaire Mes Informations
	Route::get('/mes-informations', ['as' => 'updateUserSettings','uses'=>'UserController@updateMesInformationsPage'])->middleware('auth');
Route::post('updateUserSettingsForm', 'UserController@updateMesInformations')->middleware('auth');



// page -> MA CLASSE  
Route::get('/ma-classe', ['as' => 'maclasse','uses'=>'UserController@maclasse'])->middleware('auth');


// page + formulaire -> CONTACT  
Route::get('/contact', ['as' => 'contact','uses'=>'UserController@contactFormPage'])->middleware('auth');
Route::post('formContact', 'UserController@contactForm')->middleware('auth');

// PAGE -> MES RESULTATS  
Route::get('/mes-resultats', ['as' => 'mesresultats','uses'=>'ResultsController@resultsPage'])->middleware('auth');

// PAGE -> MACLASSE - FORM de choix d'opération 
	// Route::get('/formOperationChoice', 'WorkChoice@operationPage')->middleware('auth');
// Route::get('formOperation/{operation}', ['as' => 'formOperation','uses'=>'WorkChoice@operationPage'])->middleware('auth');
// Route::get('formOperation', ['as' => 'formOperation','uses'=>'WorkChoice@operationPage']);


// ROUTE POUR LE CHOIX DES OPERATIONS
//
//
// Route::get('calcul-pose/{operation}', ['as' => 'calcul','uses'=>'WorkChoice@operationPage'])->middleware('auth');
   // Route::get('calcul-pose/{operation}', ['as' => 'calcul','uses' => 'WorkChoice@operationPage'])->middleware('auth');
   Route::get('calcul-pose', ['as' => 'calcul','uses' => 'WorkChoice@operationPage'])->middleware('auth');


	
// PAGE -> RESULTAT d'opération - FORM de l'opération renvoyé pour vérification
Route::post('addtionResultat', 'WorkChoice@additionCheckResult')->middleware('auth');
Route::post('soustractionResultat', 'WorkChoice@soustractionCheckResult')->middleware('auth');
Route::post('multiplicationResultat', 'WorkChoice@multiplicationCheckResult')->middleware('auth');
Route::post('divisionResteNulResultat', 'WorkChoice@divisionResteNulCheckResult')->middleware('auth');
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
//route ADMIN page
//Route::get('/admin', 'Admin@adminPage')->middleware('admin');
Route::get('admin', ['as' => 'admin','uses'=>'Admin@adminPage'])->middleware('admin');
//ADMIN mail page
Route::get('admin-mails', ['as' => 'emailPage','uses'=>'Admin@emailPage'])->middleware('admin');
	//1-/delete mail
	Route::post('ajaxDeleteMail/{valueID}', 'Admin@ajaxDeleteMail')->middleware('admin');
	//2-/answer mail
	Route::get('admin-mail-repondre/{valueUserID}/{valueID}', ['as' => 'answerMailPage','uses'=>'Admin@AnswerMailPage'])->middleware('admin');
	Route::post('adminMailAnswer/{valueUserID}/{valueID}', ['as' => 'answerMailContent','uses'=>'Admin@AnswerMailContent'])->middleware('admin');




// STRIPE checkout
Route::post('/userDonationCheckout', 'Stripe@donationCheckout');








//logOut
Route::get('/logout', 'UserController@logout');
