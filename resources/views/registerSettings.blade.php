@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2 class="text-center">Mes informations</h2><p class="text-justify">Afin de mieux vous connaître, veuillez remplir le formulaire ci-dessous!
				</br>En cas d'erreur de votre part, vous pourrez modifier ces informations une fois connecté à l'application.</p></div>
                <div class="panel-body">
					{!! Form::open(['url' => 'formUserSettings']) !!}
							{!! Form::label('age', 'Mon âge  ') !!}<br>
							{!! Form::text('age') !!}
							<div class="form-group {!! $errors->has('age') ? 'has-error' : '' !!}">{!! $errors->first('age', '<small class="help-block">:message</small>') !!}</div><br>														
							{!! Form::label('gender', 'Fille / Garçon - ') !!}<div class="help" id="gender"><i class="far fa-question-circle"></i><div class="helpMessage Messagegender">Information qui permet à l'application d'avoir un contenu écrit cohérent.</div></div><br>							
							{{  Form::select('gender', ['fille', 'garçon']) }}<br>							
							{!! Form::label('level', 'Mon niveau de classe - ') !!}<div class="help" id="level"><i class="far fa-question-circle"></i><div class="helpMessage Messagelevel">Information qui permet d'adapter le travail proposé au niveau de l'élève.</div></div><br>
							{{  Form::select('level', ['CE1','CE2','CM1','CM2', '6e']) }}<br>							
							{!! Form::label('number', 'Nombre le plus élevé que je connais - ') !!}<div class="help" id="number"><i class="far fa-question-circle"></i><div class="helpMessage Messagenumber">Information importante pour la numération permettant d'adapter le travail proposé au niveau de l'élève. (Il ne serait pas pertinent de proposer un nombre jamais étudié par l'élève !)<br><br>Exemples: 10 (début CP) ou 100 (certains fin de CP / CE1) ou 1000 ou 100000 etc</div></div><br>
							{!! Form::text('number') !!}
							<div class="form-group {!! $errors->has('number') ? 'has-error' : '' !!}">{!! $errors->first('number', '<small class="help-block">:message</small>') !!}</div><br><br>
							{!! Form::label('difficulty', 'Niveau de difficulté - ') !!}<div class="help" id="difficulty"><i class="far fa-question-circle"></i><div class="helpMessage Messagedifficulty">Information qui permet d'adapter le travail proposé au niveau de l'élève.</div></div><br>							
							{{  Form::select('difficulty', ['Facile', 'Normal', 'Difficile']) }}<br><br><br>	
							{!! Form::submit('Envoyer !') !!}
						{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
