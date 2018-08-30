@extends('templates.app')
@section('content')
    <div class="row">
		@include('templates/iconsAdminMenu')
		@if(Session::has('MailFlash'))
			<div class="flash-Div">
				<div class="alert alert-success col-xs-10 col-xs-offset-1" id="alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('MailFlash') !!}</em></div>
			</div>
		@endif
		<div class="col-lg-12 maclasse">			
			<div id="maClasseContent">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="text-center">Mes mails</h2><p class="text-justify">
						</div>
						<div class="panel-body">
							@foreach ($users as $user) 
								<div class="mailUsers">
									<div class="mailUsers_Name">{{$user->FullName}}</div>
									<div class="mailUsers_Date">{{$user->created_at->format("d-m-Y")}}</div>
									<div class="mailUsers_Message">
										<p class="mailUsers_Message_p">{{$user->message_user_contacts}}</p>
										<div class="mailUsers_Buttons">
											<i class="fas fa-comment-alt"></i>
											<i class="fas fa-trash-alt"></i>
										</div>
									</div>
									<div class="mailUsers_Control">
										@if($user->state_user_contacts == 0)
											<i  class="greenArrow fas fa-arrow-circle-down"></i>
										@elseif($user->state_user_contacts == 1)
											<i  class="redArrow fas fa-arrow-circle-down"></i>
										@endif
									</div>
									<input type="hidden" id="state_user_contacts" name="browser" value="{{$user->state_user_contacts}}" />
									<input type="hidden" id="valueID" name="browser" value="{{$user->id}}" />
									<input type="hidden" id="valueUserID" name="browser" value="{{$user->id_user_contacts}}" />
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>					
		</div>
    </div>
@endsection