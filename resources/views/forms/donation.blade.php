@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@if (Auth::user())
				@include('templates/iconsMenu')
			@endif	
			<div id="maClasseContent">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="text-center">Faire un don</h2><p class="text-justify">Soutenez le projet </br></div>

						<div class="panel-body">
							{!! Form::open(['url' => 'formContact']) !!}
									{!! Form::label('object', 'Objet du message: ' ) !!}<div class="asterix"> * </div><br>
									{{ Form::select('object', ['Je suis membre et j\'ai une question','Rapporter un dysfonctionnement de l\'application','Proposer une amélioration de l\'application', 'Travailler ensemble','Autre']) }}<br>									
									{!! Form::label('firstname', 'Mon prénom: ' ) !!}<div class="asterix"> * </div><br>
									{!! Form::text('firstname') !!}							
									<div class="form-group {!! $errors->has('firstname') ? 'has-error' : '' !!}">{!! $errors->first('firstname', '<small class="help-block">:message</small>') !!}</div><br>
									{!! Form::label('lastname', 'Mon nom: ') !!}<br>
									{!! Form::text('lastname') !!}<br>						
									{!! Form::label('message', 'Mon message: ' ) !!}<div class="asterix"> * </div><br>
									{!! Form::textarea('message') !!}<br>
									<div class="form-group {!! $errors->has('message') ? 'has-error' : '' !!}">{!! $errors->first('message', '<small class="help-block">:message</small>') !!}</div><br><br>							
									<label><i><div class="asterix">* Champs requis</div></i><br></br>	
									{!! Form::submit('Envoyer !') !!}
								{!! Form::close() !!}
								
													
								
						</div>
					</div>
				</div>
			</div>					
		</div>
    </div>
@endsection