@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsAdminMenu')
			<div id="maClasseContent">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="text-center">formulaire de réponse</h2><p class="text-justify"></div>
						<div class="panel-body">
							{!! Form::open(['route' => ['answerMailContent', $userId, $mailid], 'method'=> 'post']) !!}
								{!! Form::textarea('text', '', array('placeholder'=>'réponse')) !!}<br>
							{!! Form::submit('Valider !') !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>		
		</div>
    </div>
@endsection