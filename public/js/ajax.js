$(document).ready(function()
{
	var ajax = 
	{
		//User infos
		email: "", 
		age: "",
		gender: "",
		genderText: "",
		classRoom: "",
		classRoomText: "",
		user_maxNumber: "",
		app_maxNumber: "",
		difficulty: "",
		difficultyText: "",
		
		//User Display Settings
		fontFamily: "",
		fontSize: "",
		fontWeight: "",
		buttonLetterSpacing: "",
		displayDys: "",

		loader: function ()
		{
			this.getUserDatas();
		},
		test: function ()
		{
			alert('ok');
		},
		sentUserDatas: function (data2send)
		{	
			var that = this; 
			// console.log(data2send);
			$.ajax(
			{
				type: 'POST',
				url: '/ajaxSendUserSettings',
				dataType: 'text',
				data: { 'data': data2send},
				success: function(data)
				{
				}
			});
		},
		getUserDatas: function ()
		{	
			var that = this; 
			$.ajax(
			{
				type: 'GET',
				url: '/ajax',
				dataType: 'text',
				success: function(data)
				{
					var parsed = JSON.parse(data);
					//1// load USER datas
					ajax.email = parsed.array1.email;
					console.log(ajax.email);
					that.age = parsed.array2.age_User_Info;
						//a//gender text
					that.gender = parsed.array2.gender_User_Info;
					if (that.gender = 0)
					{
						that.genderText = "fille";
					}
					else
					{
						that.genderText = "garçon";
					}					
						//b//classroom text
					that.classRoom = parsed.array2.class_User_Info;
					switch (that.classRoom)
					{
						case '1':
						that.classRoomText = 'CE1';
						break;
						case '2':
						that.classRoomText = 'CE2';
						break;
						case '3':
						that.classRoomText = 'CM1';
						break;
						case '4':
						that.classRoomText = 'CM2';
						break;
						case '5':
						that.classRoomText = '6e';
						break;
					}
					that.user_maxNumber = parsed.array2.maxNumber_User_Info;
					that.app_maxNumber = parsed.array2.app_Level_User_Info;
						//c//difficulty text
					that.difficulty = parsed.array2.difficulty_Level_User_Info;
					switch (that.difficulty)
					{
						case '1':
						that.difficultyText = 'FACILE';
						break;
						case '2':
						that.difficultyText = 'MOYEN';
						break;
						case '3':
						that.difficultyText = 'DIFFICILE';
						break;
					}
					//2//LOAD DISPLAY USER Settings		
					console.log(parsed.array2.settings_User_Info);
					var myArray = jQuery.parseJSON(parsed.array2.settings_User_Info);
					that.fontFamily = myArray.fontFamily;
					that.fontSize = myArray.fontSize;
					that.fontWeight = myArray.fontWeight;
					that.buttonLetterSpacing = myArray.letterSpacing;
					that.displayDys = myArray.displayDys;
					//
					// /!\ maintenant CHARGER Dl'affichage USER  
					//
					//
					//
					//
				}
			});
		}
	}
	var ajax1 = Object.create(ajax); 
	ajax1.loader();
});