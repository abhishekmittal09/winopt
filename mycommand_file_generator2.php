<?php

//value of wwr and aspect ratio has been used directly to make the idf files and hence no changes to wwr and aspect ratio are reqd to be made in displayparametric

$au_factor= array(1.5,1.5,3.72,5.7,3.3);
$ashgc= array(0.20,0.25,0.28,0.67,0.85);
$avlt= array(0.35,0.50,0.27,0.67,0.85);
$unique_counter="12345";
$azi=array(90,0,180,45,135);
$wwr=array(40,20,50,60,80);
$depth=array(0.3,0.5,0.8,1.2,1.5);
$lbybratio=array(0.6,1.0,1.3,1.5,1.8);

$hvactype2=6;
$ptotal_area=50;
$location2=2;
extract($_POST);
extract($_GET);

echo $unique_counter;

$old = umask(0);
mkdir("./working_directory/parametric/$unique_counter", 0777  ) or print "<br>Can not create working directory";//a working directory is made for every user where data related to him would be stored
umask($old);


sort($azi);
sort($wwr);
sort($depth);
sort($lbybratio);

$aazimuth = $azi;
$awwr = $wwr;
$adepth= $depth;
$aratio = $lbybratio;

print_r($azi);
print_r($awwr);
print_r($adepth);
print_r($aratio);


/*---------------------- make a copy of ini file for every user--------------------*/
$fileno=1;
$working_dir="./working_directory/parametric/".$unique_counter;
$file="./optLinux_template.ini";
$file1 = fopen($file, "r") or die("can't open template file for reading");
$theData = fread($file1, filesize($file));
fclose($file1);
$file="optLinux.ini";
$file1 = fopen("$working_dir/$file", "w") or die("can't open template for reading");
fwrite($file1,$theData);
fclose($file1);

/*---------------------- make a copy of cfg file for every user--------------------*/

$file="./EnergyPlusLinux.cfg";
$file1 = fopen($file, "r") or die("can't open template file for reading");
$theData = fread($file1, filesize($file));
fclose($file1);

$file="EnergyPlusLinux.cfg";
$file1 = fopen("$working_dir/$file", "w") or die("can't open template for reading");
fwrite($file1,$theData);
fclose($file1);


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

$filesave=fopen($working_dir."/parametricvalues.txt",'w');
$filecontent="";
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

					$file="./tutorial_template.idf";
					$file1 = fopen($file, "r") or die("can't open template file for reading");
					$template_file_data = fread($file1, filesize($file));//stores the data of template file in a variable
					fclose($file1);

					$template_file_data=addhvac($template_file_data,$hvactype2);
					
					/*---------------------- make a copy of idf file for every user--------------------*/

					/*$file="./tutorial.idf";
					$file1 = fopen($file, "r") or die("can't open template file for reading");
					$theData = fread($file1, filesize($file));
					fclose($file1);
					$file="tutorial.idf";
					$file1 = fopen("$working_dir/$file", "w") or die("can't open template for writing");
					fwrite($file1,$theData);
					fclose($file1);
					*/

					$template_file_data = str_replace(array('%azimuth_angle%'),array($aazimuth[$x]),$template_file_data);
					$height_of_window=3;//fixing the height of the window to 3; according the given model

					$wwr_height=$awwr[$y]/100*$height_of_window;
					$wwr_startz=$height_of_window/2-$wwr_height/2;

					$template_file_data = str_replace(array('%wwr_height%','%wwr_startz%'),array($wwr_height,$wwr_startz),$template_file_data);
					$template_file_data = str_replace(array('%wwr_height1%','%wwr_startz1%'),array($wwr_height,$wwr_startz),$template_file_data);
					$template_file_data = str_replace(array('%wwr_height2%','%wwr_startz2%'),array($wwr_height,$wwr_startz),$template_file_data);
					$template_file_data = str_replace(array('%wwr_height3%','%wwr_startz3%'),array($wwr_height,$wwr_startz),$template_file_data);
					$template_file_data = str_replace(array('%wwr_height4%','%wwr_startz4%'),array($wwr_height,$wwr_startz),$template_file_data);
					$template_file_data = str_replace(array("%depth%"),array($adepth[$z]),$template_file_data);

					$lbybratio_length_value=sqrt($aratio[$w]*$ptotal_area);
					$lbybratio_breadth_value=$ptotal_area/$lbybratio_length_value;
					$template_file_data = str_replace(array("%lbybratio_length%","%lbybratio_breadth%"),array($lbybratio_length_value,$lbybratio_breadth_value),$template_file_data);
					
					
					$template_file_data=str_replace(array("%u_factor%"), array($au_factor[$v]),$template_file_data);
					$template_file_data=str_replace(array("%shgc%"), array($ashgc[$v]),$template_file_data);
					$template_file_data=str_replace(array("%vlt%"), array($avlt[$v]),$template_file_data);




					$file=$fileno.".idf";
					$file1 = fopen("$working_dir/$file", "w") or die("can't open abcde  model template for writing");

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
	$str="p"."./working_directory/parametric/".$unique_counter." ".$cityname;
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

