<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- LARAVEL CSRF TOKEN -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>P5</title>		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous" />		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
		{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
		{!! Html::style('css/index.css') !!}	
		{!! Html::style('css/styles.css') !!}	
		{!! Html::style('css/maclasse.css') !!}	
		{!! Html::style('css/operation.css') !!}	
		{!! Html::style('css/results.css') !!}	
		{!! Html::style('css/video.popup.css') !!}	
	</head>
	<body id="app-layout">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Branding Image -->
					<a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
						<!--ICON CLASSROOM + link to myclass -->
						@if (Auth::user())
							<a class="navbar-brand" href="{{ route('maclasse') }}"><i class="fas fa-chalkboard-teacher"></i></a>	
						@endif	
						@can('admin')
							<a class="navbar-brand" href="{{ route('admin') }}"><i class="fas fa-unlock-alt"></i></a>
						@endcan						
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ url('/don') }}">Faire un don</a></li>
							<li><a href="{{ url('/login') }}">Connexion</a></li>
							<li><a href="{{ url('/register') }}">S'inscrire</a></li>
						@else
							<li><a href="{{ url('/don') }}">Faire un don</a></li>
							<li><a href="{{ url('/logout') }}"></i>Déconnexion</a></li>
						@endif
					</ul>
				</div>				
			</div>
		</nav>
		@yield('content')	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
		{!! Html::script('js/slider.js') !!}	
		{!! Html::script('js/infos.js') !!}	
		{!! Html::script('js/charts.js') !!}	
		{!! Html::script('js/video.popup.js') !!}	
		{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
	</body>
	<footer>
		@if (Auth::user())
			<p>Bonjour <b>{{ Auth::user()->name }} </b> !</p>
			<p>-</p>
		@endif
			<p><i>P5 est une application en ligne pour réviser les fondamentaux du primaire.</i><br><b>Rejoignez-nous !</b></p>
			<a class="" href="{{ url('http://www.wow-pixel.com') }}">Réalisation du site Internet: wow-pixel.com</a>
			<p class="" href="{{ url('') }}">Copyright: Marc</p>
		@if (Auth::user())
			<br>
			<a href="{{ url('/logout') }}"></i>Déconnexion</a>
		@endif
		@if (Auth::guest())
			<br>
			<a class="" href="{{ url('/login') }}">Se connecter</a>
		@endif
	</footer>
</html>