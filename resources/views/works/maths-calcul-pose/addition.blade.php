@extends('templates.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsMenu')
			
			<div id="maClasseContent">
				<div class="col-sm-4 col-sm-offset-4 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading addition"><h2 class="text-center">Mon opération</h2><span class="text-justify"><b><u><i>Consigne</u>: effectue l'addition suivante:</i></b></span>
							<div class="help" id="additionText"><i class="far fa-question-circle"></i><div class="helpMessage MessageadditionText">- Ecris le résultat de l'addition dans la zone prévue.<br>- Tu peux t'aider d'un cahier de brouillon pour t'aider.<br>- Attention aux retenues si il y en a !</div></div>
							<div class="help" id="additionVideo">
								<!-- LIEN VIDEO du COURS -->
								<a id="video" video-url="https://www.youtube.com/embed/n0hlL0aWHxo"><i class="fas fa-video"></i></a>
								<div class="helpMessage MessageadditionVideo">- Clique deux fois sur l'icône de la caméra pour regarder la vidéo de la leçon !<br>- Tu peux la regarder autant de fois que nécessaire !</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="boxOperation">
								<div class="boxTop">
									<div class="boxTopLeft">
										<div class="boxTopLeftTop"></div>
										<div class="boxTopLeftBottom"><p>+</p></div>
									</div>
									<div class="boxTopRight text-right">
										<div class="boxTopRightTop"><p>{{$topNumber}}</p></div>
										<div class="boxTopRightBottom"><p>{{$bottomNumber}}</p></div>
									</div>
								</div>
								<div class="boxBottom text-center">
									<div class="boxBottomLeft"><p>=</p></div>
									<div class="boxBottomRight text-right">									
										{!! Form::open(['url' => 'addtionResultat', 'method'=> 'post']) !!}
												{{ Form::hidden('hiddenTopNumber', $topNumber) }}
												{{ Form::hidden('hiddenBottomNumber', $bottomNumber) }}
										{!! Form::text('userResult', '', array('placeholder'=>'ton résultat ici')) !!}<br>
									</div>
								</div>
								{!! Form::submit('Valider !') !!}
								{!! Form::close() !!}
								<div class="form-group {!! $errors->has('userResult') ? 'has-error' : '' !!}">{!! $errors->first('userResult', '<small class="help-block">:message</small>') !!}</div><br>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
    </div>
@endsection