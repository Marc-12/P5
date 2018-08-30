@extends('templates.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 maclasse">
			@include('templates/iconsMenu')
			<div id="maClasseContent">
				<div class="col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-sm-12">
					<div class="chartsBox">
						<div class="panelcharts">
							<div class="panelchartsLeft">Répartition du travail: <button class="buttonResults" id="resultsDoughnut">doughnut</button></div>
							<div class="panelchartsLeft">Visualisation succès / erreur: <button class="buttonResults" id="resultsRadar">Radar</button></div>
							<div class="panelchartsLeft"><button class="buttonResults" id="resultsText">rapport texte</button></div>
						</div>
						<div class="charts">
							<canvas id="myChart"></canvas>
							<div id="myChartText"></div>
						</div>
					</div>
				</div>
			</div>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		</div>
    </div>
@endsection