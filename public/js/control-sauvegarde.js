$(document).ready(function()
{
	var Control = 
	{
		fontFamily: "",
		fontSize: "",
		fontWeight: "",
		buttonLetterSpacing: "",
		displayDys: "",
		
		loader: function ()
		{
			this.csrf();
			this.test();
			this.sentUserDatas();
			this.getUserDatas();
			this.display();
		},
		test: function ()
		{
			$("body").on("click", ".mesResultats",  mesResultats);
			function mesResultats() 
			{
				console.log('CLICK BUTTON mes résultats');
			}
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
		sentUserDatas: function (data2send)
		{	
			var that = this; 
			$.ajax(
			{
				type: 'POST',
				url: '/ajaxSendUserSettings',
				dataType: 'text',
				data: { 'data': data2send},
				success: function(data)
				{
					console.log('SUCCES ENVOI BDD AJAX'+data2send);
				}
			});
		},
		getUserDatas: function ()
		{	
			var that = this; 
			$.ajax(
			{
				type: 'POST',
				url: '/ajax',
				dataType: 'text',
				success: function(data)
				{
					console.log(data);
					// var parsed = JSON.parse(data);
					// console.log(parsed);
					// that.fontFamily = parsed.fontFamily;
					// that.fontSize = parsed.fontSize;
					// that.fontWeight = parsed.fontWeight;
					// that.buttonLetterSpacing = parsed.letterSpacing;
					// that.displayDys = parsed.displayDys;
				}
			});
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
			
				//load default settings if no settings set 
				if (that.fontSize == "" && that.fontWeight == ""  && that.buttonLetterSpacing == "" ) 
				{
					$("#AffichageSelect option[value='arial']").attr('selected','selected');										
					$(".buttonFontSize").removeClass('selected');
					$(".DivbuttonFontSize button:eq(1)").addClass('selected');					
					$(".buttonWeight").removeClass('selected');
					$(".DivbuttonWeight button:eq(1)").addClass('selected');					
					$(".buttonLetSpacing").removeClass('selected');
					$(".DivbuttonLetSpacing button:eq(1)").addClass('selected');					
					that.fontSize = 1;
					that.fontWeight = 1;
					that.buttonLetterSpacing = 1;
				}
				else
				{
					//load user display settings 
					$(".DivbuttonFontSize button:eq("+ that.fontSize +")").addClass('selected');						
					$(".DivbuttonWeight button:eq("+ that.fontWeight +")").addClass('selected');		
					$(".DivbuttonLetSpacing button:eq("+ that.buttonLetterSpacing +")").addClass('selected');
					$("#AffichageSelect option[value="+that.fontFamily+"]").attr('selected','selected');
					if (that.displayDys === true)
					{
						$("#divSwitch input[type='checkbox']").prop('checked', true);
					}	
					else if (that.displayDys === false)
					{
						$("#divSwitch input[type='checkbox']").prop('checked', false);
					}		
				}	
			}
			// unset dys checkbox if settgings changed	
			$("body").on("click", ".DivbuttonFontSize button:eq(1), .DivbuttonFontSize button:eq(2),  .DivbuttonWeight button:eq(2), .DivbuttonWeight button:eq(0), .DivbuttonLetSpacing button:eq(1), .DivbuttonLetSpacing button:eq(2)", unsetCkeckBox)
			$("body").on("change", "#AffichageSelect", unsetCkeckBox)
			function unsetCkeckBox ()
			{
				console.log('click!!!')
				$("#divSwitch input[type='checkbox']").prop('checked', false);	
			}
			// set DYS settings 
			$("body").on('change', '#divSwitch', function() 
			{
				if($("#divSwitch input[type='checkbox']").is(":checked"))
				{
					$("#AffichageSelect option[value='dys']").attr('selected','selected');										
					$(".buttonFontSize").removeClass('selected');
					$(".DivbuttonFontSize button:eq(0)").addClass('selected');					
					$(".buttonWeight").removeClass('selected');
					$(".DivbuttonWeight button:eq(1)").addClass('selected');					
					$(".buttonLetSpacing").removeClass('selected');
					$(".DivbuttonLetSpacing button:eq(0)").addClass('selected');					
					that.fontSize = 0;
					that.fontWeight = 1;
					that.buttonLetterSpacing = 0;
					//
				}
				else
				{
					//unset DYS settings 
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
				// that.fontSize = this.id;
				 that.fontSize = $(this).index();
			}
			$("body").on("click", ".buttonWeight",  buttonWeight);
			function buttonWeight() 
			{
				$('.buttonWeight').removeClass('selected');
				$(this).addClass('selected');
				// that.fontWeight = this.id;
				that.fontWeight = $(this).index();
			}
			$("body").on("click", ".buttonLetSpacing",  buttonLetSpacing);
			function buttonLetSpacing() 
			{
				$('.buttonLetSpacing').removeClass('selected');
				$(this).addClass('selected');
				// that.buttonLetterSpacing = this.id;
				that.buttonLetterSpacing = $(this).index();
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
				// console.log('JSON ARRAY'+jsonArray);			
				that.sentUserDatas(jsonArray);			
				//fermer la fenêtre
				$("#mesInformations").empty();				
				$("#mesInformations").hide();	
			}			
	}
}
	var control1 = Object.create(Control); 
	control1.loader();
});