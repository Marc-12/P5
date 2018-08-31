<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Stripe extends Controller
{
    public function donationCheckout (Request $request)
	{

		try 
		{
				// Use Stripe's library to make requests...
				// Set your secret key: remember to change this to your live secret key in production
				// See your keys here: https://dashboard.stripe.com/account/apikeys
				\Stripe\Stripe::setApiKey("sk_test_6BOmmWSztDshbQ4lHtjqdR6U");

				// Token is created using Checkout or Elements!
				// Get the payment token ID submitted by the form:
				$token = $_POST['stripeToken'];
				
				$charge = \Stripe\Charge::create([
					'amount' => 50,
					'currency' => 'eur',
					'description' => 'Example charge',
					'source' => $token,
				]);
				// var_dump($charge);
				// die;
				
				//redirect
				$request->session()->flash('welcomePageFlash', 'Merci de votre soutien au projet, elle est grandement appréciée et sera utilisée avec diligence !');
				return redirect()->route('index');
		} 
		catch(\Stripe\Error\Card $e) 
		{
		  // Since it's a decline, \Stripe\Error\Card will be caught
		  $body = $e->getJsonBody();
		  $err  = $body['error'];

		  print('Status is:' . $e->getHttpStatus() . "\n");
		  print('Type is:' . $err['type'] . "\n");
		  print('Code is:' . $err['code'] . "\n");
		  // param is '' in this case
		  print('Param is:' . $err['param'] . "\n");
		  print('Message is:' . $err['message'] . "\n");
		} 
		catch (\Stripe\Error\RateLimit $e) 
		{
			// echo 'error';
		    // Too many requests made to the API too quickly
		} 
		catch (\Stripe\Error\InvalidRequest $e) 
		{
			// echo 'error';
		    // Invalid parameters were supplied to Stripe's API
		} 
		catch (\Stripe\Error\Authentication $e) 
		{
		   // echo 'error';
		   // Authentication with Stripe's API failed
		   // (maybe you changed API keys recently)
		} 
		catch (\Stripe\Error\ApiConnection $e) 
		{
		   // echo 'error';
		   // Network communication with Stripe failed
		} 
		catch (\Stripe\Error\Base $e) 
		{
			// echo 'error';
		    // Display a very generic error to the user, and maybe send
		    // yourself an email
		} 
		catch (Exception $e) 
		{
			// echo 'error';
		    // Something else happened, completely unrelated to Stripe
		}
	
	}
}
