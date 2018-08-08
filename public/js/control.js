$(document).ready(function()
{
	var Control = 
	{
		loader: function ()
		{
			this.csrf();
			// this.userSettingsIcon();
			// this.informations();
		},
		csrf: function (data2send)
		{	
			$.ajaxSetup(
			{
				headers:
				{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		},
		userSettingsIcon: function ()
		{		
			$("#userSettingsIcon").on("click", userSettings);
			function userSettings() 
			{
				if ($("#userSettingsPanel").css("width") == "0px") 
				{
					$("#userSettingsPanel").animate({"width": "250px"}, 100);					

					$("#userSettingsPanel").prepend('<a href="maclasse"><i class="fas fa-chalkboard-teacher"></i></a>'+
					'<p><i class="fas fa-cog"></i> Mes paramètres</p><hr>'+
					'<a id="maclasseInformations"><i class="fas fa-info-circle"></i> Mes informations</a>'+
					'<a id="maclasseAffichage"><i class="fas fa-desktop"></i></i> Affichage</a>'+	
					'<a href="Results"><i class="fas fa-graduation-cap"></i> Mes résultats</a>');	

					$("#userSettingsPanel").append('<hr><a href=""><i class="far fa-user-circle"></i> Mon compte</a>'+
					'<a><i class="far fa-envelope"></i> Contact</a>'+
					'<a href="logout"><i class="fas fa-sign-out-alt"></i></i> Déconnexion</a>');				
				}
				else if ($("#userSettingsPanel").css("width") == "250px") 
				{
					$("#userSettingsPanel").animate({"width": "0px"}, 100);
					
					//EMPTY div content
					$("#userSettingsPanel").empty();

				}
			}
		},
		informations: function ()
		{	
			console.log('1'+ajax.mail);
			console.log('1'+ajax1.mail);
			console.log('2'+ajax1.mail);
			console.log('2'+Ajax1.mail);
			
			var that = this;
			//click mes informations
			$("body").on("click", "#maclasseInformations",  linkInformations);
			function linkInformations() 
			{
				// éviter bug affichage si je rappuis sur le meme buton
				$("#mesInformations .table").hide();
				//append elemetns
				$(".close").show();				
				$("#mesInformations").show();
				$("#mesInformations").append('<div class="table"><br><div class="tableLeft">Email:</div><div class="tableRight" id="formEmail">'+ that.email +'<button class="buttonForm" id="buttonFormEmail">Modifier</button></div><hr>'+
				'<br><div class="tableLeft">Âge:</div><div class="tableRight">'+ that.age+'</div><hr>'+
				'<br><div class="tableLeft">Gender:</div><div class="tableRight">'+ that.genderText+'</div><hr>'+
				'<br><div class="tableLeft">Ma classe:</div><div class="tableRight">'+ that.classRoomText+'</div><hr>'+
				'<br><div class="tableLeft">Le nombre le plus grand appris en classe:</div><div class="tableRight">'+ that.user_maxNumber+'</div><hr>'+
				'<br><div class="tableLeft">Difficulté:</div><div class="tableRight">'+ that.difficultyText+'</div><hr><button class="">Valider</button></div>');	
			}	
			//FORM modify data 
			$("body").on("click", "#buttonFormEmail",  ModifyData);
			function ModifyData() 
			{
				$("#formEmail").empty();
				$("#buttonFormEmail").empty();
				$("#formEmail").append('<input type="text" id="" name=""><button class="buttonForm" id="buttonFormEmail">Valider</button>');
			}
		}
	}
	var control1 = Object.create(Control); 
	control1.loader();
});