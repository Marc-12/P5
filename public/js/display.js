$(document).ready(function()
{
	var UserDisplay = 
	{
	
		loader: function ()
		{
			this.display();
		},
		setUserSettings: function ()
		{	
			$("body").css({"fontFamily": this.fontFamily, "fontSize": this.fontSize, "fontWeight": this.fontWeight,
			"letterSpacing": this.buttonLetterSpacing });					
		},
		display: function ()
		{	
			//CLOSE settings pannel
			$("body").on("click", ".close",closePanel);
			function closePanel() 
			{
				$("#mesInformations").hide();						
				$("#mesInformations .table").empty();				
			}			
			var that = this;		
			//click mes informations
			$("body").on("click", "#maclasseAffichage",  linkAffichage);
			function linkAffichage() 
			{
				// éviter bug affichage si je rappuis sur le meme buton
				$("#mesInformations .table").hide();
				$("#mesInformations .table").empty();
				//append elemetns
				$(".close").show();				
				$("#mesInformations").show();
				$("#mesInformations").append('<div class="table"><br><div class="tableLeft">Police d\'écriture: </div><div class="tableRight" id="formEmail">'+
				'<select id="AffichageSelect">'+
				    '<optgroup label="Sans Empattement">'+
					'<option value="arial" selected>Arial</option>'+
					'<option value="helvetica">Helvetica</option>'+
					'<option value="tahoma">Tahoma</option>'+
					'<optgroup label="Avec Empattement">'+
					'<option value="timesnewroman">Times New Roman</option>'+
					'<option value="georgia">Georgia</option>'+
					'<optgroup label="Monospace">'+
					'<option value="lucida">Lucida</option>'+
					'<optgroup label="Spécialisée">'+
					'<option value="dys">Dyslexique</option>'+
				'</select>'+			
				'</div><hr>'+
				'<br><div class="tableLeft">Taille de la police d\'écriture: </div><div class="tableRight DivbuttonFontSize"><button class="buttonForm buttonFontSize" id="0">Grand</button><button class="buttonForm buttonFontSize" id="1">Normal</button><button class="buttonForm  buttonFontSize" id="2">Petit</button></div><hr>'+
				'<br><div class="tableLeft">Poids de la police d\'écriture: </div><div class="tableRight DivbuttonWeight"><button class="buttonForm buttonWeight" id="0">Gras</button><button class="buttonForm buttonWeight" id="1">Normal</button><button class="buttonForm buttonWeight" id="2">Fin</button></div><hr>'+
				'<br><div class="tableLeft">Espacement des lettres: </div><div class="tableRight DivbuttonLetSpacing"><button class="buttonForm buttonLetSpacing" id="0">Fort</button><button class="buttonForm buttonLetSpacing" id="1">Normal</button><button class="buttonForm buttonLetSpacing" id="2">Faible</button></div><hr>'+
				'<br><div class="tableLeft">Affichage dyslexique: </div><div class="tableRight">'+				
				'<div id="divSwitch"><label class="switch"><input type="checkbox"><span class="slider round"></span></label></div></div>'+
			    '<br><div class="tableLeft"></div><div class="tableRight"><button class="buttonForm" id="validerAffichage">Valider</button></div>');
			
				//load user display settings 
				// $(".buttonFontSize").removeClass('selected');
				console.log('------>');
				var a = that.fontSize;
				if (a = '0')
				{
					a = 2;
				}
				else if (a = '2')
				{
					a = 0;
				}
				$(".DivbuttonFontSize button:eq("+ a +")").addClass('selected');
				// $(".buttonWeight").removeClass('selected');
				var b = that.fontSize;
				if (b = '0')
				{
					b = 2;
				}
				else if (b = '2')
				{
					b = 0;
				}			
				$(".DivbuttonWeight button:eq("+ b +")").addClass('selected');
				// $(".buttonLetSpacing").removeClass('selected');
				var c = that.fontSize;
				if (c = '0')
				{
					c = 2;
				}
				else if (c = '2')
				{
					c = 0;
				}
				$(".DivbuttonLetSpacing button:eq("+ c +")").addClass('selected');
				// $("#AffichageSelect option:selected").removeAttr('selected');
			    $("#AffichageSelect option[value="+that.fontFamily+"]").attr('selected','selected');
			}
			
			$("body").on('change', '#divSwitch', function() 
			{
				if($("#divSwitch input[type='checkbox']").is(":checked"))
				{
					// choix affichage DYS
					$("#AffichageSelect option[value='dys']").attr('selected','selected');
					
					
					$(".buttonFontSize").removeClass('selected');
					// $(".DivbuttonFontSize button:eq(0)").addClass('selected');
					$(".DivbuttonFontSize button #2").addClass('selected');
					
					$(".buttonWeight").removeClass('selected');
					$(".DivbuttonWeight button:eq(1)").addClass('selected');
					
					$(".buttonLetSpacing").removeClass('selected');
					$(".DivbuttonLetSpacing button:eq(0)").addClass('selected');
					
					that.fontSize = 0;
					that.fontWeight = 1;
					that.buttonLetterSpacing = 0;
				}
				else
				{
					//choix affichage normal
					//erase old settings
					$("#AffichageSelect option:selected").removeAttr('selected');
					$("#AffichageSelect option[value='arial']").attr('selected','selected');
					$(".buttonFontSize").removeClass('selected');
					$(".buttonWeight").removeClass('selected');
					$(".buttonLetSpacing").removeClass('selected');
					//LOAD originals settings
					$(".DivbuttonFontSize button:eq(1)").addClass('selected');
					$(".DivbuttonWeight button:eq(1)").addClass('selected');
					$(".DivbuttonLetSpacing button:eq(1)").addClass('selected');
					that.fontSize = 1;
					that.fontWeight = 1;
					that.buttonLetterSpacing = 1;
				}
			});
			//background color des buttons
			$("body").on("click", ".buttonFontSize",  buttonFontSize);
			function buttonFontSize() 
			{
				$('.buttonFontSize').removeClass('selected');
				$(this).addClass('selected');				
				that.fontSize = this.id;
			}
			$("body").on("click", ".buttonWeight",  buttonWeight);
			function buttonWeight() 
			{
				$('.buttonWeight').removeClass('selected');
				$(this).addClass('selected');
				that.fontWeight = this.id;
			}
			$("body").on("click", ".buttonLetSpacing",  buttonLetSpacing);
			function buttonLetSpacing() 
			{
				$('.buttonLetSpacing').removeClass('selected');
				$(this).addClass('selected');
				that.buttonLetterSpacing = this.id;
			}
			//button valider affichage
			$("body").on("click", "#validerAffichage",  validerAffichage);
			function validerAffichage() 
			{
				var displayArray = {fontFamily:"", fontSize:"", fontWeight:"", letterSpacing:"", displayDys:""};
				console.log('----phase validation affichage--->');
				// get user display parameters 
				var selectFontFamily = $("#AffichageSelect option:selected").val();
				displayArray.fontFamily = selectFontFamily; 
				displayArray.fontSize = that.fontSize; 
				displayArray.fontWeight = that.fontWeight; 
				displayArray.letterSpacing = that.buttonLetterSpacing; 
				//CHECKBOX value
				if($("#divSwitch input[type='checkbox']").is(":checked"))
				{
					displayArray.displayDys = true; 
				}
				else
				{
					displayArray.displayDys = false; 
				}
				//AJAX REQUEST --> send settings to DB
				var jsonArray = JSON.stringify(displayArray);
				Ajax.sentUserDatas(jsonArray);			
				//fermer la fenêtre
				$("#mesInformations").empty();				
				$("#mesInformations").hide();	
			}			
		}
	}
	var UserDisplay1 = Object.create(UserDisplay); 
	UserDisplay1.loader();
});