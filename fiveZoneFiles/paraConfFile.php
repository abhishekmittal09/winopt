<?php

//----------------------CONFIGURATION PARAMETERS---------------------------------

$php_file_location = "./fiveZoneFiles/";
$template_file_location = "./templateOffice.idf";
$template_file_write_location = "./templateOfficeOut.idf";
$working_directory_location_parametric = "./working_directory/parametric/";

//-----------------------CONSTANTS NEEDED FOR CALCULATIONS-------------------------
$l=50;
$b=30;
$ptotal_area = $l*$b;
$t=6;
$h=4;
$t_root=$t/(sqrt(2));
$unique_counter="123456";
$working_dir = $working_directory_location_parametric.$unique_counter;

//value of wwr and aspect ratio has been used directly to make the idf files and hence no changes to wwr and aspect ratio are reqd to be made in displayparametric

/*
"batch" means more than one simulation is allowed.
"specific" means that entire simulation data is given perform simulation based on that.
*/
$simulationType = "specific";//accepted values, "batch" or "specific"
$numberSimulations = 2;//tells the number of simulations to be performed.

$au_factor= array(1.5,1.5,3.72,5.7,3.3);
$ashgc= array(0.20,0.25,0.28,0.67,0.85);
$avlt= array(0.35,0.50,0.27,0.67,0.85);

$azi=array(90,0,180,45,135);
$wwr=array(40,20,50,60,80);
$depth=array(0.3,0.5,0.8,1.2,1.5);
$lbybratio=array(0.6,1.0,1.3,1.5,1.8);

$hvactype2=6;
$location2=2;

$inputPara[0]=array('azi' => 90,
					'wwr' => 34,
					'depth' => 0.3,
					'ratio' => 1,
					'shgc' => 0.20,
					'ufactor' => 1.5,
					'vlt' => 0.35,
				);

$inputPara[1]=array('azi' => 45,
					'wwr' => 20,
					'depth' => 0.3,
					'ratio' => 1,
					'shgc' => 0.20,
					'ufactor' => 1.5,
					'vlt' => 0.35,
				);

?>