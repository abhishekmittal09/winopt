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

$("#parametricform").submit(function(event){
	var unique_counter=guid();
	var address=parametricRequestProcessForm+unique_counter;
	console.log(address);
	$(this).attr("action", address);
});

//this function is for hiding various divs once a click on fixed or variable option has been clicked
function hide(n)
{
	if(n=='1')
	{
		var a=document.getElementById('azifixed');
		a.style.display="none";
		a=document.getElementById('azivariable');
		a.style.display="block";
	}
	else if(n=='2'){
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
	else if(n=='5'){
		var a=document.getElementById('depthfixed');
		a.style.display="none";
		a=document.getElementById('depthvariable');
		a.style.display="block";
	}
	else if(n=='6'){
		var a=document.getElementById('depthvariable');
		a.style.display="none";
		a=document.getElementById("depthfixed");
		a.style.display="block";
	}
	else if(n=='7'){
		var a=document.getElementById('lbybratiofixed');
		a.style.display="none";
		a=document.getElementById('lbybratiovariable');
		a.style.display="block";
	}
	else if(n=='8'){
		var a=document.getElementById('lbybratiovariable');
		a.style.display="none";
		a=document.getElementById("lbybratiofixed");
		a.style.display="block";
	}
}
