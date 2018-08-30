@extends('templates.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsMenu')
			<div id="maClasseContent">
				<div class="col-sm-4 col-sm-offset-4 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading addition">
							<div class="panel-heading"><h2 class="text-center">Mon opération</h2><span class="text-justify"><b><u><i>Consigne</u>: effectue la division suivante:</i></b></span>
								<div class="help" id="soustractionText"><i class="far fa-question-circle"></i><div class="helpMessage MessagesoustractionText">- Ecris le résultat de l'addition dans la zone prévue.<br>- Tu peux t'aider d'un cahier de brouillon pour t'aider.<br>- Attention aux retenues si il y en a !</div></div>
								<div class="help" id="soustractionVideo">
									<!-- LIEN VIDEO du COURS -->
									<a id="video" video-url="https://www.youtube.com/embed/GGaTctzsCis"><i class="fas fa-video"></i></a>
									<div class="helpMessage MessagesoustractionVideo">- Clique deux fois sur l'icône de la caméra pour regarder la vidéo de la leçon !<br>- Tu peux la regarder autant de fois que nécessaire !</div>
								</div>
							</div>
						</div>
							<style>
								.boxDivision
								{
								border: solid blu;
								height: 75%;
								display: flex;
								}
								.boxOperation
								{
									border: solid re;
									height: 200px;
									margin-top: 0px;
									margin-bottom: 35px;
									padding: 0px;
								}
													.boxLeft
													{
														border: solid re 1px;
														width: 25%;
														height: 100%;
														display: flex;
														flex-direction: column;
														font-Size: 18px;
													}
													.boxLeftTop, .boxLeftMiddle, .boxLeftBottom
													{
														border: 1px solid gre;
														width: 100%;
														height: 33%;
														display: flex; 
														flex-direction: row;
														justify-content: flex-end;
														align-items: center;
													}
													.divisionSign
													{
														font-Size: 60px;
													}
									.boxMiddle
									{
										border: 1px solid gree;
										width: 55%;
										height: 100%;
										display: flex;
										font-Size: 40px;	
										flex-direction: column;
									}
											
											.boxMiddleMiddle input[type=text], .boxMiddleBottom input[type=text]
											{
												border: solid re 1px;
												width: 30%;
												font-Size: 22px;	
											}
											
											.boxMiddleMiddle input[type=text]
											{
												text-align: center;
											}
											 .boxMiddleBottom input[type=text]
											{
												text-align: right;
												padding-right: 10px;
											}
											
											
											.boxMiddleTop, .boxMiddleMiddle, .boxMiddleBottom
											{
												border: 1px solid gre;
												width: 100%;
												height: 33%;
												padding: 0px;
												margin: 0px;	
												display: flex; 
												flex-direction: row;
												justify-content: center;
												align-items:  center;
												
											}
											
											
									.boxRight
									{
									border: solid orang;
									width: 30%;
									height: 100%;
									display: flex;
									font-Size: 40px;	
									flex-direction: column;
									}
											.boxRightMiddle input[type=text]
											{
												border: solid 1px gree;
												width: 50%;
												font-Size: 24px;	
												margin: 0px;
												text-align: center;
											}
											.boxRightTop, .boxRightMiddle, .boxRightBottom
											{
												border: 1px solid gre;
												width: 100%;
												height: 33%;
												display: flex; 
												flex-direction: row;
												justify-content: center;
												align-items: center;
											}
											.boxRight
											{
												border-left-style: solid; 
											}
											.boxRightTop
											{
												border-bottom-style: solid; 
											}
												
							</style>
						<div class="panel-body">
							<div class="boxOperation">
								<div class="boxDivision">
									<!-- BOX LEFT -->
									<div class="boxLeft">
										<div class="boxLeftTop"></div>
										<div class="boxLeftMiddle"><p class="divisionSign">-</p></div>
										<div class="boxLeftBottom"><p><i>(reste = )</i></p></div>
									</div>
									<!-- BOX MIDDLE -->
									<div class="boxMiddle">	
										<div class="boxMiddleTop">{{$topNumber}}
											{!! Form::open(['url' => 'divisionResteNulResultat', 'method'=> 'post']) !!}									
										</div>
										<div class="boxMiddleMiddle">{!! Form::text('soustractionReste') !!}</div>
										<div class="boxMiddleBottom">{!! Form::text('reste') !!}</div>
									</div>
									
									
									<!-- BOX RIGHT -->
									<div class="boxRight text-center">
										<div class="boxRightTop">{{$bottomNumber}}</div>
										<div class="boxRightMiddle">										
											{{ Form::hidden('hiddenTopNumber', $topNumber) }}
											{{ Form::hidden('hiddenBottomNumber', $bottomNumber) }}
											{!! Form::text('quotient') !!}
										</div>
										<div class="boxRightBottom"></div>
									</div>
								</div>
								<div class="form-group {!! $errors->has('reste') ? 'has-error' : '' !!}">{!! $errors->first('reste', '<small class="help-block">:message</small>') !!}</div><br>
								<div class="form-group {!! $errors->has('quotient') ? 'has-error' : '' !!}">{!! $errors->first('quotient', '<small class="help-block">:message</small>') !!}</div><br>
								{!! Form::submit('Valider !') !!}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
    </div>
@endsection