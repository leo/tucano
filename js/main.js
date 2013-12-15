$(document).ready(function() {

	var loaded = 0;
	var number_of_media = $("body img").length;

	doProgress();

	// function for the progress bar
	function doProgress() {
		$("img").load(function() {
			loaded++;
			var newWidthPercentage = (loaded / number_of_media) * 100;
			animateLoader(newWidthPercentage + '%');			
		})
	}	

	//Animate the loader
	function animateLoader(newWidth) {
		$("#progressBar").width(newWidth);
		if(loaded==number_of_media){
				setTimeout(function(){
                    $("#progressBar").animate({opacity:0});
                    },500);
		}
	}

})
