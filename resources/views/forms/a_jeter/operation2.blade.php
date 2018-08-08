@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsMenu')
			
			
			<div id="maClasseContent">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="text-center">Mon opération</h2><p class="text-justify"><b><u><i>Consigne</u>: effectue l'opération ci-dessous:</i></b></p>
							<div class="help" id=""><i class="far fa-question-circle"></i><div class="helpMessage Messagegender">Clique sur la liste ci-contre et choisis l'opération que tu veux travailler.</div></div>
						</div>
						<div class="panel-body">
						<style>
							.boxOperation
							{
								border: solid re;
								height: 200px;
								margin-top: 0px;
								margin-bottom: 15px;
								padding: 0px;
							}
							.boxTop
							{
								border: solid orang;
								height: 75%;
								display: flex;
							}
								.boxTopLeft
								{
									border: solid blac 1px;
									width: 20%;
								}	
								.boxTopLeftTop
								{
									border: solid gre 1px;
									height: 50%;
									width: 100%
								}
								.boxTopLeftBottom
								{
									border: solid gre 1px;
									height: 50%;
									width: 100%;
									
									display: flex;
									justify-content: center;
								}
								.boxTopRight
								{
									border: solid blac 1px;
									width: 80%;
								}	
										.boxTopRight p, .boxTopLeft p, .boxBottomLeft p
										{
											font-Size: 54px;
										}
										.boxTopRightTop
										{
											border: solid gre 1px;
											height: 50%;
											width: 100%;
										}
										.boxTopRightBottom
										{
											border: solid gre 1px;
											height: 50%;
											width: 100%;
										}
							.boxBottom
							{
								border: solid blu;
								height: 25%;
								display: flex;
							}
								.boxBottomLeft
								{
									border: solid blac 1px;
									width: 20%;
									height: 100%;
									display: flex;
									align-items: center;
									justify-content: center;
								}
								.boxBottomRight
								{
									border: solid blac 1px;
									width: 80%;
									height: 100%;
								}
									.boxBottomRight input[type=text]
									{
										border: solid re 1px;
										font-Size: 54px;
										text-align: right;
										width: 80%;
										height: 100%;
									}
						</style>
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
										{!! Form::open(['url' => 'operationResultat', 'method'=> 'post']) !!}
												{{ Form::hidden('hiddenTopNumber', $topNumber) }}
												{{ Form::hidden('hiddenBottomNumber', $bottomNumber) }}
										{!! Form::text('operation') !!}<br>
		<div class="form-group {!! $errors->has('operation') ? 'has-error' : '' !!}">{!! $errors->first('operation', '<small class="help-block">:message</small>') !!}</div><br>
									</div>
								</div>
								{!! Form::submit('Envoyer !') !!}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
								   
								   
			<style>
				.close
				{
					display: none;
				}
				#userSettingsPanel 
				{
					padding-top: 1%;
					padding-bottom: 1%;
					display: block;
					color: white;
					text-align: center; 
					background-color: grey;
					width: 0px;
					margin-left: 0px;
					height: 200px;
				}
				#userSettingsPanel p, a 
				{
					display: block;
					color: white;
					text-align: center; 
				}
				#userSettingsPanel hr
				{
					width: 90%;
					margin-left: auto;
					margin-right: auto;
				}
				#mesInformations 
				{
					color: white;
					/*width: 40%;*/
					/*height: 350px;*/
					margin-top: -15%;
					/*margin-left: 25%;*/
					margin-right: 25%;
					border: solid yello; 
					border-radius: 4%;
					display: none;
					position: absolute;
					background-color: grey;
					-webkit-box-shadow: 0px 5px 22px 1px rgba(0,0,0,0.75);
					-moz-box-shadow: 0px 5px 22px 1px rgba(0,0,0,0.75);
					box-shadow: 0px 5px 22px 1px rgba(0,0,0,0.75);
				}
				.buttonForm
				{
					margin-right: 0px;
					margin-left: 5px;
					margin-bottom: 0px;
					float: right;
					border-radius: 05px;
					border: 0px;
				}
				.maclasse
				{
					position: relative;
				}
				.fa-times-circle, far
				{
					border: solid re;
					color: white;
					margin-top: 5%;
					margin-right: 5%;
				}
			</style>								
		</div>
    </div>
@endsection