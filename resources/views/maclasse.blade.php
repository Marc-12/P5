@extends('templates.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsMenu')
			
			<div id="maClasseContent">
				<div class="col-sm-4 col-sm-offset-4 col-xs-12">
					@if(Session::has('form'))
						<div class="alert alert-success" id="alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('form') !!}</em></div>
					@endif
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="text-center">Je choisis mon travail</h2><span class="text-justify">Choisis dans la liste ci-dessous ce que tu veux travailler:</span>
							<div class="help" id="gender"><i class="far fa-question-circle"></i><div class="helpMessage Messagegender">Clique sur la liste ci-contre et choisis l'opération que tu veux travailler.</div></div><br>							
						</div>
						
						<div class="panel-body">
							<!-- !!! DECLARATION DE FORM A SUPPRIMER !!! -->					
							{!! Form::open(['url' => route('calcul'), 'method'=> 'get']) !!}
							<!-- !!! -->					

							{!! Form::label('operation', 'Sélectionne une opération - ') !!}<br>
							@can('operation-cp')
							{{  Form::select('operation', [ 0 => 'addition (+)', 2 => 'soustraction (-)'], Auth::user()->userInfos->subject, ['id' => 'selected_CP' , 'class' => 'selectedOption']) }}<br>														
							
							<!-- !!! DECLARATION DE FORM A SUPPRIMER !!! -->					
								<!-- {{  Form::select('operation', [0 => ' -- clic ici --', 1 => 'addition (+)', 2 => 'soustraction (-)'], Auth::user()->userInfos->subject, ['id' => 'selected_CP' , 'class' => 'selectedOption']) }}<br>														
							<!-- !!! -->					
							
							@endcan
							@can('operation-ce1')
							{{  Form::select('operation', [0=>'addition (+)', 1=>'soustraction (-)', 2=>'multiplication (x)'], Auth::user()->userInfos->subject, ['class' => 'selectedOption']) }}<br>														
							@endcan
							@can('operation-upper-ce2')
							{{  Form::select('operation', [0=>'addition (+)', 1=>'soustraction (-)', 2=>'multiplication (x)', 3=>'division (÷)'], Auth::user()->userInfos->subject, ['class' => 'selectedOption']) }}<br>														
							@endcan	
							
							<!-- !!! DECLARATION DE FORM A SUPPRIMER !!! -->					
							{!! Form::submit('Envoyer !') !!}
							{!! Form::close() !!}
							<!-- !!! -->												
						</div>
								
						<div id="form_CP_1" class="form_CP"><br>
							{!! Form::open(['url' => route('calcul'), 'method'=> 'get']) !!}
								{{ Form::select('operation', array('niveau 1' => array( 'poser-addition-niveau-1' => 'poser une addition', 'addition-niveau-1' => 'addition'),'niveau 2' => array( 'poser-addition-niveau-2' => 'poser une addition', 'addition-niveau-2' =>'addition ')) , Auth::user()->userInfos->subject, ['class' => '', 'id' => ''] )  }}
							{!! Form::submit('Envoyer !') !!}
							{!! Form::close() !!}
						</div>																	
						<div id="form_CP_2" class="form_CP"><br>
							{!! Form::open(['url' => route('calcul'), 'method'=> 'get']) !!}
								{{ Form::select('operation', array('niveau 1' => array(0 => 'poser une soustraction', 1 => 'soustraction'),'niveau 2' => array( 3 => 'poser une soustraction', 4 =>'soustraction ')) , Auth::user()->userInfos->subject, ['class' => '', 'id' => ''] )     }}
							{!! Form::submit('Envoyer !') !!}
							{!! Form::close() !!}
						</div>	
						
							<style>
								.form_CP
								{
									display: none; 	
								}
							</style>
							
							<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
							<script>
							   $("#selected_CP").change(function () 
							   {
									var option = $("#selected_CP").val();
									switch (option)
									{
										case '1':
											$(".form_CP").hide();
											$("#form_CP_1").show();
											$("#form_CP_1 form").submit(function(e) 
											{
												e.preventDefault();
												var $form = $(e.target);
												document.location.href = e.target.action + '/' + $form.find("select").val();
											})
											break;
										case '2':
											$(".form_CP").hide();
											$("#form_CP_2").show();
											$("#form_CP_2 form").submit(function(e) 
											{
												e.preventDefault();
												var $form = $(e.target);
												document.location.href = e.target.action + '/' + $form.find("select").val();
											})
											break;
										default:
									}
									
							   });	
							</script>
						
						@if(Session::has('success'))
							<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
						@endif	
						@if(Session::has('error'))
							<div class="alert alert-danger"><span class="glyphicon glyphicon-ok"></span><em> {!! session('error') !!}</em></div>
						@endif

					</div>
				</div>
			</div>								
		</div>
    </div>
@endsection