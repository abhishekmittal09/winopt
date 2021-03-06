<?php

$unique_counter="a6f0eb35-00a0-de35-e541-2295ad61a265";
$unique_counter_gen="yoyo";
$var_quantities="11111";
extract($_GET);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=UTF-8" http-equiv="content-type">
		<title>eDOT</title>
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
			.contrast {
				-webkit-filter: contrast(160%);
			}

		</style>
		<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'> <!--abhilash-->
      <link rel="stylesheet" href="./css/pure-min.css">

<!--[if lte IE 8]>
        <link rel="stylesheet" href="/combo/1.11.5?/css/main-grid-old-ie.css&/css/main-old-ie.css&/css/home-old-ie.css&/css/rainbow/baby-blue.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="./css/1.11.5.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="./css/d.css">


		<script type="text/javascript" src="./graph/jquery.js"></script>
		<script type="text/javascript" src="./graph/winopt.js"></script>

	</head>

	<body style="font-family: 'Dosis', sans-serif;">
		<div id="id0" style="height:850px;margin-top: -20px;">
		<div id="id1" style="background-color: #191919;width:1300px;float:left;padding: 10px;">
			<table style="width: 100%; text-align: left; margin-right: auto;">
				<tbody>
					<tr>
						<td style="width: 100%; margin-top: -5px; text-align: left; vertical-align: middle; background-color: #191919;">
							<h1 class="a0" style="height: 26px; background-color: #191919; padding-left: 32px;">eDOT -
								Early Design Optimization Tool 
							</h1><br>
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
											<td style="width: 30%;"><br></td>
											<td style="width: 40px;"><br></td>
											<td style="margin-left: 0px; width: 30%;"><br></td>
											<td style="width: 40px;"><br></td>
											<td style="width: 30%;"><br></td>
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
														<div id="newadd">
															<td>
																Plot Length (meter)<input type="text" name="total_length" value="10">
															</td>
															<td>
																Plot Width (meter)<input type="text" name="total_breadth" value="10">
															</td>
															<td>
																Building Area (square meter)<input id="total_area" type="text" name="total_area" value="50">
															</td>
														</div>
													</tr>
												</table>
												</td>
										</tr>
										<tr>
											<td style="color:white;font-size:20px">
												Type of AC System
												<select id="hvactype" name="hvactype" style="width:300px">
													<option value="0">Window/Split air conditioner,  Heating source: Electric Heat Pump</option>
													<option value="1">Central VAV system with air cooled chiller, Heating Source : Electric Resistance</option>
													<option value="2">Central VAV system with water cooled screw chiller, Heating Source : Electric Resistance</option>
													<option value="3">Packaged rooftop air conditioner, Heating source: Electric Heat Pump</option>
													<option value="4">Unconditioned: No system</option>
													<option value="5">PTAC</option>
													<option value="6" selected="selected">PTHP</option>
												</select>												
											</td>
											<td colspan="4"></td>
										</tr>
										<tr><td colspan="5"><br></td></tr>
										<tr  style="height:260px; ">
										<td style="vertical-align: top; background-color: #CD0000; color: white;">
										<table style="width: 100%;text-align: left; margin-left: auto; margin-right: auto; background-color:#CD0000">
										<tbody>
										<tr style="vertical-align: top;">
										<td class="a2" style="width: 100%; text-align: center; vertical-align: top;">Azimuth
										Angle (degrees) 
										</td>
										</tr>
										</tbody>
										</table>
										<br>
										<table style="width: 100%;">
										<tbody>
										<tr>
										<td style='padding:0px 0px 0px 10px'> <input name="azi_var_fix" value="fixed" onclick="hide('2')"
											type="radio">Fixed </td>
										<td> <input name="azi_var_fix" value="variable" onclick="hide('1')"
											checked="checked" type="radio">
										Variable 
										</td>
										</tr>
										</tbody>
										</table>
										<br>
										<div id="azivariable">
										<table style="width: 100%;" >
										<tbody>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Initial Value </td>
										<td><input name="azi_ini_value" value="90" min="0.0"
											max="360.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Minimum Value </td>
										<td><input name="azi_min_value" value="0" min="0.0"
											max="360.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Maximum Value</td>
										<td><input name="azi_max_value" value="180" min="0.0"
											max="360.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Step Value </td>
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
										<td style="vertical-align: top; background-color: #008000; color: white;">
										<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#008000;">
										<tbody>
										<tr>
										<td class="a2" style="width: 100%; text-align: center;">Window to Wall Ratio (%)</td>
										</tr>
										</tbody>
										</table>
										<br>
										<table style="width: 100%;">
										<tbody>
										<tr>
										<td style='padding:0px 0px 0px 10px'> <input name="wwr_var_fix" value="fixed" onclick="hide('4')"
											checked="checked" type="radio">Fixed</td>
										<td> <input name="wwr_var_fix" value="variable" onclick="hide('3')"
											type="radio">Variable</td>
										</tr>
										</tbody>
										</table>
										<div id="wwrvariable" style="display: none;">
										<br>
										<table style="width: 100%;">
										<tbody>
										<tr>
										<td colspan="2"  style='padding:0px 0px 0px 10px'><input name="diff_wwr" id="diff_wwr" style="" checked="checked" type="checkbox" onclick="changediffwwr()">
										Have Different WWR for each wall
										</td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Initial Value </td>
										<td><input name="wwr_ini_value" value="40" min="10.0"
											max="90.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Minimum Value </td>
										<td><input name="wwr_min_value" value="20" min="10.0"
											max="90.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Maximum Value</td>
										<td><input name="wwr_max_value" value="80" min="10.0"
											max="90.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Step Value </td>
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
										<td style='padding:0px 0px 0px 10px'>
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
										<td style="vertical-align: top; background-color: #6A6A6A; color: white;">
										<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#6A6A6A">
										<tbody>
										<tr>
										<td class="a2" style="width: 100%; text-align: center;">Overhang
										Depth (meter)
										</td>
										</tr>
										</tbody>
										</table>
										<br>
										<table style="width: 100%;">
										<tbody>
										<tr>
										<td style='padding:0px 0px 0px 10px'><input name="depth_var_fix" value="fixed" onclick="hide('6')"
											checked="checked" type="radio">Fixed</td>
										<td> <input name="depth_var_fix" value="variable" onclick="hide('5')"
											type="radio">Variable</td>
										</tr>
										</tbody>
										</table>
										<br>
										<div id="depthvariable" style="display: none;">
										<table style="width: Overhang100%;">
										<tbody>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Initial Value </td>
										<td><input name="depth_ini_value" value="0.5" min="0.1"
											max="3.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Minimum Value </td>
										<td><input name="depth_min_value" value="0.2" min="0.1"
											max="3.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Maximum Value</td>
										<td><input name="depth_max_value" value="1" min="0.1"
											max="3.0" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Step Value </td>
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
										<td style='padding:0px 0px 0px 10px'>
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
										<td colspan="5"><br></td>
										</tr>
										<tr style="height:260px;">
										<td style="vertical-align: top; background-color: #0000FF; color: white;">
										<table style="width: 100% ; background-color:#0000FF;">
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
										<td style='padding:0px 0px 0px 10px'> <input name="lbybratio_var_fix" value="fixed"
											onclick="hide('8')" type="radio">Fixed</td>
										<td style='padding:0px 0px 0px 10px'> <input name="lbybratio_var_fix" value="variable"
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
										<td style='padding:0px 0px 0px 10px'>Initial Value</td>
										<td><input name="lbybratio_ini_value" value="1" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Minimum Value </td>
										<td><input name="lbybratio_min_value" value="1" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Maximum Value </td>
										<td><input name="lbybratio_max_value" value="2" step="any" type="number"></td>
										</tr>
										<tr>
										<td style='padding:0px 0px 0px 10px'>Step Value </td>
										<td><input name="lbybratio_step_value" value="0.5" step="any" type="number"></td>
										</tr>
										</tbody>
										</table>
										</div>
										<div id="lbybratiofixed" style="display: none;">
										<table style="width:100%">
										<tbody>
										<tr>
										<td style='padding:0px 0px 0px 10px'>
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
										<td style="width: 25%; vertical-align: top; background-color: #ff9900; color: white;">
										<table style="width: 100%;background-color:#ff9900">
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
										<td style='padding:0px 0px 0px 10px'>
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
										<td style='padding:0px 0px 0px 10px'>
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
										<td style='padding:0px 0px 0px 10px'>
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
										<td style='padding:0px 0px 0px 10px'>
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
										<td  style="vertical-align: top; background-color: #a101a8; color: white;"> 

										<table style="width: 100%; background-color: #a101a8; height: 35px;">
										<tbody>
										<tr>
										<td class="a6" style="text-align: center;">Optimize<br></td>
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
										<td style='padding:0px 0px 0px 10px'> <input name="optimisevar_var_fix" value="variable"
											onclick="hide('9')" checked="checked" type="radio">Operational
										Energy
										</td>
										</tr>
										<tr>
										<td> <br></td>
										<td  style='padding:0px 0px 0px 10px' style="height: 19px;"> <input name="optimisevar_var_fix"
											value="fixed" onclick="hide('10')" type="radio">Life
										Cycle Energy<br>
										</td>
										</tr>
										<tr>
										<td   style="height: 19px;"><br></td>
										<td style='padding:0px 0px 0px 10px'> <input name="optimisevar_var_fix" value="fixed"
											onclick="hide('10')" type="radio">Life Cycle
										Cost<br>
										</td>
										</tr>
										<tr>
										<td> <br></td>
										<td style='padding:0px 0px 0px 10px'> <input name="optimisevar_var_fix" value="fixed"
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
							<td style="position:relative; top: 100px;"><a href="#id2"><img src="./images/right.png" class="contrast"></a></td>
						</tr>
						<tr>
						<td><br></td>
						<td> </td>
						<td><br></td>
						</tr>
					</tbody>
				</table>
				<table style="width: 100%;background-color: #191919;">
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
			<div id="id2" style="background-color:#191919;height:100%;width:1300px;float:left;padding: 10px;">
				<table style="width: 100%; text-align: left; margin-right: auto;">
					<tbody>
						<tr style="height: 60%;">
							<td style="width: 100%; margin-top: -5px; text-align: left; vertical-align: middle; background-color: #191919;">
								<h1 class="a0" style="height: 26px; background-color: #191919; padding-left:23px;">eDOT -
									Early Design Optimization Tool ( Parametric )
								</h1><br>
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
								<td> &nbsp; &nbsp; &nbsp; &nbsp; </td>
								<td> &nbsp; &nbsp; &nbsp; &nbsp; </td>
								<td> &nbsp; &nbsp; &nbsp; &nbsp; </td>
								<td> &nbsp; &nbsp; &nbsp; &nbsp; </td>
								<td >
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
															<div id="pnewadd">
																<td>Plot Length (meter) <input type="text" name="ptotal_length" value="10">
																</td>
																<td>Plot Width (meter) <input type="text" name="ptotal_breadth" value="10">
																</td>
																<td>
															Building Area (square meter)<input type="text" name="ptotal_area" value="50">
																</td>
															</div>
														</tr>
													</table>
											</tr>
											<tr>
												<td style="color:white;font-size:20px">
												Type of AC System
												<select id="hvactype2" name="hvactype2" style="width:300px">
													<option value="0">Window/Split air conditioner,  Heating source: Electric Heat Pump</option>
													<option value="1">Central VAV system with air cooled chiller, Heating Source : Electric Resistance</option>
													<option value="2">Central VAV system with water cooled screw chiller, Heating Source : Electric Resistance</option>
													<option value="3">Packaged rooftop air conditioner, Heating source: Electric Heat Pump</option>
													<option value="4">Unconditioned: No system</option>
													<option value="5">PTAC</option>
													<option value="6" selected="selected">PTHP</option>
												</select>												
												</td>
												<td colspan="4"></td>
											</tr>
											<tr>
												<td colspan="5"> <br></td>
											</tr>

											<tr>
												<td style="vertical-align: top; background-color: #cd0000; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#cd0000">
														<tbody>
															<tr style="vertical-align: top;">
																<td class="a2" style="width: 100%; text-align: center; vertical-align: top;">Azimuth
																	Angle (degrees)
																</td>
															</tr>
														</tbody>
													</table>
													
													<br>
													<div id="azivariable2">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>First Value </td>
																	<td><input name="azi[]" value="90" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Second Value </td>
																	<td><input name="azi[]" value="0" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Third Value</td>
																	<td><input name="azi[]" value="180" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fourth Value</td>
																	<td><input name="azi[]" value="45" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fifth Value</td>
																	<td><input name="azi[]" value="135" min="0.0"
																		max="360.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</td>
												<td style="width: 41px;"><br></td>
												<td style="vertical-align: top; background-color: #008000; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#008000;">
														<tbody>
															<tr>
																<td class="a2" style="width: 100%; text-align: center;vertical-align: top;">Window to Wall Ratio (%)</td>
															</tr>
														</tbody>
													</table>
													<br>
													<div id="wwrvariable2">
														
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>First Value </td>
																	<td><input name="wwr[]" value="40" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Second Value </td>
																	<td><input name="wwr[]" value="20" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Third Value</td>
																	<td><input name="wwr[]" value="50" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fourth Value</td>
																	<td><input name="wwr[]" value="60" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fifth Value</td>
																	<td><input name="wwr[]" value="80" min="10.0"
																		max="90.0" step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
													<br>
												</td>
												<td style="width: 40px;"><br></td>
												<td style="vertical-align: top; background-color: #6a6a6a; color: white;">
													<table style="width: 100%; text-align: left; margin-left: auto; margin-right: auto; background-color:#6a6a6a;">
														<tbody>
															<tr>
																<td class="a2" style="width: 100%; text-align: center;">Overhang
																	Depth (meter)
																</td>
															</tr>
														</tbody>
													</table>
													
													<br>
													<div id="depthvariable2">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>First Value </td>
																	<td><input name="depth[]" value="0.3"
																		min="0.1" max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Second Value </td>
																	<td><input name="depth[]" value="0.5"
																		min="0.1" max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Third Value</td>
																	<td><input name="depth[]" value="0.8" min="0.1"
																		max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fourth Value</td>
																	<td><input name="depth[]" value="1.2" min="0.1"
																		max="3.0" step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fifth Value</td>
																	<td><input name="depth[]" value="1.5" min="0.1"
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
												<td style="vertical-align: top; background-color:  #0000ff; color: white;">
													<table style="width: 100% ; background-color: #0000ff;">
														<tbody>
															<tr>
																<td style="width: 100%; text-align: center;vertical-align: top;"
																	class="a4">Aspect Ratio</td>
															</tr>
														</tbody>
													</table>
													
													<br>
													<div id="lbybratiovariable2">
														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>First Value</td>
																	<td><input name="lbybratio[]" value="0.6"
																		step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Second Value </td>
																	<td><input name="lbybratio[]" value="1.0"
																		step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Third Value </td>
																	<td><input name="lbybratio[]" value="1.3"
																		step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fourth Value </td>
																	<td><input name="lbybratio[]" value="1.5"
																		step="any" type="number"></td>
																</tr>
																<tr>
																	<td style='padding:0px 0px 0px 10px'>Fifth Value </td>
																	<td><input name="lbybratio[]" value="1.8"
																		step="any" type="number"></td>
																</tr>
															</tbody>
														</table>
													</div>
												</td>
												<td> <br></td>
												<td style="width: 25%; vertical-align: top; background-color: #ff9900; color: white;">
													<table style="width: 100%;background-color:#ff9900">
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
																<td style='padding:0px 0px 0px 10px'>
																	<select id="windowtype21" name="windowtype21">
																		<option value="1" selected="selected">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																		<option value="5">U factor: 3.3; SHGC: 0.85; VLT: 0.85</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td style='padding:0px 0px 0px 10px'>
																	<select id="windowtype22" name="windowtype22">
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2" selected="selected">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																		<option value="5">U factor: 3.3; SHGC: 0.85; VLT: 0.85</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td style='padding:0px 0px 0px 10px'>
																	<select id="windowtype23" name="windowtype23">
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3" selected="selected">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																		<option value="5">U factor: 3.3; SHGC: 0.85; VLT: 0.85</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td style='padding:0px 0px 0px 10px'>
																	<select id="windowtype24" name="windowtype24">
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4" selected="selected">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																		<option value="5">U factor: 3.3; SHGC: 0.85; VLT: 0.85</option>
																	</select>
																</td>
															</tr>
															<tr>
																<td style='padding:0px 0px 0px 10px'>
																	<select id="windowtype25" name="windowtype25">
																		<option value="1">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
																		<option value="2">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
																		<option value="3">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
																		<option value="4">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
																		<option value="5" selected="selected">U factor: 3.3; SHGC: 0.85; VLT: 0.85</option>
																	</select>
																</td>
															</tr>
														</tbody>
													</table>
													<br>
													
												</td>
												<td><br></td>
												<!--<td style="vertical-align: top; background-color: #a101a8;color: white;">
													<table style="width: 100%; background-color: #a101a8; height: 35px;">
														<tbody>
															<tr>
																<td class="a6" style="text-align: center;">Optimize<br>
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
												</td>-->
											</tr>
										</tbody>
									</table>
								</td>
							<td style="position:relative; top: 100px;"><a href="#id3"><img src="./images/right.png" class="contrast"></td>
							<td style="position:relative; top: 100px;"><a href="#id3"></td>
							<td style="position:relative; top: 100px;"><a href="#id3"></td>
							<td style="position:relative; top: 100px;"><a href="#id3"></td>
							<td style="position:relative; top: 100px;"><a href="#id3"></a></td>

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
								<td style="background-color: #191919;text-align: center;"><input value="submit" type="submit">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
			<a href="#id3" style="float:left;margin-top:30px">third</a>
			<div id="id3" style="height:100%;width:1300px;float:left;margin-top: 20px;">
				<iframe id="iframe2" src="./displaygenopt_ver1.php?unique_counter=<?php echo $unique_counter_gen; ?>&amp;var_quantities=<?php echo $var_quantities; ?>&amp;total_area=50" style="position:relative;left:10%;width:80%;height:100%"></iframe>
				<div style="position:relative; height:100%; float: right;"><a href="#id4" style="position: relative; top:50%;"><img src="./images/right.png" class="contrast"></a></div>
			</div>
			<a href="#id4" style="float:left;margin-top:30px">fourth</a>
			<div id="id4" style="height:100%;width:1300px;float:left;margin-top: 20px;">
				<iframe id="iframe1" src="./displayparametric.php?unique_counter=<?php echo $unique_counter; ?>/" style="position:relative;left:10%;width:80%;height:100%"></iframe>
				<div style="position:relative; height:100%; float: right;"><a href="#id5" style="position: relative; top:50%;"><img src="./images/right.png" class="contrast"></a></div>
			</div>
			<a href="#id5" style="float:left;margin-top:30px">fifth</a>
			<div id="id5" style="height:100%;width:1300px;float:left;margin-top: 20px;">
				<div style="position:relative; height:100%; float: left;"><a href="#id4" style="position: relative; top:50%;"><img src="./images/left.png" class="contrast"></a></div>
				<iframe id="iframe1" src="./display3dbuilding.php?unique_counter=<?php echo $unique_counter; ?>/" style="position:relative;left:5%;width:90%;height:100%"></iframe>
			</div>
			<!--  final div ends -->
		</div>
	</body>
</html>
<!-- The Tool has been created by Abhishek Mittal and Rounak Patni under the guidance and supervision of Dr. Vishal Garg, Rathish Sir and Aviruch Sir -->
