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
$unique_counter="12345";
$working_dir = $working_directory_location_parametric.$unique_counter;

//value of wwr and aspect ratio has been used directly to make the idf files and hence no changes to wwr and aspect ratio are reqd to be made in displayparametric

/*
"batch" means more than one simulation is allowed.
"single" means only single simulation is allowed.
*/
$simulationType = "single";//accepted values, "batch" or "single" or "array"
$numberSimulations = 1;//tells the number of simulations to be performed.

$au_factor= array(1.5,1.5,3.72,5.7,3.3);
$ashgc= array(0.20,0.25,0.28,0.67,0.85);
$avlt= array(0.35,0.50,0.27,0.67,0.85);

$azi=array(90,0,180,45,135);
$wwr=array(40,20,50,60,80);
$depth=array(0.3,0.5,0.8,1.2,1.5);
$lbybratio=array(0.6,1.0,1.3,1.5,1.8);

$hvactype2=6;
$location2=2;

extract($_POST);
extract($_GET);

echo $unique_counter;

$old = umask(0);
$working_dir = $working_directory_location_parametric.$unique_counter;
mkdir( $working_dir, 0777  ) or die("Can not create working directory");//a working directory is made for every user where data related to him would be stored
umask($old);


sort($azi);
sort($wwr);
sort($depth);
sort($lbybratio);

$aazimuth = $azi;
$awwr = $wwr;
$adepth= $depth;
$aratio = $lbybratio;

/* Putting the required HAVC into the building */


function addhvac($template_file_data,$hvactype2){

	if($hvactype2==5){
  $template_file_data=$template_file_data."!-   ===========  ALL OBJECTS IN CLASS: HVACTEMPLATE:ZONE:PTAC ===========
HVACTemplate:Zone:PTAC,
    Testzone,                !- Zone Name
    Thermostat_test,         !- Template Thermostat Name
    autosize,                !- Cooling Supply Air Flow Rate {m3/s}
    autosize,                !- Heating Supply Air Flow Rate {m3/s}
    ,                        !- No Load Supply Air Flow Rate {m3/s}
    1.2,                     !- Zone Heating Sizing Factor
    1.2,                     !- Zone Cooling Sizing Factor
    Sum,                     !- Outdoor Air Method
    0.00944,                 !- Outdoor Air Flow Rate per Person {m3/s}
    0.01,                    !- Outdoor Air Flow Rate per Zone Floor Area {m3/s-m2}
    ,                        !- Outdoor Air Flow Rate per Zone {m3/s}
    ,                        !- System Availability Schedule Name
    Fan sch,                 !- Supply Fan Operating Mode Schedule Name
    DrawThrough,             !- Supply Fan Placement
    0.7,                     !- Supply Fan Total Efficiency
    75,                      !- Supply Fan Delta Pressure {Pa}
    0.9,                     !- Supply Fan Motor Efficiency
    SingleSpeedDX,           !- Cooling Coil Type
    ,                        !- Cooling Coil Availability Schedule Name
    autosize,                !- Cooling Coil Rated Capacity {W}
    autosize,                !- Cooling Coil Rated Sensible Heat Ratio
    3,                       !- Cooling Coil Rated COP {W/W}
    Electric,                !- Heating Coil Type
    ,                        !- Heating Coil Availability Schedule Name
    autosize,                !- Heating Coil Capacity {W}
    0.8,                     !- Gas Heating Coil Efficiency
    ,                        !- Gas Heating Coil Parasitic Electric Load {W}
    ,                        !- Dedicated Outdoor Air System Name
    SupplyAirTemperature,    !- Zone Cooling Design Supply Air Temperature Input Method
    14.0,                    !- Zone Cooling Design Supply Air Temperature {C}
    ,                        !- Zone Cooling Design Supply Air Temperature Difference {deltaC}
    SupplyAirTemperature,    !- Zone Heating Design Supply Air Temperature Input Method
    50.0,                    !- Zone Heating Design Supply Air Temperature {C}
    ;                        !- Zone Heating Design Supply Air Temperature Difference {deltaC}
    ";
	}

	else{
$template_file_data=$template_file_data."!-   ===========  ALL OBJECTS IN CLASS: HVACTEMPLATE:ZONE:PTHP ===========
HVACTemplate:Zone:PTHP,
    Testzone,                !- Zone Name
    Thermostat_test,         !- Template Thermostat Name
    autosize,                !- Cooling Supply Air Flow Rate {m3/s}
    autosize,                !- Heating Supply Air Flow Rate {m3/s}
    ,                        !- No Load Supply Air Flow Rate {m3/s}
    1.25,                    !- Zone Heating Sizing Factor
    1.15,                    !- Zone Cooling Sizing Factor
    Sum,                     !- Outdoor Air Method
    0.00944,                 !- Outdoor Air Flow Rate per Person {m3/s}
    0.01,                    !- Outdoor Air Flow Rate per Zone Floor Area {m3/s-m2}
    ,                        !- Outdoor Air Flow Rate per Zone {m3/s}
    ,                        !- System Availability Schedule Name
    Fan sch,                 !- Supply Fan Operating Mode Schedule Name
    DrawThrough,             !- Supply Fan Placement
    0.7,                     !- Supply Fan Total Efficiency
    75,                      !- Supply Fan Delta Pressure {Pa}
    0.9,                     !- Supply Fan Motor Efficiency
    SingleSpeedDX,           !- Cooling Coil Type
    ,                        !- Cooling Coil Availability Schedule Name
    autosize,                !- Cooling Coil Rated Capacity {W}
    autosize,                !- Cooling Coil Rated Sensible Heat Ratio
    3,                       !- Cooling Coil Rated COP {W/W}
    SingleSpeedDXHeatPump,   !- Heat Pump Heating Coil Type
    ,                        !- Heat Pump Heating Coil Availability Schedule Name
    autosize,                !- Heat Pump Heating Coil Rated Capacity {W}
    2.75,                    !- Heat Pump Heating Coil Rated COP {W/W}
    -8,                      !- Heat Pump Heating Minimum Outdoor Dry-Bulb Temperature {C}
    5,                       !- Heat Pump Defrost Maximum Outdoor Dry-Bulb Temperature {C}
    ReverseCycle,            !- Heat Pump Defrost Strategy
    Timed,                   !- Heat Pump Defrost Control
    0.058333,                !- Heat Pump Defrost Time Period Fraction
    Electric,                !- Supplemental Heating Coil Type
    ,                        !- Supplemental Heating Coil Availability Schedule Name
    autosize,                !- Supplemental Heating Coil Capacity {W}
    21,                      !- Supplemental Heating Coil Maximum Outdoor Dry-Bulb Temperature {C}
    0.8,                     !- Supplemental Gas Heating Coil Efficiency
    ,                        !- Supplemental Gas Heating Coil Parasitic Electric Load {W}
    ,                        !- Dedicated Outdoor Air System Name
    SupplyAirTemperature,    !- Zone Cooling Design Supply Air Temperature Input Method
    14,                      !- Zone Cooling Design Supply Air Temperature {C}
    11.11,                   !- Zone Cooling Design Supply Air Temperature Difference {deltaC}
    SupplyAirTemperature,    !- Zone Heating Design Supply Air Temperature Input Method
    50,                      !- Zone Heating Design Supply Air Temperature {C}
    30;                      !- Zone Heating Design Supply Air Temperature Difference {deltaC}
    ";
	}

	return $template_file_data;

}

echo "sizeof ".sizeof($aazimuth).sizeof($awwr).sizeof($adepth).sizeof($aratio).sizeof($ashgc);

$file=$template_file_location;
$file1 = fopen($file, "r") or die("can't open template file for reading");
$temp_template_file_data = fread($file1, filesize($file));//stores the data of template file in a variable
fclose($file1);

$filesave=fopen($working_dir."/parametricvalues.txt",'w');
$filecontent="";
$fileno=1;

for($x=0;$x<sizeof($aazimuth);$x++)
{
	for($y=0;$y<sizeof($awwr);$y++)
	{
		for($z=0;$z<sizeof($adepth);$z++)
		{
			for($w=0;$w<sizeof($aratio);$w++)
			{
				for($v=0;$v<sizeof($ashgc);$v++)
				{
					
					$filecontent=$filecontent.$aazimuth[$x];		
					$filecontent=$filecontent." ".$awwr[$y];		
					$filecontent=$filecontent." ".$adepth[$z];		
					$filecontent=$filecontent." ".$aratio[$w];		
					$filecontent=$filecontent." ".$ashgc[$v];		
					$filecontent=$filecontent." ".$au_factor[$v];		
					$filecontent=$filecontent." ".$avlt[$v];		
					$filecontent=$filecontent." \n"	;
					/*---------------------- store data of template file for every user in a variable--------------------*/

					$template_file_data = $temp_template_file_data;

					//$template_file_data=addhvac($template_file_data,$hvactype2);
					
					$template_file_data = str_replace(array('%azimuthAngle%'),array($aazimuth[$x]),$template_file_data);

					//aspect ratio start
					$l=sqrt($aratio[$w]*$ptotal_area);
					$b=$ptotal_area/$l;

					$template_file_data = str_replace(array('%l%', '%b%', '%h%', '%root%', '%lminusroot%', '%bminusroot%', '%lminustworoot%', '%bminustworoot%'),
						array($l, $b, $h, $t_root, $l-$t_root, $b-$t_root, $l-2*$t_root, $b-2*$t_root),
						$template_file_data);
					//aspect ratio end

					//wwr start
					$wwr1 = $awwr[$y];
					$winheightstart_1 = $h/2.0 - $wwr1*$h/200.0;
					$winheightend_1 = $h/2.0 + $wwr1*$h/200.0;
					$lminuspointzerofive = $l-0.05;
					$bminuspointzerofive = $b-0.05;

					$template_file_data = str_replace(
						array('%lminuspointzerofive%', '%winheightstart_1%', '%winheightend_1%'),
						array($lminuspointzerofive, $winheightstart_1, $winheightend_1),
						$template_file_data);

					$template_file_data = str_replace(
						array('%bminuspointzerofive%', '%winheightstart_2%', '%winheightend_2%'),
						array($bminuspointzerofive, $winheightstart_1, $winheightend_1),
						$template_file_data);

					$template_file_data = str_replace(
						array('%winheightstart_3%', '%winheightend_3%'),
						array($winheightstart_1, $winheightend_1),
						$template_file_data);

					$template_file_data = str_replace(
						array('%winheightstart_4%', '%winheightend_4%'),
						array($winheightstart_1, $winheightend_1),
						$template_file_data);
					//wwr end

					//overhang start
					$overhangHeight = $adepth[$z];
					$overhangPlusRoot = $overhangHeight + $t_root;
					$template_file_data = str_replace(
						array('%overhangHeight%', '%overhangPlusRoot%'),
						array($overhangHeight, $overhangPlusRoot),
						$template_file_data
                    );
					//overhang end

					//ufactor start
					$template_file_data=str_replace(array("%u_factor%"), array($au_factor[$v]),$template_file_data);
					$template_file_data=str_replace(array("%shgc%"), array($ashgc[$v]),$template_file_data);
					$template_file_data=str_replace(array("%vlt%"), array($avlt[$v]),$template_file_data);
					//ufactor end


					$file=$fileno.".idf";
					$file1 = fopen("$working_dir/$file", "w") or die("can't open abcde model template for writing");

					fwrite($file1,$template_file_data);
					fclose($file1);
					$fileno=$fileno+1;

				}


			}
		}
	}
}

fwrite($filesave,$filecontent);
fclose($filesave);


$cityname="Hyderabad.epw";
if($location2==1){
	$cityname="New_Delhi.epw";
}
else if($location2==2){
	$cityname="Hyderabad.epw";
}
else if($location2==3){
	$cityname="Kolkata.epw";
}
else if($location2==4){
	$cityname="Banglore.epw";
}

$host="localhost";
$port =5436;  //port number
$fp = fsockopen($host, $port, $errno, $errstr);
if( !$fp)
{
        die ("couldnot connect to server");
}
socket_set_timeout($fp, 300);
if (!$fp)
{
        $result = "Error: could not open socket connection";
        echo $result;
}
else
{
	$str="p".$php_file_location.$working_dir." ".$cityname;
        fputs ($fp, $str);
        $msg="";
        $msg=fgets($fp,17);
        sleep(5);
        echo "message from server.c is $msg <br>";
        if($msg!="")
        {
                //header("Location: mydisplay.php?unique_counter=".$unique_counter."&var_quantities=".$var_quantities);
        }

        close($fp);
}


?>

