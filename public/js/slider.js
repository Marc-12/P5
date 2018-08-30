$(document).ready(function()
{
	var SliderPOO = 
	{
		indexImg: 0, 
		i: 0, 
		loadSlider: function ()
		{
			var $carrousel = $('#slider #carrousel'); 
			$img = $('#slider #carrousel img'); 
			this.indexImg = $img.length - 1;
			this.initSlider();
			this.controlSlider();
			this.responsiveSlider();
		},
		responsiveSlider: function ()
		{
			$(window).resize(function()
			{
			  resize ();
			});
			function resize ()
			{
				var heightImage = $("#carrousel img").height();
				var widthImage = $(window).width();
				$("#slider").height(heightImage);
				// $("#carrousel").height(heightImage);
				if (widthImage > 1400)
				{
					$("#carrousel img").css("width", widthImage+"px");
				}
				else
				{
					$("#carrousel img").css("width", "100%");
				}	
			}
		},
		initSlider: function ()
		{
			$img.css('display', 'none'); 
			this.i = 0; 
			$currentImg = $img.eq(this.i); 
			$currentImg.css('display', 'block'); 
		},
		controlSlider: function ()
		{
		var that = this; 
			$('.next').click(function()
			{ 
				that.nextImage();  
			});
			$('.prev').click(function()
			{ 
				that.previousImage();  
			});
			$("body").keydown(function(e) 
			{
				if(e.keyCode == 37) 
				{ 
					that.previousImage();  
				}
				if(e.keyCode == 39) 
				{ 
					that.nextImage();  
				}
			});		
				setInterval(function()
				{ 
					that.nextImage();  
				}, 3000);
		},
		nextImage: function ()
		{
			this.i++; 	
			$currentImg = $img.eq(this.i); 
			$currentImg.css('display', 'block'); 
			if (this.i > this.indexImg)	
			{
				this.initSlider();
			}
		},		
		previousImage: function ()
		{
			$img.css('display', 'none'); 
			this.i--; 	
			$currentImg = $img.eq(this.i); 
			$currentImg.css('display', 'block'); 
			if (this.i < 0)	
			{
				$img.css('display', 'none'); 

				this.i = this.indexImg; 
				$currentImg = $img.eq(this.i); 
				$currentImg.css('display', 'block');
			}
		}
	}; 
	var Slider1 = Object.create(SliderPOO); 
	Slider1.loadSlider();
});