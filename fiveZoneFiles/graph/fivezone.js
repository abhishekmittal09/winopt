var parametricRequestProcessForm = "./fiveZoneFiles/parametric.php?unique_counter=";

function s4() {
	return Math.floor((1 + Math.random()) * 0x10000)
	.toString(16)
	.substring(1);
};

function guid() {
	return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
	s4() + '-' + s4() + s4() + s4();
}

var unique_counter=guid();

// $("#parametricform").submit(function(event){
// 	var unique_counter=guid();
// 	var address=parametricRequestProcessForm+unique_counter;
// 	console.log(address);
// 	$(this).attr("action", address);
// });

$( document ).ready(function() {
	var request;
	$("#genoptform").submit(function(event){
		// var correct=validateForm();
		// if(correct==false){
		// 	return false;
		// }
		var unique_counter=guid();
		var address="./fiveZoneFiles/mycommand_file_generator.php?unique_counter="+unique_counter;
		if (request) {
			request.abort();
		}
		// setup some local variables
		var $form = $(this);
		// let's select and cache all the fields
		var $inputs = $form.find("input, select, button, textarea");
		// serialize the data in the form
		var serializedData = $form.serialize();
		
		// let's disable the inputs for the duration of the ajax request
		$inputs.prop("disabled", true);
		
		request = $.ajax({
			url: address,
			type: "POST",
			data: serializedData
		});
						
		// callback handler that will be called on success
		request.done(function (response, textStatus, jqXHR){
				// log a message to the console
				console.log("Hooray, it worked!");
			});
		
		// callback handler that will be called on failure
		request.fail(function (jqXHR, textStatus, errorThrown){
				// log the error to the console
				console.error(
					"The following error occured: "+
					textStatus, errorThrown
					);
			});
		
		// callback handler that will be called regardless
		// if the request failed or succeeded
		request.always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});
		
		var address2="./fiveZoneFiles/displaygenopt_ver1.php?unique_counter="+unique_counter;
		
		document.getElementById("iframe2").src=address2;

		// prevent default posting of form
		event.preventDefault();
	});


	$("#parametricform").submit(function(event){

		// var correct=validateForm2();
		// if(correct==false){
		// 	return false;
		// }
		var unique_counter=guid();
		var address="./fiveZoneFiles/parametric.php?unique_counter="+unique_counter;
		if (request) {
			request.abort();
		}
		// setup some local variables
		var $form = $(this);
		// let's select and cache all the fields
		var $inputs = $form.find("input, select, button, textarea");
		// serialize the data in the form
		var serializedData = $form.serialize();
		
		// let's disable the inputs for the duration of the ajax request
		$inputs.prop("disabled", true);
		
		request = $.ajax({
			url: address,
			type: "POST",
			data: serializedData
		});
				
		// callback handler that will be called on success
		request.done(function (response, textStatus, jqXHR){
				// log a message to the console
				console.log("Hooray, it worked!");
			});
		
		// callback handler that will be called on failure
		request.fail(function (jqXHR, textStatus, errorThrown){
				// log the error to the console
				console.error(
					"The following error occured: "+
					textStatus, errorThrown
					);
			});
		
		// callback handler that will be called regardless
		// if the request failed or succeeded
		request.always(function () {
				// reenable the inputs
				$inputs.prop("disabled", false);
			});
		
		var address2="./fiveZoneFiles/displayparametric.php?unique_counter="+unique_counter;
		//alert(address2);
		
		document.getElementById("iframe1").src=address2;
		
		// prevent default posting of form
		event.preventDefault();
	});

});//end of document ready


//this function is for hiding various divs once a click on fixed or variable option has been clicked
function hide(n)
{
	if(n=='azifix')
	{
		var a=document.getElementById('azifixed');
		a.style.display="none";
		a=document.getElementById('azivariable');
		a.style.display="block";
	}
	else if(n=='azivar'){
		var a=document.getElementById('azivariable');
		a.style.display="none";
		a=document.getElementById("azifixed");
		a.style.display="block";
	}
	else if(n=='wwrfix'){
		var a=document.getElementById('wwrfixed');
		a.style.display="none";
		a=document.getElementById('wwrvariable');
		a.style.display="block";
	}
	else if(n=='wwrvar'){
		var a=document.getElementById('wwrvariable');
		a.style.display="none";
		a=document.getElementById("wwrfixed");
		a.style.display="block";
	}
	else if(n=='depthfix'){
		var a=document.getElementById('depthfixed');
		a.style.display="none";
		a=document.getElementById('depthvariable');
		a.style.display="block";
	}
	else if(n=='depthvar'){
		var a=document.getElementById('depthvariable');
		a.style.display="none";
		a=document.getElementById("depthfixed");
		a.style.display="block";
	}
	else if(n=='lbybratiofix'){
		var a=document.getElementById('lbybratiofixed');
		a.style.display="none";
		a=document.getElementById('lbybratiovariable');
		a.style.display="block";
	}
	else if(n=='lbybratiovar'){
		var a=document.getElementById('lbybratiovariable');
		a.style.display="none";
		a=document.getElementById("lbybratiofixed");
		a.style.display="block";
	}
}
