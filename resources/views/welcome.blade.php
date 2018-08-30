@extends('templates.app')
@section('content')
<!--<div class="container">-->
    <div class="row">
        <div class="col-lg-12">
			<section id="slider">
				<div id="carrousel">
					<ul>
						<li><img src="images/slider/1.jpg"/></li>
						<li><img src="images/slider/2.jpg"/></li>
						<li><img src="images/slider/3.jpg"/></li>
						<li><img src="images/slider/4.jpg"/></li>
						<li><img src="images/slider/5.jpg"/></li>
					</ul>
					<i class="fas fa-chevron-circle-left prev"></i>
					<i class="fas fa-chevron-circle-right next"></i>
				</div>
				<div id="slider-infos"><h1><span style="color:white">P5</span><span style="color:white"> : Révisez son primaire en ligne avec un vrai professeur c'est possible !</span></h1>
				<p>P5 est la première plateforme en ligne pour réviser les maths et le français du primaire à son rythme !</p><a class="bordered button" href="#infos">Plus d'infos</a></div>
			</section>
		</div>
		@if(Session::has('welcomePageFlash'))
			<div class="flash-Div">
				<div class="alert alert-success col-lg-offset-4 col-lg-4 col-xs-offset-2 col-xs-8" id="alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('welcomePageFlash') !!}</em></div>
			</div>
		@endif
		<div class="IndexVideo">
			<iframe width="" height="" src="https://www.youtube.com/embed/qTLG3Wg4tZQ?start=85" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
		<div class="col-lg-12">
			<section id="infos">
			<div id="welcomePanel">
				<div class="welcomePanel" id="mountain">
					<h1>Une application pour réviser le primaire !</h1>
					<i class="fas fa-chalkboard-teacher"></i>
					<p><i class="fas fa-circle"></i> Développé par un professeur expérimenté et diplomé pour ses élèves.<br><br><i class="fas fa-circle"></i> Votre enfant révise en ligne les points précis du programme avec les leçons et corrections d'un professeur expérimenté.<br><br><i class="fas fa-circle"></i> Tout est automatisé: votre enfant travaille quand il veut et avance à son rythme !</p>
				</div>
				<div class="welcomePanel" id="road">
					<h1>Chaque enfant est unique !</h1>
					<i class="fas fa-user-graduate"></i>					
					<p><i class="fas fa-circle"></i> Nous individualisons chaque parcours car chaque enfant est unique !<br><br><i class="fas fa-circle"></i> Grâce à un puissant algorythme, l'informatique permet aujourd'hui de cibler très précisément les difficultés de votre enfant et d'y remédier. 
					<br><br><i class="fas fa-circle"></i> Jamais les apprentissages n'ont été aussi individualisés !</p>
				</div>
				<div class="welcomePanel" id="apple">
					<h1>Des activités pédagogiques uniques !</h1>
					<i class="fab fa-leanpub"></i>
					<p><i class="fas fa-circle"></i> Nous avons plein d'idées et ajoutons régulièrement de nouvelles activités pédagogiques pour que votre enfant apprennent avec toujours plus de plaisir !<br><br><i class="fas fa-circle"></i> Tout est mis en place pour assurer la réussite de votre enfant dans les matières fondamentales (français et mathématiques) dans le respect des programmes scolaires du primaire (France).</p>
				</div>
			</div>
			</section>
		</div>
		<div class="IndexVideo">
			<iframe width="" height="" src="https://www.youtube.com/embed/qTLG3Wg4tZQ?start=85" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
    </div>
<!--</div>-->
@endsection