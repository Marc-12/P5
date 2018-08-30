@extends('templates.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsAdminMenu')
		</div>
		<div class="adminMailBox col-md-4 col-md-offset-4 col-xs-offset-1 col-xs-10">
			<div class="panel panel-default">
				<a href="{{route('emailPage')}}">
					<div class="adminBox panel-body">
						<i class="menuIcon far fa-envelope"></i>
						<p id="p-newMail">{{$newMail}} email(s) non répondu(s)</p>
						<p>{{$allMail}} email(s) dans boîte de réception</p>
					</div>
				</a>
			</div>
		</div>		
    </div>
@endsection