@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			<div id="userSettingsIcon"><i class="fas fa-cog"></i></div>
			<div id="userSettingsPanel"></div>
			<div id="mesInformations" class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2  col-xs-12">
				<i class="far fa-times-circle close"></i>		
			</div>
			<div id="maClasseContent">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="text-center">Je choisis mon travail</h2><p class="text-justify">Choisis dans la liste ce que tu veux travailler aujourd'hui:</p></div>
						<div class="panel-body">
							{!! Form::open(['url' => 'subjectForm']) !!}
									{!! Form::label('subject', 'Sélectionne la matière à travailler - ') !!}<div class="help" id="gender"><i class="far fa-question-circle"></i><div class="helpMessage Messagegender">Clique sur la liste ci-contre et choisis la matière que tu veux travailler.</div></div><br>							
									{{  Form::select('subject', [0=>'français', 1=>'mathématiques'], Auth::user()->userInfos->subject) }}<br>														
									<div class="form-group {!! $errors->has('subject') ? 'has-error' : '' !!}">{!! $errors->first('subject', '<small class="help-block">:message</small>') !!}</div><br>
									{!! Form::submit('Envoyer !') !!}
							{!! Form::close() !!}
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