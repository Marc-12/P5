$(document).ready(function()
{
	var InfosHelp = 
	{
		loader: function ()
		{
			this.hoverText();
			this.hoverVideo();
		},
		hoverText: function ()
		{
			$(".help").on("mouseover", function () 
			{
				$(".Message"+this.id).show();
			});
			$(".help").on("mouseleave", function () 
			{
				$(".Message"+this.id).hide();
			});
		},
		hoverVideo: function ()
		{
			$("body").on("click", "#video, #video2",  videoAddition);
			function videoAddition() 
			{
				$("#video, #video2").videoPopup(
				{
					  // autoplay on open
					  autoplay: true,
					  // shows video controls
					  showControls: true,
					  // colors of controls
					  controlsColor: false,
					  // infinite loop
					  loopVideo: false,
					  // shows video information
					  showVideoInformations: true,
					  // width
						width: 640,
						height: 360 				
				});
			}
		}
	}
	var InfosHelp1 = Object.create(InfosHelp); 
	InfosHelp1.loader();
});


