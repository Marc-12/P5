@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsMenu')
			
			
			<div id="maClasseContent">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="text-center">Modifier mes informations</h2><p class="text-justify">Veuillez modifier les informations qui ne vous semblent pas pertinentes.
						</br>En cas d'erreur de votre part, vous pourrez toujours modifier ces informations plus tard.</p></div>
						<div class="panel-body">
							{!! Form::open(['url' => 'updateUserSettingsForm' , 'method'=>'post']) !!}
									{{ Form::hidden('hiddenId', Auth::user()->id) }}
									{!! Form::label('name', 'Mon prénom  ') !!}<br>
									{!! Form::text('name', Auth::user()->name) !!}
									<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">{!! $errors->first('name', '<small class="help-block">:message</small>') !!}</div><br>	
									{!! Form::label('email', 'Mon email  ') !!}<br>
									{!! Form::text('email', Auth::user()->email) !!}
									<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">{!! $errors->first('email', '<small class="help-block">:message</small>') !!}</div><br>	
									{!! Form::label('age_user_infos', 'Mon âge  ') !!}<br>
									{!! Form::text('age_user_infos', Auth::user()->userInfos->age_user_infos) !!}
									<div class="form-group {!! $errors->has('age_user_infos') ? 'has-error' : '' !!}">{!! $errors->first('age_user_infos', '<small class="help-block">:message</small>') !!}</div><br>														
									{!! Form::label('gender', 'Fille / Garçon - ') !!}<div class="help" id="gender"><i class="far fa-question-circle"></i><div class="helpMessage Messagegender">Information qui permet à l'application d'avoir un contenu écrit cohérent.</div></div><br>							
									{{  Form::select('gender', [0=>'fille', 1=>'garçon'], Auth::user()->userInfos->gender_user_infos) }}<br>														
									{!! Form::label('level', 'Mon niveau de classe - ') !!}<div class="help" id="level"><i class="far fa-question-circle"></i><div class="helpMessage Messagelevel">Information qui permet d'adapter le travail proposé au niveau de l'élève.</div></div><br>
									{{  Form::select('level', [0=>'CP', 1=>'CE1',2=>'CE2',3=>'CM1',4=>'CM2',5=>'6e'], Auth::user()->userInfos->class_user_infos) }}<br>							
									{!! Form::label('maxNumber_user_infos', 'Nombre le plus élevé que je connais - ') !!}<div class="help" id="number"><i class="far fa-question-circle"></i><div class="helpMessage Messagenumber">Information importante pour la numération permettant d'adapter le travail proposé au niveau de l'élève. (Il ne serait pas pertinent de proposer un nombre jamais étudié par l'élève !)<br><br>Exemples: 10 (début CP) ou 100 (certains fin de CP / CE1) ou 1000 ou 100000 etc</div></div><br>
									{!! Form::text('maxNumber_user_infos', Auth::user()->userInfos->maxNumber_user_infos) !!}
									<div class="form-group {!! $errors->has('maxNumber_user_infos') ? 'has-error' : '' !!}">{!! $errors->first('maxNumber_user_infos', '<small class="help-block">:message</small>') !!}</div><br>
									{!! Form::label('difficulty', 'Niveau de difficulté - ') !!}<div class="help" id="difficulty"><i class="far fa-question-circle"></i><div class="helpMessage Messagedifficulty">Information qui permet d'adapter le travail proposé au niveau de l'élève.</div></div><br>							
									{{  Form::select('difficulty', [0=>'Facile',1=>'Normal',2=>'Difficile'], Auth::user()->userInfos->difficulty_user_infos) }}<br><br><br>	
									{!! Form::submit('Envoyer !') !!}
							{!! Form::close() !!}
						
						</div>
					</div>
				</div>
			</div>					
		</div>
    </div>
@endsection