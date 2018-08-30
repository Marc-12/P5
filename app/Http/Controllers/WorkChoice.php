<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Exercices;
use Auth;
//charger le modele pour update BDD
use App\UserInfos2;
//pour utiliser JSON encode
use Illuminate\Http\JsonResponse;
//veirf de formulaire
use App\Http\Requests\OperationFormRequest;
use App\Http\Requests\DivisionFormRequest;
//chargement librairie pour avoir la date
use DateTime;
//get route's name 
use Illuminate\Support\Facades\Route;


class WorkChoice extends Controller
{
   public $_resultOperation = "";											
   public $_topNumber = "";											
   public $_bottomNumber = "";
   //
   public $_coeffDifficulty = "";											
   public $_userMaxNumber = "";											
   public $_nb1 = "";											
   public $_nb2 = "";											
   public $_nb3 = "";											
   public $_nb4 = "";											

   public function getOperationNumbers ()
   {
	  $userDifficulty = Auth::user()->userInfos->difficulty_user_infos; 
	  $userMaxNumber = Auth::user()->userInfos->maxNumber_user_infos; 
	  $userClass = Auth::user()->userInfos->class_user_infos;
			
	  //difficulty COEFFICIENT
	   switch ($userDifficulty) 
	   {
		case 0:
			$this->_coeffDifficulty = 3/10; 
			break;
		case 1:
			$this->_coeffDifficulty = 6/10; 
			break;
		case 2:
			$this->_coeffDifficulty = 1; 
			break;
		}
		$coeffDifficulty = $this->_coeffDifficulty;
		//check maxNumber limit 
		if(empty($userMaxNumber))
		{
			switch ($userClass) 
			{
			 case 0:
				 $userMaxNumber = 100;
				 break;
			 case 1:
				 $userMaxNumber = 1000; 
				 break;
			 case 2:
				 $userMaxNumber = 10000;
				 break;
			 case 3:
				 $userMaxNumber = 100000;
				 break;
			 case 4:
				$userMaxNumber = 1000000;
				break;
			 case 5:
				$userMaxNumber = 1000000;
				break;
			 }
		 }
		//get random numbers
		$nb1 = rand(1, $userMaxNumber)*$coeffDifficulty;
		$nb1 = intval($nb1);
		$this->_nb1 = $nb1;
		// echo 'nb1-->'.$this->_nb1.'<br>';
		$nb2 = rand(1, $userMaxNumber)*$coeffDifficulty;
		$nb2 = intval($nb2);
		$this->_nb2 = $nb2;
		// echo 'nb2-->'.$this->_nb2.'<br>';
		$nb3 = mt_rand(2, 9);
		$nb3 = intval($nb3);
		$this->_nb3 = $nb3;
		// echo 'nb3-->'.$this->_nb3.'<br>';
		// get division's numbers ->; 
		$nb4 = mt_rand(2, 35);
		$nb4 = intval($nb4);
		$this->_nb4 = $nb4;
		//continuer à chercher is reste != 0
		if ($nb4%$nb3 != 0) 
		{
			$this->getOperationNumbers (); 
		}
   }
   // public function operationPage(Request $request, $operation)
   public function operationPage(Request $request)
   {
	     // dd($request->all());
	     // dd($operation);

	     // dd(old('hiddenTopNumber'));
		 // dd(session()->all());
		 // PART #1 du script pour récupérer les 2 nombres de l'opération 
		 // à réafficher en cas de VALIDATION REQUEST
		 $top =  $request->old('hiddenTopNumber');
		 $bottom = $request->old('hiddenBottomNumber');
		 
		 
		 
	  if($request->input('operation') == "0")
	  // if($operation == "addition")
	  {//ADDITION
			// PART #2 pour renvoyer les bonnes valeurs en cas de VALIDATION FORM REQUEST
			if(empty($top) && empty($bottom))
			{
				$this->getOperationNumbers (); 
				$nb1 = $this->_nb1;
				$nb2 = $this->_nb2;
			}
			else
			{
				$nb1 = $top;
				$nb2 = $bottom;			
			}
			if ($nb1 >= $nb2)
			{				
				$topNumber = $nb1;
				$bottomNumber = $nb2;
			}
			else
			{
				$topNumber = $nb2;
				$bottomNumber = $nb1;
			}	
		   return view('works/maths-calcul-pose/addition', ['topNumber' => $topNumber, 'bottomNumber' => $bottomNumber]);
	   }
	   else if($request->input('operation') == "1")
	   {//SOUSTRACTION
			// $this->getOperationNumbers (); 
			// $nb1 = $this->_nb1;
		    // $nb2 = $this->_nb2;
			if(empty($top) && empty($bottom))
			{
				$this->getOperationNumbers (); 
				$nb1 = $this->_nb1;
				$nb2 = $this->_nb2;
			}
			else
			{
				$nb1 = $top;
				$nb2 = $bottom;			
			}
			if ($nb1 >= $nb2)
			{				
				$topNumber = $nb1;
				$bottomNumber = $nb2;
			}
			else
			{
				$topNumber = $nb2;
				$bottomNumber = $nb1;
			}	
		   return view('works/maths-calcul-pose/soustraction', ['topNumber' => $topNumber, 'bottomNumber' => $bottomNumber]);
	   }
	   else if($request->input('operation') == "2")
	   {//MULTIPLICATION
			if(empty($top) && empty($bottom))
			{
				$this->getOperationNumbers (); 
				$nb1 = $this->_nb1;
				$nb3 = $this->_nb3;
			}
			else
			{
				$nb1 = $top;
				$nb3 = $bottom;			
			}
			if ($nb3 >= $nb1)
			{				
				$topNumber = $nb3;
				$bottomNumber = $nb1;
			}
			else
			{
				$topNumber = $nb1;
				$bottomNumber = $nb3;
			}	
		   return view('works/maths-calcul-pose/multiplication', ['topNumber' => $topNumber, 'bottomNumber' => $bottomNumber]);
	   }
	   else if($request->input('operation') == "3")
	   {//DIVISION
			if(empty($top) && empty($bottom))
			{
				$this->getOperationNumbers (); 
				$nb3 = $this->_nb3;
				$nb4 = $this->_nb4;
			}
			else
			{
				$nb3 = $top;
				$nb4 = $bottom;			
			}
			if ($nb3 >= $nb4)
			{				
				$topNumber = $nb3;
				$bottomNumber = $nb4;
			}
			else
			{
				$topNumber = $nb4;
				$bottomNumber = $nb3;
			}	
		   return view('works/maths-calcul-pose/divisionSansReste', ['topNumber' => $topNumber, 'bottomNumber' => $bottomNumber]);
	   }	   
   }
   public function additionCheckResult (OperationFormRequest $request)
   {	
		$hiddenTopNumber = $request->input('hiddenTopNumber');
		$hiddenBottomNumber = $request->input('hiddenBottomNumber');				
		$userResult = $request->input('userResult');
		$operationResult = $hiddenTopNumber + $hiddenBottomNumber; 
		$operationType = 'addition';
		$operationSign = '+';

		if ($operationResult == $request->input('userResult'))
		{
			$operationStatus = 'success';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResult);						
			$request->session()->flash('success', 'Bravo ! Bonne réponse!');
		}
		else
		{
			$operationStatus = 'echec';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResult);						
			$request->session()->flash('error', 'Le résultat de l\'addition n\'est pas correct.<br>Pas grave !<br>Regarde la vidéo de la leçon et recommence un exercice.');
		}
		return redirect()->route('maclasse');
   }
   public function soustractionCheckResult (OperationFormRequest $request)
   {
		$hiddenTopNumber = $request->input('hiddenTopNumber');
		$hiddenBottomNumber = $request->input('hiddenBottomNumber');		
		$userResult = $request->input('userResult');
		$operationResult = $hiddenTopNumber - $hiddenBottomNumber; 
		$operationType = 'soustraction';
		$operationSign = '-';
		
		if ($operationResult == $request->input('userResult'))
		{
			$operationStatus = 'success';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber , $hiddenBottomNumber , $operationResult ,$operationStatus , $userResult);						
			$request->session()->flash('success', 'Bravo ! Bonne réponse!');
		}
		else
		{
			$operationStatus = 'echec';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResult);						
			$request->session()->flash('error', 'Le résultat de la soustraction n\'est pas correct.<br>Pas grave !<br>Regarde la vidéo de la leçon et recommence un exercice.');
		}
		return redirect()->route('maclasse');
   } 
   public function multiplicationCheckResult (OperationFormRequest $request)
   {
		$hiddenTopNumber = $request->input('hiddenTopNumber');
		$hiddenBottomNumber = $request->input('hiddenBottomNumber');		
		$userResult = $request->input('userResult');
		$operationResult = $hiddenTopNumber * $hiddenBottomNumber; 
		$operationType = 'multiplication';
		$operationSign = 'x';
		
		if ($operationResult == $request->input('userResult'))
		{
			$operationStatus = 'success';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResult);						
			$request->session()->flash('success', 'Bravo ! Bonne réponse!');
		}
		else
		{
			$operationStatus = 'echec';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResult);						
			$request->session()->flash('error', 'Le résultat de la multiplication n\'est pas correct.<br>Pas grave !<br>Regarde la vidéo de la leçon et recommence un exercice.');
		}
		return redirect()->route('maclasse');
   }
   public function divisionResteNulCheckResult (DivisionFormRequest $request)
   // public function divisionResteNulCheckResult (Request $request)
   {
		$hiddenTopNumber = $request->input('hiddenTopNumber');
		$hiddenBottomNumber = $request->input('hiddenBottomNumber');		
		$userResultReste = $request->input('reste');
		$userResultQuotient = $request->input('quotient');
		$operationResult = $hiddenTopNumber / $hiddenBottomNumber; 
		$operationType = 'division';
		$operationSign = '/';
		
		echo 'top diviseur -> '.$hiddenTopNumber;
		echo '<br>';
		echo 'diviseur bottom -> '.$hiddenBottomNumber;
		echo '<br>';
		echo 'reste division -> '.$userResultReste;
		echo '<br>';
		echo 'quotient -> '.$userResultQuotient;
		echo '<br>';		
		echo 'resutlat de la division par le PC -> '.$operationResult;
		
		
		
		if ($operationResult == $request->input('quotient'))
		{
			$operationStatus = 'success';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResultQuotient);						
			$request->session()->flash('success', 'Bravo ! Bonne réponse!');
		}
		else
		{
			$operationStatus = 'echec';
			$this->pushArrayUserResults($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResultQuotient);						
			$request->session()->flash('error', 'Le résultat de la division n\'est pas correct.<br>Pas grave !<br>Regarde la vidéo de la leçon et recommence un exercice.');
		}
		return redirect()->route('maclasse');
   }
   public function pushArrayUserResults ($operationType, $operationSign, $hiddenTopNumber,$hiddenBottomNumber,$operationResult,$operationStatus,$userResult)
   {
			$dt = new DateTime();
			$date = $dt->format('Y-m-dTH:i:s');			
			$userResultsJson = Auth::user()->userInfos->work_user_infos;
			if(!empty($userResultsJson))
			{
				$userResultatArray = json_decode($userResultsJson, true);			
			}
			else
			{
				$userResultatArray = array();
			}
			$arrayUserWork = array ('operationName' => $operationType,'operationStatus' => $operationStatus,'operationNumbers' => $hiddenTopNumber.$operationSign.$hiddenBottomNumber , 'operationResult' => $operationResult,'userResult'=>$userResult,'date' => $date);
			array_push($userResultatArray,$arrayUserWork );
			$datasJson = new JsonResponse ($userResultatArray);		
			$datasJson = $datasJson->getContent();		
			$this->pushSQLResults($datasJson);
   }
   public function pushSQLResults ($datasJson)
   {
			UserInfos2::where('id_user_infos', Auth::user()->userInfos->id_user_infos)->update(['work_user_infos' => $datasJson]);					
   }
}