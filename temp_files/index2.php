<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title>WinOpt</title>
		<style type="text/css">
			#a1 {  
			color: white;  
			font-size: x-large;
			}
			.a2 {  
			font-size: x-large;
			}
			#a3 {  
			font-size: x-large;
			}
			.a4 {  
			font-size: x-large;
			}
			#a5 {  
			font-size: x-large;
			}
			.a0 {  
			color: white;
			}
			.a6 {
			color: white;  
			font-size: x-large;
			}
			html, body {
			margin: 0;
			padding: 0;
			}
		</style>
		<script src="./jquery.js"></script>
		<script type="text/javascript">
			function s4() {
				return Math.floor((1 + Math.random()) * 0x10000)
					.toString(16)
					.substring(1);
			};
			
			function guid() {
				return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
					s4() + '-' + s4() + s4() + s4();
			}
			
			
			var idis=1;//tells the id.
			
			$(document).ready(function() {
					var windowWidth = (parseInt($(window).width()));
					var windowwidth_4times=windowWidth*4+210;
					$('#id0').css({'width':windowwidth_4times});
					$('#id1').css({'width':windowWidth});
					$('#id2').css({'width':windowWidth});
					$('#id3').css({'width':windowWidth});
					$('#id4').css({'width':windowWidth});
			
					location.hash="#id1";
					function filterPath(string) {
					return string
					.replace(/^\//,'')
					.replace(/(index|default).[a-zA-Z]{3,4}$/,'')
					.replace(/\/$/,'');
					}
					var locationPath = filterPath(location.pathname);
					var scrollElem = scrollableElement('html', 'body');
			
					$('a[href*=#]').each(function() {
						var thisPath = filterPath(this.pathname) || locationPath;
						if (  locationPath == thisPath
							&& (location.hostname == this.hostname || !this.hostname)
							&& this.hash.replace(/#/,'') ) {
						var $target = $(this.hash), target = this.hash;
						if (target) {
						var targetOffset = $target.offset().left;
						$(this).click(function(event) {
							event.preventDefault();
							$(scrollElem).animate({scrollLeft: targetOffset}, 400, function() {
								location.hash = target;
								if(target=="#id1"){
								idis=1;
								}
								else if(target=="#id2"){
								idis=2;
								}
								else if(target=="#id3"){
								idis=3;
								}
								else if(target=="#id4"){
								idis=4;
								}
								});
							});
						}
						}
					});
			
					// use the first element that is "scrollable"
					function scrollableElement(els) {
						for (var i = 0, argLength = arguments.length; i <argLength; i++) {
							var el = arguments[i],
							    $scrollElement = $(el);
							if ($scrollElement.scrollLeft()> 0) {
								return el;
			
							} else {
								$scrollElement.scrollLeft(1);
								var isScrollable = $scrollElement.scrollLeft()> 0;
								$scrollElement.scrollLeft(0);
								if (isScrollable) {
									return el;
			
								}
							}
						}
						//return []; //this is what it actually was
						return el;//this was initially empty
			
					}
					var idsoff=new Array();;
					var noofids=4;
					for (var i = 0; i < noofids; i++) {
						idsoff[i]=$(document.getElementById('id'+(i+1))).offset().left;
					};
					location.hash="#id1";
					idis=1;
					var targetOffset=0;
			
					var wait=0;
					$(document).keydown(function(e){
			
							if(wait==0){
							wait=1;
							if(e.keyCode==37 || e.keyCode==39){
							e.preventDefault();
							}
							else{
							wait=0;
							return ;
							}
							if (e.keyCode == 37 && idis==1) {//left
							wait=0;
							}
							else if(e.keyCode == 37){
								var target="#id";
								idis--;
								targetOffset=idsoff[idis-1];
								$(scrollElem).animate({scrollLeft: targetOffset}, 400, function() {
										wait=0;
										});
							}
							else if (e.keyCode == 39 && idis==noofids) {//right
								wait=0;
							}
							else if(e.keyCode == 39){
								var target="#id";
								idis++;
								targetOffset=idsoff[idis-1];
								$(scrollElem).animate({scrollLeft: targetOffset}, 400, function() {
										wait=0;         
										});
							}
							else{
								wait=0;
								return;
							}
							}
			
			
					});
			
			
			});
			
			
			
			
		</script>
		<script type="text/javascript">
			var varq=new Array();
			varq[0]='1';
			varq[1]='0';
			varq[2]='0';
			varq[3]='1';
			varq[4]='1';
			
			//this function is for hiding various divs once a click on fixed or variable option has been clicked
			function hide(n)
			{
			
				if(n=='1')
				{
					varq[0]='1';
					var a=document.getElementById('azifixed');
					a.style.display="none";
					a=document.getElementById('azivariable');
					a.style.display="block";
				}
				else if(n=='2'){
					varq[0]='0';
					var a=document.getElementById('azivariable');
					a.style.display="none";
					a=document.getElementById("azifixed");
					a.style.display="block";
				}
				else if(n=='3'){
					varq[1]='1';
					var a=document.getElementById('wwrfixed');
					a.style.display="none";
					a=document.getElementById('wwrvariable');
					a.style.display="block";
				}
				else if(n=='4'){
					varq[1]='0';
					var a=document.getElementById('wwrvariable');
					a.style.display="none";
					a=document.getElementById("wwrfixed");
					a.style.display="block";
				}
				else if(n=='5'){
					varq[2]='1';
					var a=document.getElementById('depthfixed');
					a.style.display="none";
					a=document.getElementById('depthvariable');
					a.style.display="block";
				}
				else if(n=='6'){
					varq[2]='0';
					var a=document.getElementById('depthvariable');
					a.style.display="none";
					a=document.getElementById("depthfixed");
					a.style.display="block";
				}
				else if(n=='7'){
					varq[3]='1';
					var a=document.getElementById('lbybratiofixed');
					a.style.display="none";
					a=document.getElementById('lbybratiovariable');
					a.style.display="block";
				}
				else if(n=='8'){
					varq[3]='0';
					var a=document.getElementById('lbybratiovariable');
					a.style.display="none";
					a=document.getElementById("lbybratiofixed");
					a.style.display="block";
				}
			}
			/*----------------- this function is to validate the form -------------------*/
			
			function validateForm(){
				var flag=0;//the flag makes sure that aleast on of the three parameters is a variable (out of azimuth, wwr and depth)
				var radios = document.getElementsByTagName('input');//stores all the tags with name input
				var value;//used to store temporary values
				for (var i = 0; i < radios.length; i++) {
					if (radios[i].type === 'radio' && radios[i].checked) {
						// get value, set checked flag or do whatever you need to
						value = radios[i].value;
						//alert(radios[i].name+value);
			
						//azimuth limitations
						if(radios[i].name==="azi_var_fix" && value==="variable"){
							flag=1;//set to 1 to tell that one variable quatity is found
							var div = document.getElementById('azivariable').getElementsByTagName('input');
							var k;
							var ini=0;
							var max=0;
							var min=0;
							for (k=0;k<div.length;k++)
							{
								if(div[k].name==="azi_ini_value"){
									ini=div[k].value;
									ini=Number(ini);
									alert(ini);
								}
								if(div[k].name==="azi_min_value"){
									min=div[k].value;
									min=Number(min);
								}
								if(div[k].name==="azi_max_value"){
									max=div[k].value;
									max=Number(max);
								}
								//values cannot be null
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								//min and maximum constraints for all values
								else if(div[k].value<0){
									alert(div[k].name+" negative value not possible");
									return false;
								}
								else if(div[k].value>360){
									alert(div[k].name+" value greater than 360 not possible");
									return false;
								}
							}
							//sees that ini is between min and max (both including)
							if(min<=ini && ini<=max);
							else{
								alert("initial value of azimuth should be between minimun and maximum");
								return false;
							}
							//if any of the above conditions are not false is sent to describe the first flaw that is found and sequencially all flaws are eliminated.
			
						}
						else if(radios[i].name==="azi_var_fix" && value==="fixed"){
							var div = document.getElementById('azifixed').getElementsByTagName('input');
							var k;
							for (k=0;k<div.length;k++)
							{
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								else if(div[k].value<0){
									alert(div[k].name+" negative value not possible");
									return false;
								}
								else if(div[k].value>360){
									alert(div[k].name+" value greater than 360 not possible");
									return false;
								}
							}
			
						}
			
						//wwr limitations
						if(radios[i].name==="wwr_var_fix" && value==="variable"){
							flag=1;
							var div = document.getElementById('wwrvariable').getElementsByTagName('input');
							var k;
							var ini=0;
							var max=0;
							var min=0;
							for (k=0;k<div.length;k++)
							{
								if(div[k].name==="wwr_ini_value"){
									ini=div[k].value;
									ini=Number(ini);
			
								}
								if(div[k].name==="wwr_min_value"){
									min=div[k].value;
									min=Number(min);
								}
								if(div[k].name==="wwr_max_value"){
									max=div[k].value;
									max=Number(max);
								}
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								else if(div[k].value<0){
									alert(div[k].name+" negative value not possible");
									return false;
								}
							}
							//sets constraints for min,max and initial values of the parameter to be in range of 10 and 90
							if(min<10 || min>90){
								alert("wwr min should be between 10 and 90");
								return false;
							}
							if(max<10 || max>90){
								alert("wwr max should be between 10 and 90");
								return false;
							}
							if(ini<10 || ini>90){
								alert("wwr ini should be between 10 and 90");
								return false;
							}
							if(min<=ini && ini<=max);
							else{
								alert("initial value of wwr should be between minimun and maximum");
								return false;
							}
			
						}
						else if(radios[i].name==="wwr_var_fix" && value==="fixed"){
							var div = document.getElementById('wwrfixed').getElementsByTagName('input');
							var k;
							for (k=0;k<div.length;k++)
							{
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								else if(div[k].value<10){
									alert(div[k].name+" value cannot be less than 10");
									return false;
								}
								else if(div[k].value>90){
									alert(div[k].name+" value cannot be more than 90");
									return false;
								}
							}
			
						}
			
						//overhang depth limitations
						if(radios[i].name==="depth_var_fix" && value==="variable"){
							flag=1;
							var div = document.getElementById('depthvariable').getElementsByTagName('input');
							var k;
							var ini=0;
							var max=0;
							var min=0;
							for (k=0;k<div.length;k++)
							{
								if(div[k].name==="depth_ini_value"){
									ini=div[k].value;
									ini=Number(ini);
								}
								if(div[k].name==="depth_min_value"){
									min=div[k].value;
									min=Number(min);
								}
								if(div[k].name==="depth_max_value"){
									max=div[k].value;
									max=Number(max);
								}
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								else if(div[k].value<0){
									alert(div[k].name+" negative value not possible");
									return false;
								}
							}
							//sets the constraints for the min,max and ini values to be in range of 0.1 and 3
							if(min<0.1 || min>3){
								alert("overhang depth min should be between 0.1 and 3");
								return false;
							}
							if(max<0.1 || max>3){
								alert("overhang max should be between 0.1 and 3");
								return false;
							}
							if(ini<0.1 || ini>3){
								alert("overhang ini should be between 0.1 and 3");
								return false;
							}
							if(min<=ini && ini<=max);
							else{
								alert("initial value of depth should be between minimun and maximum");
								return false;
							}
			
						}
						else if(radios[i].name==="depth_var_fix" && value==="fixed"){
							var div = document.getElementById('depthfixed').getElementsByTagName('input');
							var k;
							for (k=0;k<div.length;k++)
							{
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								else if(div[k].value<0.1){
									alert(div[k].name+" negative value not possible");
									return false;
								}
								else if(div[k].value<0.1){
									alert(div[k].name+" value cannot be less than 0.1");
									return false;
								}
								else if(div[k].value>3){
									alert(div[k].name+" value cannot be more than 3");
									return false;
								}
							}
			
						}
			
						//length/breadth ratio validation
			
						if(radios[i].name==="lbybratio_var_fix" && value==="variable"){
							flag=1;
							var div = document.getElementById('lbybratiovariable').getElementsByTagName('input');
							var k;
							var ini=0;
							var max=0;
							var min=0;
							for (k=0;k<div.length;k++)
							{
								if(div[k].name==="lbybratio_ini_value"){
									ini=div[k].value;
									ini=Number(ini);
								}
								if(div[k].name==="lbybratio_min_value"){
									min=div[k].value;
									min=Number(min);
								}
								if(div[k].name==="lbybratio_max_value"){
									max=div[k].value;
									max=Number(max);
								}
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								else if(div[k].value<0){
									alert(div[k].name+" negative value not possible");
									return false;
								}
							}
							//sets the constraints for the min,max and ini values to be in range of 0.1 and 3
							if(min<0.1 || min>10){
								alert("length/breadth ratio min should be between 0.1 and 10");
								return false;
							}
							if(max<0.1 || max>10){
								alert("length/breadth ratio max should be between 0.1 and 10");
								return false;
							}
							if(ini<0.1 || ini>10){
								alert("length/breadth ratio ini should be between 0.1 and 10");
								return false;
							}
							if(min<=ini && ini<=max);
							else{
								alert("initial value of length/breadth ratio should be between minimun and maximum");
								return false;
							}
			
						}
						else if(radios[i].name==="lbybratio_var_fix" && value==="fixed"){
							var div = document.getElementById('lbybratiofixed').getElementsByTagName('input');
							var k;
							for (k=0;k<div.length;k++)
							{
								if(div[k].value===''|| div[k].value===null){
									alert(div[k].name+" is left unfilled");
									return false;
								}
								else if(div[k].value<0.1){
									alert(div[k].name+" negative value not possible");
									return false;
								}
								else if(div[k].value<0.1){
									alert(div[k].name+" value cannot be less than 0.1");
									return false;
								}
								else if(div[k].value>10){
									alert(div[k].name+" value cannot be more than 10");
									return false;
								}
							}
			
						}
			
					}
				}
			
				if(flag==0){
					alert("atleast one should be variable");
					return false;
				}
				//tells that none of the variables are variable and all are fixed
				flag=0;
				var e = document.getElementById("windowtype1");
				var strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
				e = document.getElementById("windowtype2");
				strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
				e = document.getElementById("windowtype3");
				strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
				e = document.getElementById("windowtype4");
				strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
			
				if(flag===0){
					alert("aleast one window type has to be selected");
					return false;
				}
			
				return true;
			}
			
			
			function validateForm2(){
				var div = document.getElementById('azivariable2').getElementsByTagName('input');
				for (k=0;k<div.length;k++)
				{
					if(div[k].value===''|| div[k].value===null){
						alert(div[k].name+" is left unfilled");
						return false;
					}
				}
			
				var div = document.getElementById('wwrvariable2').getElementsByTagName('input');
				for (k=0;k<div.length;k++)
				{
					if(div[k].value===''|| div[k].value===null){
						alert(div[k].name+" is left unfilled");
						return false;
					}
				}
			
				//overhang depth limitations
				var div = document.getElementById('depthvariable2').getElementsByTagName('input');
				for (k=0;k<div.length;k++)
				{
					if(div[k].value===''|| div[k].value===null){
						alert(div[k].name+" is left unfilled");
						return false;
					}
				}
			
				//length/breadth ratio validation
				var div = document.getElementById('lbybratiovariable2').getElementsByTagName('input');
				for (k=0;k<div.length;k++)
				{
					if(div[k].value===''|| div[k].value===null){
						alert(div[k].name+" is left unfilled");
						return false;
					}
				}
				var checkboxes = document.getElementsByTagName('input');
				var flag=0;//used to find if atleast one of the glass types is selected
				flag=0;
				var e = document.getElementById("windowtype21");
				var strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
				e = document.getElementById("windowtype22");
				strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
				e = document.getElementById("windowtype23");
				strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
				e = document.getElementById("windowtype24");
				strUser = e.options[e.selectedIndex].value;
				if(strUser==0){
				}
				else{
					flag=1;
				}
			
				if(flag===0){
					alert("aleast one window type has to be selected");
					return false;
				}
				return true;
			}
			
			// variable to hold request
			var request;
			// bind to the submit event of our form
			$(document).ready(function(){
			
					$("#frm1").submit(function(event){
						alert("sneding");
						var correct=validateForm();
						if(correct==false){
						return false;
						}
						alert("sneding");
						var unique_counter=guid();
						var str="";
						for(var i=0; i < 5; i++){
						str+=varq[i];
						}
						var address="./mycommand_file_generator.php?unique_counter="+unique_counter+"&var_quantities="+str;
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
			
			var address2="./displaygenopt.php?unique_counter="+unique_counter+"&var_quantities="+str;
			//alert(address2);
			
			document.getElementById("iframe2").src=address2;
			
			
			
			// prevent default posting of form
			event.preventDefault();
			});
			
			
			var nooftimes=0;
			$("#frm2").submit(function(event){
					var correct=validateForm2();
					if(correct==false){
					return false;
					}
					nooftimes++;
					var unique_counter=guid();
					var address="./mycommand_file_generator2.php?unique_counter="+unique_counter;
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
			
			var address2="./displayparametric.php?unique_counter="+unique_counter;
			//alert(address2);
			
			document.getElementById("iframe1").src=address2;
			
			
			
			// prevent default posting of form
			event.preventDefault();
			});
			
			//this function is for toggling the view of parametric simulations on checking or unchecking the check box
			$("#non_parametric").click(function() {
			    // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
			    if($(this).is(":checked")) // "this" refers to the element that fired the event
			    {
					document.getElementById("id2").style.display="block";
					document.getElementById("id4").style.display="block";
			    }
			    else{
					document.getElementById("id2").style.display="none";
					document.getElementById("id4").style.display="none";
			    }
			});
			
			
			});
			
		</script> 
	</head>
	<body style="font-family:Arial ;">
		<div id="id0" style="height:850px;margin-top: -20px;">
			<div id="id1" style="background-color: #014051;height:100%;width:1300px;float:left;padding: 10px;">
				<table style="width: 100%; text-align: left; margin-right: auto;">
					<tbody>
						<tr>
							<td style="width: 100%; margin-top: -5px; text-align: center; vertical-align: middle; background-color: black;">
								<h1 class="a0" style="height: 26px; background-color: black;">WinOpt -
									Window Optimization Tool 
								</h1>
							</td>
						</tr>
					</tbody>
				</table>
				<form id="frm1" name="data" method="post">
					<table style="width: 100%; vertical-align: top;">
						<tbody>
							<tr>
								<td> &nbsp; &nbsp; &nbsp; &nbsp; </td>
								<td style="width:1250px">
									<table style="width: 100%; vertical-align: top;">
										<tbody>
											<tr>
												<td style="width: 30%;"><br>
												</td>
												<td style="width: 40px;"><br>
												</td>
												<td style="margin-left: 0px; width: 30%;"><br>
												</td>
												<td style="width: 40px;"><br>
												</td>
												<td style="width: 30%;"><br>
												</td>
											</tr>
											<tr>
												<td colspan="5" style="color:white;font-size:20px;width:100%;">
													<table>
														<tr>
															<td>
																Select Your Location 
																<select id="ddlViewBy" name="location1">
																	<option value="1">New Delhi</option>
																	<option value="2" selected="selected">Hyderabad</option>
																	<option value="3">Kolkata</option>
																	<option value="4">Banglore</option>
																</select>
															</td>
															<td>
																Total Length<input type="text" name="total_length" value="10">
															</td>
															<td>
																Total Breadth <input type="text" name="total_breadth" value="10">
															</td>
															<td>
																Area to be covered<input type="text" name="total_area" value="50">
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td colspan="5"><br></td>
											</tr>
											<tr  style="height:260px; ">
												<td style="vertical-align: top; background-color: #0099ac; color: white;">
													<table style="width: 100%;text-align: left; margin-left: auto; margin-right: auto; background-color:#0099ac">
														<tbody>
															<tr style="vertical-align: top;">
																<td class="a2" style="width: 100%; text-align: center; vertical-align: top;">Azimuth
																	Angle 
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<table style="width: 100%;">
														<tbody>
															<tr>
																<td> <input name="azi_var_fix" value="fixed" onclick="hide('2')"
																	type="radio">Fixed </td>
																<td> <input name="azi_var_fix" value="variable" onclick="hide('1')"
																	checked="checked" type="radio">
																	Variabe 
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<div id="azivariable">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td>Initial Value </td>
																	<td><input name="azi_ini_value" value="90" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Minimum Value </td>
																	<td><input name="azi_min_value" value="0" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Maximum Value</td>
																	<td><input name="azi_max_value" value="360" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Step Value </td>
																	<td><input name="azi_step_value" value="90" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
													<div id="azifixed" style="display: none;">
														<table style="width:100%">
															<tbody>
																<tr>
																	<td>
																		Value
																	</td>
																	<td>
																		<input name="azi_value" value="90" min="0.0" max="360.0"
																			step="any" type="number"><br>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</td>
												<td style="width: 41px;"><br></td>
												<td style="vertical-align: top; background-color: #5737b2; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#5737b2;">
														<tbody>
															<tr>
																<td class="a2" style="width: 100%; text-align: center;">WWR</td>
															</tr>
														</tbody>
													</table>
													<br>
													<table style="width: 100%;">
														<tbody>
															<tr>
																<td> <input name="wwr_var_fix" value="fixed" onclick="hide('4')"
																	checked="checked" type="radio">Fixed</td>
																<td> <input name="wwr_var_fix" value="variable" onclick="hide('3')"
																	type="radio">Variabe</td>
															</tr>
														</tbody>
													</table>
													<div id="wwrvariable" style="display: none;">
														<br>
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td colspan="2"><input name="diff_wwr" id="diff_wwr" style="" checked="checked" type="checkbox">
																		Have Different WWR for each wall
																	</td>
																</tr>
																<tr>
																	<td>Initial Value </td>
																	<td><input name="wwr_ini_value" value="40" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Minimum Value </td>
																	<td><input name="wwr_min_value" value="20" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Maximum Value</td>
																	<td><input name="wwr_max_value" value="80" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Step Value </td>
																	<td><input name="wwr_step_value" value="10" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
													<div id="wwrfixed">
														<br>
														<table style="width:100%">
															<tbody>
																<tr>
																	<td>
																		Value
																	</td>
																	<td>
																		<input name="wwr_value" value="90" min="10.0" max="90.0"
																			step="any" type="number"><br>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
													<br>
												</td>
												<td style="width: 40px;"><br></td>
												<td style="vertical-align: top; background-color: #da542e; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#da542e">
														<tbody>
															<tr>
																<td class="a2" style="width: 100%; text-align: center;">Overhang
																	Depth
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<table style="width: 100%;">
														<tbody>
															<tr>
																<td><input name="depth_var_fix" value="fixed" onclick="hide('6')"
																	checked="checked" type="radio">Fixed</td>
																<td> <input name="depth_var_fix" value="variable" onclick="hide('5')"
																	type="radio">Variabe</td>
															</tr>
														</tbody>
													</table>
													<br>
													<div id="depthvariable" style="display: none;">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td>Initial Value </td>
																	<td><input name="depth_ini_value" value="0.5" min="0.1"
																		max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Minimum Value </td>
																	<td><input name="depth_min_value" value="0.2" min="0.1"
																		max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Maximum Value</td>
																	<td><input name="depth_max_value" value="1" min="0.1"
																		max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Step Value </td>
																	<td><input name="depth_step_value" value="0.1" min="0.1"
																		max="3.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
													<div id="depthfixed">
														<table style="width:100%">
															<tbody>
																<tr>
																	<td>
																		Value
																	</td>
																	<td>
																		<input name="depth_value" value="1" min="0.1" max="3.0" step="any"
																			type="number"><br>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
													<br>
												</td>
												<!--put td here -->
											</tr>
											<tr>
												<td colspan="5"> <br></td>
											</tr>
											<tr style="height:260px;">
												<td style="vertical-align: top; background-color: #bf1f4b; color: white;">
													<table style="width: 100% ; background-color:#bf1f4b;">
														<tbody>
															<tr>
																<td style="width: 100%; text-align: center;vertical-align: top;"
																	class="a4">Aspect Ratio</td>
															</tr>
														</tbody>
													</table>
													<br>
													<table style="width: 100%;">
														<tbody>
															<tr>
																<td> <input name="lbybratio_var_fix" value="fixed"
																	onclick="hide('8')" type="radio">Fixed</td>
																<td> <input name="lbybratio_var_fix" value="variable"
																	onclick="hide('7')" checked="checked" type="radio">
																	Variable
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<div id="lbybratiovariable">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td>Initial Value</td>
																	<td><input name="lbybratio_ini_value" value="1" min="0.1"
																		max="10.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Minimum Value </td>
																	<td><input name="lbybratio_min_value" value="0.1"
																		min="0.1" max="10.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Maximum Value </td>
																	<td><input name="lbybratio_max_value" value="10" min="0.1"
																		max="10.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Step Value </td>
																	<td><input name="lbybratio_step_value" value="0.5"
																		min="0.1" max="10.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
													<div id="lbybratiofixed" style="display: none;">
														<table style="width:100%">
															<tbody>
																<tr>
																	<td>
																		Value
																	</td>
																	<td>
																		<input name="lbybratio_value" value="1" min="0.1" max="10.0" step="any" type="number"><br>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</td>
												<td> <br></td>
												<td style="width: 25%; vertical-align: top; background-color: #009f00; color: white;">
													<table style="width: 100%;background-color:#009f00">
														<tbody>
															<tr>
																<td style="width: 100%; text-align: center;" class="a4">Glass
																	Type 
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<table style="width: 100%;">
														<tbody>
															<tr>
																<td>
																	<select id="windowtype1" name="windowtype1">
																		<option value="0">None</option>
																		<option value="1" selected="selected">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<select id="windowtype2" name="windowtype2">
																		<option value="0">None</option>
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2" selected="selected">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<select id="windowtype3" name="windowtype3">
																		<option value="0">None</option>
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3" selected="selected">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<select id="windowtype4" name="windowtype4">
																		<option value="0">None</option>
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4" selected="selected">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<br>
												</td>
												<td><br></td>
												<td style="vertical-align: top; background-color: #a101a8; color: white;">
													<table style="width: 100%; background-color: #a101a8; height: 35px;">
														<tbody>
															<tr>
																<td class="a6" style="text-align: center;">OptimizationParameter<br></td>
															</tr>
														</tbody>
													</table>
													<table>
														<tbody>
															<tr>
																<td><br></td>
																<td><br></td>
															</tr>
															<tr>
																<td><br></td>
																<td> <input name="optimisevar_var_fix" value="variable"
																	onclick="hide('9')" checked="checked" type="radio">Operational
																	Energy
																</td>
															</tr>
															<tr>
																<td> <br></td>
																<td style="height: 19px;"> <input name="optimisevar_var_fix"
																	value="fixed" onclick="hide('10')" type="radio">Life
																	Cycle Energy<br>
																</td>
															</tr>
															<tr>
																<td style="height: 19px;"><br></td>
																<td> <input name="optimisevar_var_fix" value="fixed"
																	onclick="hide('10')" type="radio">Life Cycle
																	Cost<br>
																</td>
															</tr>
															<tr>
																<td> <br></td>
																<td> <input name="optimisevar_var_fix" value="fixed"
																	onclick="hide('11')" type="radio">Operational
																	Cost<br>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td><br></td>
								<td> </td>
								<td><br></td>
							</tr>
						</tbody>
					</table>
					<table style="width: 100%;background-color: rgb(0, 51, 0);">
						<tbody>
							<tr style="width: 100%;">
								<td style="color:white;width:3%">
									<input id="non_parametric" style="" checked="checked"
										value="perform_parametric_simulation" type="checkbox">
								</td>
								<td  style="color:white;width:45%">
									Perform Parametric Optimization
								</td>
								<td style="width=65%;">
									<input value="submit" type="submit">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			<a href="#id2" style="float:left;margin-top:30px">second</a>
			<div id="id2" style="background-color:#014051;height:100%;width:1300px;float:left;padding: 10px;">
				<table style="width: 100%; text-align: left; margin-right: auto;">
					<tbody>
						<tr style="height: 60%;">
							<td style="width: 100%; margin-top: -5px; text-align: center; vertical-align: middle; background-color: black;">
								<h1 class="a0" style="height: 26px; background-color: black;">WinOpt -
									Window Optimization Tool ( Parametric )
								</h1>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- <div id="id3" style="background-color:grey;height:100%;width:1300px;float:left;margin-top: 20px;">
					-->
				<form id="frm2" name="data" method="post">
					<table style="width: 100%; vertical-align: top;">
						<tbody>
							<tr>
								<td> &nbsp; &nbsp; &nbsp; &nbsp; </td>
								<td>
									<table style="width: 100%; vertical-align: top;">
										<tbody>
											<tr>
												<td style="width: 30%;"><br></td>
												<td style="width: 41px;"><br></td>
												<td style="margin-left: 0px; width: 30%;"><br></td>
												<td style="width: 40px;"><br></td>
												<td style="width: 30%;"><br></td>
											</tr>
											<tr>
												<td colspan="5" style="color:white;font-size:20px">
													<table>
														<tr>
															<td>
																Select Your Location
																<select id="ddlViewBy2" name="location2">
																	<option value="1">New Delhi</option>
																	<option value="2" selected="selected">Hyderabad</option>
																	<option value="3">Kolkata</option>
																	<option value="4">Banglore</option>
																</select>
															</td>
															<td>Length <input type="text" name="ptotal_length">
															</td>
															<td>Breadth <input type="text" name="ptotal_breadth">
															</td>
															<td>
																Area <input type="text" name="ptotal_area">
															</td>
														</tr>
													</table>
											</tr>
											<tr>
												<td colspan="5"><br></td>
											</tr>
											<tr>
												<td style="vertical-align: top; background-color: #0099ac; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#0099ac">
														<tbody>
															<tr style="vertical-align: top;">
																<td class="a2" style="width: 100%; text-align: center; vertical-align: top;">Azimuth
																	Angle 
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<br>
													<div id="azivariable2">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td>First Value </td>
																	<td><input name="azi1" value="90" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Second Value </td>
																	<td><input name="azi2" value="0" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Third Value</td>
																	<td><input name="azi3" value="360" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</td>
												<td style="width: 41px;"><br></td>
												<td style="vertical-align: top; background-color: #5737b2; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#5737b2;">
														<tbody>
															<tr>
																<td class="a2" style="width: 100%; text-align: center;vertical-align: top;">WWR</td>
															</tr>
														</tbody>
													</table>
													<br>
													<div id="wwrvariable2">
														<br>
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td>First Value </td>
																	<td><input name="wwr1" value="40" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Second Value </td>
																	<td><input name="wwr2" value="20" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Third Value</td>
																	<td><input name="wwr3" value="80" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
													<br>
												</td>
												<td style="width: 40px;"><br></td>
												<td style="vertical-align: top; background-color: #da542e; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#da542e">
														<tbody>
															<tr>
																<td class="a2" style="width: 100%; text-align: center;">Overhang
																	Depth
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<br>
													<div id="depthvariable2">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td>First Value </td>
																	<td><input name="depth1" value="0.5"
																		min="0.1" max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Second Value </td>
																	<td><input name="depth2" value="0.2"
																		min="0.1" max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Third Value</td>
																	<td><input name="depth3" value="1" min="0.1"
																		max="3.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
													<br>
												</td>
												<!--put td here -->
											</tr>
											<tr>
												<td colspan="5"> <br></td>
											</tr>
											<tr>
												<td style="vertical-align: top; background-color:  #bf1f4b; color: white;">
													<table style="width: 100% ; background-color: #bf1f4b;">
														<tbody>
															<tr>
																<td style="width: 100%; text-align: center;vertical-align: top;"
																	class="a4">Aspect Ratio</td>
															</tr>
														</tbody>
													</table>
													<br>
													<br>
													<div id="lbybratiovariable2">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td>First Value</td>
																	<td><input name="lbybratio1" value="1"
																		min="0.1" max="10.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Second Value </td>
																	<td><input name="lbybratio2" value="0.1"
																		min="0.1" max="10.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td>Third Value </td>
																	<td><input name="lbybratio3" value="10"
																		min="0.1" max="10.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</td>
												<td> <br></td>
												<td style="width: 25%; vertical-align: top; background-color: #009f00; color: white;">
													<table style="width: 100%;background-color:#009f00">
														<tbody>
															<tr>
																<td style="width: 100%; text-align: center;" id="a5">Glass
																	Type 
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<table style="width: 100%;">
														<tbody>
															<tr>
																<td>
																	<select id="windowtype21" name="windowtype21">
																		<option value="1" selected="selected">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<select id="windowtype22" name="windowtype22">
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2" selected="selected">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<select id="windowtype23" name="windowtype23">
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3" selected="selected">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td>
																	<select id="windowtype24" name="windowtype24">
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4" selected="selected">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																	</select>
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													<br>
												</td>
												<td><br></td>
												<td style="vertical-align: top; background-color: #a101a8;color: white;">
													<table style="width: 100%; background-color: #a101a8; height: 35px;">
														<tbody>
															<tr>
																<td class="a6" style="text-align: center;">Optimization
																	Parameter<br>
																</td>
															</tr>
														</tbody>
													</table>
													<table>
														<tbody>
															<tr>
																<td><br></td>
																<td><br></td>
															</tr>
															<tr>
																<td><br></td>
																<td> <input name="optimisevar_var_fix" value="variable"
																	onclick="" checked="checked" type="radio">Operational
																	Energy
																</td>
															</tr>
															<tr>
																<td> <br></td>
																<td style="height: 19px;"> <input name="optimisevar_var_fix"
																	value="fixed" onclick="" type="radio">Life
																	Cycle Energy<br>
																</td>
															</tr>
															<tr>
																<td style="height: 19px;"><br></td>
																<td> <input name="optimisevar_var_fix" value="fixed"
																	onclick="" type="radio">Life Cycle
																	Cost<br>
																</td>
															</tr>
															<tr>
																<td> <br></td>
																<td> <input name="optimisevar_var_fix" value="fixed"
																	onclick="" type="radio">Operational
																	Cost<br>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td><br></td>
								<td> <br></td>
								<td><br></td>
							</tr>
						</tbody>
					</table>
					<table style="width: 100%;">
						<tbody>
							<tr>
								<td style="background-color: rgb(0, 51, 0);text-align: center;"><input value="submit" type="submit">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			<a href="#id3" style="float:left;margin-top:30px">third</a>
			<div id="id3" style="height:100%;width:1300px;float:left;margin-top: 20px;"><iframe id="iframe2" src="./displaygenopt.php?unique_counter=a57dedcc-3975-a896-cb7f-ab0eee901e7d&amp;var_quantities=11111" style="position:relative;left:10%;width:80%;height:100%"></iframe></div>
			<a href="#id4" style="float:left;margin-top:30px">fourth</a>
			<div id="id4" style="height:100%;width:1300px;float:left;margin-top: 20px;"><iframe id="iframe1" src="./displayparametric.php?unique_counter=f392a91b-564d-6aca-8c66-f14a7b6eb8b3/" style="position:relative;left:10%;width:80%;height:100%"></iframe></div>
			<a href="#id1" style="float:left;margin-top:30px">first</a>
			<!--  final div ends -->
		</div>
	</body>
</html>
<!-- The Tool has been created by Abhishek Mittal and Rounak Patni under the guidance and supervision of Dr. Vishal Garg, Rathish Sir and Aviruch Sir -->