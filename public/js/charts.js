$(document).ready(function()
{
	var Charts = 
	{
		data: "",
		
		init: function ()
		{
			this.getDatas();
			this.click();
		},
		getDatas: function ()
		{
			var that = this; 
			$.ajax(
			{
				type: 'get',
				url: '/ajaxGetUserResults',
				dataType: 'text',
				success: function(data)
				{
					// console.log(data);
					that.data = data; 
					that.doughnut();
				}
			});
		},
		// sendDatas: function (data2send)
		// {	
			// var that = this; 
			// $.ajax(
			// {
				// type: 'POST',
				// url: '/ajaxSendUserResults',
				// dataType: 'text',
				// data: { 'data': data2send},
				// success: function(data)
				// {
					// console.log('SUCCES ENVOI'+data2send);
				// }
			// });
		// },
		click: function ()
		{
			if(this.data === "")
			{
				console.log('VARIABLE VIDE');
			}
			// console.log(this.data);
			//
			//
			//
			var that = this; 
			$("body").on("click", "#resultsRadar", radar);
			$("body").on("click", "#resultsDoughnut", doughnut);
			$("body").on("click", "#resultsText", text);
			function text ()
			{
				$('#myChart').hide();
				$('#myChartText').empty();
				$('#myChartText').show();
				that.text();
			}
			function doughnut ()
			{
				$('#myChart').show();
				$('#myChartText').hide();
				//$('#myChart').empty();
			
				//$('#myChartText').empty();
				that.doughnut();
			}
			function radar ()
			{
				$('#myChart').show();
				$('#myChartText').hide();

				//$('#myChart').empty();
				//$('#myChartText').empty();
				that.radar();
			}
		},
		doughnut: function ()
		{
			var parsed = JSON.parse(this.data);
			var additionCounter = 0;
			var soustractionCounter = 0;
			var multiplicationCounter = 0;
			var divisionCounter = 0;
			for (var i in parsed) 
			{
				  var parsedArray = parsed[i];
				  console.log(parsedArray);
				  if (parsedArray.operationName == "addition")
				  {
					  additionCounter++;
				  }
				  else if (parsedArray.operationName == "soustraction")
				  {
					  soustractionCounter++;
				  }
				   else if (parsedArray.operationName == "multiplication")
				  {
					  multiplicationCounter++;
				  }
				  else if (parsedArray.operationName == "division")
				  {
					  divisionCounter++;
				  }					  
			}
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["Addition", "Soustraction", "Mulptiplication", "Division"],
					datasets: [{
						data: [additionCounter, soustractionCounter, multiplicationCounter, divisionCounter],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)'
						],
						borderWidth: 1
					}]
				},
				options: 
				{
					title: {display: true, text: 'Répartition du travail par opération'},
				}
			});
		},
		radar: function ()
		{
			var parsed = JSON.parse(this.data);
			var additionSuccess = 0;
			var additionEchec = 0;
			var soustractionSuccess = 0;
			var soustractionEchec = 0;
			var multiplicationSuccess = 0;
			var multiplicationEchec = 0;
			var divisionSuccess = 0;
			var divisionEchec = 0;
			for (var i in parsed) 
			{
				  var parsedArray = parsed[i];
				  if (parsedArray.operationName == "addition" && parsedArray.operationStatus == "success")
				  {
					  additionSuccess++;
				  }
				  else if (parsedArray.operationName == "addition" && parsedArray.operationStatus == "echec")
				  {
					  additionEchec++;
				  }
				  if (parsedArray.operationName == "soustraction" && parsedArray.operationStatus == "success")
				  {
					  soustractionSuccess++;
				  }
				  else if (parsedArray.operationName == "soustraction" && parsedArray.operationStatus == "echec")
				  {
					  soustractionEchec++;
				  }
				  if (parsedArray.operationName == "multiplication" && parsedArray.operationStatus == "success")
				  {
					  multiplicationSuccess++;
				  }
				  else if (parsedArray.operationName == "multiplication" && parsedArray.operationStatus == "echec")
				  {
					  multiplicationEchec++;
				  }
				  
				  if (parsedArray.operationName == "division" && parsedArray.operationStatus == "success")
				  {
					  divisionSuccess++;
				  }
				  else if (parsedArray.operationName == "division" && parsedArray.operationStatus == "echec")
				  {
					  divisionEchec++;
				  }
			}
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
			type: 'radar',
			data: 
			{
				labels: ['Addition', 'Soustraction', 'Multiplication', 'Division'],
				datasets: [
				{
					label: '# succès',
					data: [additionSuccess, soustractionSuccess, multiplicationSuccess, divisionSuccess],
				    backgroundColor: ['rgba(50,213,127,0.29)'],
				    borderColor: ['rgba(50,213,127,1)'], 
					borderWidth: 1
				}, 
				{
					label: '# erreur',
					data: [additionEchec, soustractionEchec, multiplicationEchec, divisionEchec],
					backgroundColor: ['rgba(255, 99, 132, 0.2)'],
					borderColor: ['rgba(255,99,132,1)'],
					borderWidth: 1
				 }]
			},
			options: 
			{
				title: {display: true, text: 'Répartition des résultats par type d\'opération'},
				scale: {display: true}
			}
			});
		},
		text: function ()
		{
			$('.charts').css({'overflow-y': 'scroll'});
			var parsed = JSON.parse(this.data);
			for (var i in parsed) 
			{
				  var parsedArray = parsed[i];
				  console.log(parsedArray);
				  var str = new Date(parsedArray.date);
				  var year = str.getFullYear();
				  var month = (str.getMonth()+1);
				  var day = str.getDate();	
				  $('#myChartText').append('<div id="divText"><i><b>- Le '+day+' / '+ month+' / '+ year +'</b></i><br>Opération: <b><div class="operation">'+parsedArray.operationName+'</div></b><br>'+'Détails de l\'opération: '+parsedArray.operationNumbers+'<br>Status de l\'opération:<div class="status"> '+parsedArray.operationStatus+'</div><br><br></div>');		  
				  $('.operation').css({'backgroundColor': 'yellow', 'display': 'inline'});
				  $('.status').css({'backgroundColor': 'orange', 'display': 'inline'});
			}	
		}
	}; 
	var ChartsUser = Object.create(Charts); 
	ChartsUser.init();
});