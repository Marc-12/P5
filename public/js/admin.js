var Admin = 
{
	loader: function ()
	{
		this.mail();
		this.csrf();
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
	mail: function ()
	{
		$(".panel").on("click", ".mailUsers", mail);
		function mail() 
		{	
			if ($(this).css("height") == "65px") 
			{
				$(this).animate({"height": "280px"}, 150);

				$(this).find('.mailUsers_Buttons').show();
				$(this).find('.mailUsers_Buttons').css({"width": "100%", "height": "10%" ,  "margin": "0px" , "display": "flex" , "flex-direction" : "row" , "justify-content" : "space-around" });
		
				// récupérer valeur id du mail et de l'USER. 
				var valueID = $(this).find("#valueID").val();
				var valueUserID = $(this).find("#valueUserID").val();
			
				$(this).find(".fa-trash-alt").on("click" , deleteMail);
				function deleteMail() 
				{
					$.ajax(
					{
						type: 'post',
						url: 'ajaxDeleteMail/'+valueID+'',
						dataType: 'text',
						// data: {_token: '{{ csrf_token() }}' },
						success: function(data)
						{
							location.reload();
						}
					});
				}
				$(this).find(".fa-comment-alt").on("click" , answerMail);
				function answerMail() 
				{
					document.location.href="admin-mail-repondre/"+valueUserID+"/"+valueID;
				}
			}
			else if ($(this).css("height") == "280px") 
			{
				$(this).animate({"height": "65px"}, 150);
				$(this).find('.mailUsers_Buttons').hide();
			}
		}
	}
}; 
var admin1 = Object.create(Admin); 
admin1.loader();