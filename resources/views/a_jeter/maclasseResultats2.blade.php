@extends('layouts.app')

@section('content')
<!--<div class="container">-->
    <div class="row">
        <div class="col-lg-12 maclasse">
			<div id="userSettingsLink"><i class="fas fa-cog"></i></div>
			<div id="userSettingsPanel"></div>
		


			<div id="mesInformations">
				<i class="far fa-times-circle close"></i>
				
			
				
				<!--
				{!! Form::open(['url' => 'registerSettingsForm']) !!}
							{!! Form::label('age', 'Mon âge: ') !!}<br>
							{!! Form::text('age') !!}<br>

							{!! Form::label('gender', 'fille / garçon: ') !!}<br>							
							{{ Form::select('gender', ['fille', 'garçon']) }}<br>							
							{!! Form::label('level', 'Mon niveau de classe: ') !!}<br>
							{{ Form::select('level', ['CE1','CE2','CM1','CM2', '6e']) }}<br>							
							
							{!! Form::label('number', 'Nombre le plus élevé que je connais: ') !!}<br>
							{!! Form::text('number') !!}<br><br>
							
							{!! Form::submit('Envoyer !') !!}
						{!! Form::close() !!}
				-->
				
				
				
				
			</div>
			<style>
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
					padding: 3%;
					width: 30%;
					height: 350px;
					margin-top: -15%;
					margin-left: 25%;
					margin-right: 25%;
					border: solid re; 
					display: none;
					position: absolute;
					background-color: grey;
					-webkit-box-shadow: 0px 5px 22px 1px rgba(0,0,0,0.75);
					-moz-box-shadow: 0px 5px 22px 1px rgba(0,0,0,0.75);
					box-shadow: 0px 5px 22px 1px rgba(0,0,0,0.75);
				}
				#mesInformations 
				{
					color: white;
				}
				.maclasse
				{
					position: relative;
				}
				.fa-times-circle, far
				{
					color: white;
					
				}
				
			</style>
			
			
			
		</div>
    </div>
<!--</div>-->
@endsection
