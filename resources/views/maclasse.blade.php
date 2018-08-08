@extends('layouts.app')
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
						<div class="panel-heading"><h2 class="text-center">Je choisis mon travail</h2><p class="text-justify">Choisis dans la liste l'opération que tu veux travailler:</p></div>
						<div class="panel-body">
							{!! Form::open(['url' => 'formOperationChoice', 'method'=> 'get']) !!}
							{!! Form::label('operation', 'Sélectionne une opération - ') !!}
							<div class="help" id="gender"><i class="far fa-question-circle"></i><div class="helpMessage Messagegender">Clique sur la liste ci-contre et choisis l'opération que tu veux travailler.</div></div><br>							
							@can('operation-cp')
							{{  Form::select('operation', [0=>'addition (+)', 1=>'soustraction (-)'], Auth::user()->userInfos->subject) }}<br>														
							@endcan
							@can('operation-ce1')
							{{  Form::select('operation', [0=>'addition (+)', 1=>'soustraction (-)', 2=>'multiplication (x)'], Auth::user()->userInfos->subject) }}<br>														
							@endcan
							@can('operation-upper-ce2')
							{{  Form::select('operation', [0=>'addition (+)', 1=>'soustraction (-)', 2=>'multiplication (x)', 3=>'division (÷)'], Auth::user()->userInfos->subject) }}<br>														
							@endcan													
							{!! Form::submit('Envoyer !') !!}
							{!! Form::close() !!}
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
    </div>
@endsection