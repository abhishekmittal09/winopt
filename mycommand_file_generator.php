<?php

//value of wwr and aspect ratio have not been used directly to make the idf files and hence changes to wwr and aspect ratio are reqd to be made in displaygenopt_ver1

session_start();
extract($_GET);
extract($_POST);

/*------------------------------- Set up database --------------------------------------------------*/
include ('configdb.php');

/*-------------------------------- Initialize unreferenced variables -----------------*/
if(isset($_POST['azi_value']))
{

    $azi_ini_value=-1;$azi_min_value=-1;$azi_max_value=-1;$azi_step_value=-1;
}
else
{
    $azi_value=-1;
}


if(isset($_POST['wwr_value']))
{

    $wwr_ini_value=-1;$wwr_min_value=-1;$wwr_max_value=-1;$wwr_step_value=-1;$diff_wwr="NA";
}
else
{
    $wwr_value=-1;
}


if(isset($_POST['depth_value']))
{

    $depth_ini_value=-1;$depth_min_value=-1;$depth_max_value=-1;$depth_step_value=-1;
}
else
{
    $depth_value=-1;
}




if(isset($_POST['lbybratio_value']))
{

    $lbybratio_ini_value=-1;$lbybratio_min_value=-1;$lbybratio_max_value=-1;$lbybratio_step_value=-1;
}
else
{
    $lbybratio_value=-1;
}

/*------------------------------- Generate mysql Query for full match of inputs -------------------------*/
function generateFullMatchQuery(){

    global $unique_counter, $location, $total_length, $total_breadth, $total_area, $hvactype;
    global $azi_value, $azi_ini_value, $azi_min_value, $azi_max_value, $azi_step_value;
    global $wwr_value, $diff_wwr, $wwr_ini_value, $wwr_min_value, $wwr_max_value, $wwr_step_value;
    global $depth_value, $depth_ini_value, $depth_max_value, $depth_min_value, $depth_step_value;
    global $lbybratio_value, $lbybratio_min_value, $lbybratio_max_value, $lbybratio_ini_value, $lbybratio_ini_value;
    global $windowtype1, $windowtype2, $windowtype3, $windowtype4;

    $query="SELECT * FROM Simulations WHERE location=\"$location1\" and length=$total_length and breadth=$total_breadth and area=$total_area and ac_system=$hvactype".

        "and aa_fixed=$azi_value and aa_var_ini=$azi_ini_value and aa_var_min=$azi_min_value and aa_var_max=$azi_max_value and aa_var_step=$azi_step_value". 

        "and wwr_fixed=$wwr_value and wwr_var_diff=\"$diff_wwr\" and wwr_var_ini=$wwr_ini_value and wwr_var_min=$wwr_min_value
        and wwr_var_max=$wwr_max_value and wwr_var_step=$wwr_step_value".

        "and od_fixed=$depth_value and od_var_ini=$depth_ini_value and od_var_min=$depth_min_value and od_var_max=$depth_max_value and od_var_step=$depth_step_value".

        "and ar_fixed=$lbybratio_value and ar_var_ini=$lbybratio_ini_value and ar_var_min=$lbybratio_min_value
        and ar_var_max=$lbybratio_max_value and ar_var_step=$lbybratio_step_value".

        "and wt1=$windowtype1 and wt2=$windowtype2 and wt3=$windowtype3 and wt4=$windowtype4;";

    return $query;                          
}

/*------------------------------- Generate mysql Query for Output_Reference table -------------------------*/
function generateOuputReferenceQuery($unique_counter, $out_uuid){
    $query="insert into Output_Reference (input_uuid, output_uuid) values (\"$unique_counter\",\"$out_uuid\");";
    return $query;
}


/*------------------------------- Generate mysql Query for inserting into Simulations table -------------------------*/
function generateInsertSimulationsQuery(){

    global $unique_counter, $location, $total_length, $total_breadth, $total_area, $hvactype;
    global $azi_value, $azi_ini_value, $azi_min_value, $azi_max_value, $azi_step_value;
    global $wwr_value, $diff_wwr, $wwr_ini_value, $wwr_min_value, $wwr_max_value, $wwr_step_value;
    global $depth_value, $depth_ini_value, $depth_max_value, $depth_min_value, $depth_step_value;
    global $lbybratio_value, $lbybratio_min_value, $lbybratio_max_value, $lbybratio_ini_value, $lbybratio_ini_value;
    global $windowtype1, $windowtype2, $windowtype3, $windowtype4;

    $keys="insert into Simulations (uuid, location, length, breadth, area, ac_system";
    $values =" (\"$unique_counter\",\"$location1\",$total_length,$total_breadth,$total_area,$hvactype";


    if(isset($_POST['azi_value']))
    {
        $keys=$keys.",aa_fixed";
        $values=$values.",$azi_value";
    }
    else
    {
        $keys=$keys.",aa_var_ini, aa_var_min, aa_var_max, aa_var_step";
        $values=$values.",$azi_ini_value,$azi_min_value,$azi_max_value,$azi_step_value";
    }


    if(isset($_POST['wwr_value']))
    {
        $keys=$keys.",wwr_fixed";
        $values=$values.",$wwr_value";
    }
    else
    {
        $keys=$keys.",wwr_var_ini, wwr_var_min, wwr_var_max, wwr_var_step, wwr_var_diff";
        $values=$values.",$wwr_ini_value,$wwr_min_value,$wwr_max_value,$wwr_step_value,\"$diff_wwr\"";
    }


    if(isset($_POST['depth_value']))
    {
        $keys=$keys.",od_fixed";
        $values=$values.",$depth_value";
    }
    else
    {
        $keys=$keys.",od_var_ini, od_var_min, od_var_max, od_var_step";
        $values=$values.",$depth_ini_value,$depth_min_value,$depth_max_value,$depth_step_value";
    }




    if(isset($_POST['lbybratio_value']))
    {
        $keys=$keys.",ar_fixed";
        $values=$values.",$lbybratio_value";
    }
    else
    {
        $keys=$keys.",ar_var_ini, ar_var_min, ar_var_max, ar_var_step";
        $values=$values.",$lbybratio_ini_value,$lbybratio_min_value,$lbybratio_max_value,$lbybratio_step_value";
    }

    $keys=$keys.",wt1, wt2, wt3, wt4";
    $values=$values.",$windowtype1,$windowtype2,$windowtype3,$windowtype4";

    $keys=$keys.") values ";
    $values=$values.");";

    $query=$keys.$values;
    return $query;
}

if (mysqli_connect_errno($con))
{
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();	
}
else
{
    $query= generateFullMatchQuery();
    $sql_result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($sql_result); 

    if ($row) // Simulation match found
    {
        $out_uuid=$row['uuid'];
        $query=generateOuputReferenceQuery($unique_counter, $out_uuid);
        $result = mysqli_query($con,$query);

        if(! $result )
        {
            echo 'Could not enter data id: ' . mysql_error();
        }
        return 0;
    }
    else // Simulation match not found, insert simulations details into database
    {
        $out_uuid=$unique_counter;
        $query=generateOuputReferenceQuery($unique_counter, $out_uuid);
        echo $query;
        $result = mysqli_query($con,$query);
        if(! $result )
        {
            echo 'Could not enter data id: ' . mysql_error();
        }

        $query=generateInsertSimulationsQuery();
        echo $query;
        $result = mysqli_query($con,$query);
        if(! $result )
        {
            echo 'Could not enter data: ' . mysql_error();
        }

    }

}

echo "unique counter is $unique_counter and var var_quantities is $var_quantities<br>";
echo $azi_var_fix."azimuth var fix is <br>";
$old = umask(0);
mkdir("./working_directory/$unique_counter", 0777  ) or die("<br>Can not create working directory");//a working directory is made for every user where data related to him would be stored
umask($old);
$working_dir="./working_directory/$unique_counter";//stores the name of the working directory for each user

/*---------------------- store data of template file for every user in a variable--------------------*/

$file="tutorial_template.idf";
$file1 = fopen($file, "r") or die("can't open template file for reading");
$template_file_data = fread($file1, filesize($file));//stores the data of template file in a variable
fclose($file1);

/*---------------------- make a copy of idf file for every user--------------------*/

$file="./tutorial.idf";
$file1 = fopen($file, "r") or die("can't open template file for reading");
$theData = fread($file1, filesize($file));
fclose($file1);
$file="tutorial.idf";
$file1 = fopen("$working_dir/$file", "w") or die("can't open template for writing");
fwrite($file1,$theData);
fclose($file1);

/*---------------------- make a copy of ini file for every user--------------------*/

//this copy should have the city name replaced into it.
// finding what city weather file is needed.

$file="./optLinux_template.ini";
$file1 = fopen($file, "r") or die("can't open template file for reading");
$theData = fread($file1, filesize($file));
fclose($file1);
$file="optLinux.ini";
$file1 = fopen("$working_dir/$file", "w") or die("can't open template for reading");
fwrite($file1,$theData);
fclose($file1);

/*---------------------- make a copy of cfg file for every user--------------------*/

$cityname="Hyderabad.epw";
if($location1==1){
    $cityname="New_Delhi.epw";
}
else if($location1==2){
    $cityname="Hyderabad.epw";
}
else if($location1==3){
    $cityname="Kolkata.epw";
}
else if($location1==4){
    $cityname="Banglore.epw";
}


$file="./EnergyPlusLinux.cfg";
$file1 = fopen($file, "r") or die("can't open template file for reading");
$theData = fread($file1, filesize($file));
fclose($file1);
$theData = str_replace(array('%weatherfile%'),array($cityname),$theData);
$file="EnergyPlusLinux.cfg";
$file1 = fopen("$working_dir/$file", "w") or die("can't open template for reading");
fwrite($file1,$theData);
fclose($file1);

$var_quantities='';
echo "<br>";
$variable_string='';

/*----------------------------making of the command file begins from here and it's contents are stored in parameter $variable_string---------------------------*/


/*------------azimuth angle calculations------------*/
if($azi_var_fix==="variable"){
    $variable_string="  Parameter{ // solar, visible, and thermal transmittance of shading device
        Name    = azimuth_angle;
        Min     = $azi_min_value;
        Ini     = $azi_ini_value;
        Max     = $azi_max_value;
        Step    = $azi_step_value;
}
";
$var_quantities=$var_quantities.'1';
}
elseif($azi_var_fix==="fixed") {
    $template_file_data = str_replace(array('%azimuth_angle%'),array($azi_value),$template_file_data);
    //echo "<br><br>$template_file_data<br><br>";
    echo "azi is fixed";
    echo "<br>";
    $var_quantities=$var_quantities.'0';
}

/*--------wwr calculations------------*/
$diff_wwr=0;
if (isset($_POST['diff_wwr'])) {
    echo "checked!";
    $diff_wwr=1;
}
else{
    $diff_wwr=0;
    echo "not checked";
}

$height_of_window=3;//fixing the height of the window to 3; according the given model
if($wwr_var_fix==="variable"){

    $height_of_window=3;//fixing the height of the window to 3; according the given model
    $ratio_min_value=$wwr_min_value/100*$height_of_window;
    $ratio_ini_value=$wwr_ini_value/100*$height_of_window;
    $ratio_max_value=$wwr_max_value/100*$height_of_window;
    $ratio_step_value=$wwr_step_value/100*$height_of_window;
    $half_window_height=$height_of_window/2;

    if($diff_wwr==0){
        $template_file_data = str_replace(array("%wwr_startz2%","%wwr_height2%","%wwr_startz3%","%wwr_height3%","%wwr_startz4%","%wwr_height4%"),array("%wwr_startz1%","%wwr_height1%","%wwr_startz1%","%wwr_height1%","%wwr_startz1%","%wwr_height1%"),$template_file_data);
        $variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
            Name    = wwr_height1;
            Min     = $ratio_min_value;
            Ini     = $ratio_ini_value;
            Max     = $ratio_max_value;
            Step    = $ratio_step_value;
    }
    ";

    $variable_string=$variable_string."  Function{
        Name    = wwr_startz1;
        Function=\"subtract($half_window_height,multiply(%wwr_height1%,0.5))\";
    }
    ";		

    $var_quantities=$var_quantities.'1';

    }

    else if($diff_wwr==1){
        $variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
            Name    = wwr_height1;
            Min     = $ratio_min_value;
            Ini     = $ratio_ini_value;
            Max     = $ratio_max_value;
            Step    = $ratio_step_value;
    }
    ";

    $variable_string=$variable_string."  Function{
        Name    = wwr_startz1;
        Function=\"subtract($half_window_height,multiply(%wwr_height1%,0.5))\";
    }
    ";
    $variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
        Name    = wwr_height2;
        Min     = $ratio_min_value;
        Ini     = $ratio_ini_value;
        Max     = $ratio_max_value;
        Step    = $ratio_step_value;
    }
    ";

    $variable_string=$variable_string."  Function{
        Name    = wwr_startz2;
        Function=\"subtract($half_window_height,multiply(%wwr_height2%,0.5))\";
    }
    ";
    $variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
        Name    = wwr_height3;
        Min     = $ratio_min_value;
        Ini     = $ratio_ini_value;
        Max     = $ratio_max_value;
        Step    = $ratio_step_value;
    }
    ";

    $variable_string=$variable_string."  Function{
        Name    = wwr_startz3;
        Function=\"subtract($half_window_height,multiply(%wwr_height3%,0.5))\";
    }
    ";
    $variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
        Name    = wwr_height4;
        Min     = $ratio_min_value;
        Ini     = $ratio_ini_value;
        Max     = $ratio_max_value;
        Step    = $ratio_step_value;
    }
    ";

    $variable_string=$variable_string."  Function{
        Name    = wwr_startz4;
        Function=\"subtract($half_window_height,multiply(%wwr_height4%,0.5))\";
    }
    ";

    $var_quantities=$var_quantities.'2';


    }
}
elseif($wwr_var_fix==="fixed"){
    echo "wwr is fixed <br>";

    $wwr_height=$wwr_value/100*$height_of_window;
    $wwr_startz=$height_of_window/2-$wwr_height/2;

    $template_file_data = str_replace(array('%wwr_height1%','%wwr_startz1%','%wwr_height2%','%wwr_startz2%','%wwr_height3%','%wwr_startz3%','%wwr_height4%','%wwr_startz4%'),array($wwr_height,$wwr_startz,$wwr_height,$wwr_startz,$wwr_height,$wwr_startz,$wwr_height,$wwr_startz),$template_file_data);
    echo "<br><br>$template_file_data<br><br>";

    $var_quantities=$var_quantities.'0';
}



/*----------------overhang_depth_calculations-------------*/
if($depth_var_fix==="variable"){
    $variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
        Name    = depth;
        Min     = $depth_min_value;
        Ini     = $depth_ini_value;
        Max     = $depth_max_value;
        Step    = $depth_step_value;
}
";
$var_quantities=$var_quantities.'1';
}
elseif($depth_var_fix==="fixed"){
    $template_file_data = str_replace(array("%depth%"),array($depth_value),$template_file_data);
    echo "depth is fixed <br>";
    $var_quantities=$var_quantities.'0';
}

/*----------------length/breadth_ratio_calculations-------------*/
if($lbybratio_var_fix==="variable"){

    //checking the minimum value
    $lbybratio_length_min_value=$total_area/$total_breadth;
    if(sqrt($total_area*$lbybratio_min_value)<$lbybratio_length_min_value);
    else{
        $lbybratio_length_min_value=sqrt($total_area*$lbybratio_min_value);
    }

    //checking the initial value
    $lbybratio_length_ini_value=sqrt($total_area*$lbybratio_ini_value);
    if($lbybratio_length_ini_value<$lbybratio_length_min_value){
        $lbybratio_length_ini_value=$lbybratio_length_min_value;
    }
    else if($lbybratio_length_ini_value>$lbybratio_length_max_value){
        $lbybratio_length_ini_value=$lbybratio_length_max_value;
    }
    if($lbybratio_length_ini_value>=$lbybratio_length_min_value && $lbybratio_length_ini_value<=$lbybratio_length_max_value);
    else{
        $lbybratio_length_ini_value=$lbybratio_length_min_value;
    }

    //checking the maximum value
    $lbybratio_length_max_value=$total_length;
    if(sqrt($total_area*$lbybratio_max_value)>$lbybratio_length_max_value);
    else{
        $lbybratio_length_max_value=sqrt($total_area*$lbybratio_max_value);
    }
    $lbybratio_length_step_value=$lbybratio_step_value;
    echo "min len is ".$lbybratio_length_min_value;
    echo "max len is ".$lbybratio_length_max_value;
    echo "ini len is ".$lbybratio_length_ini_value;
    $variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
        Name    = lbybratio_length;
        Min     = $lbybratio_length_min_value;
        Ini     = $lbybratio_length_ini_value;
        Max     = $lbybratio_length_max_value;
        Step    = $lbybratio_length_step_value;
}
";
$variable_string=$variable_string."  Function{
    Name    = lbybratio_breadth;
    Function=\"divide($total_area,%lbybratio_length%)\";
}
";

$var_quantities=$var_quantities.'1';
}
elseif($lbybratio_var_fix==="fixed"){

    $lbybratio_length_value=sqrt($total_area*$lbybratio_value);
    $lbybratio_breadth_value=$total_area/$lbybratio_length_value;
    $template_file_data = str_replace(array("%lbybratio_length%","%lbybratio_breadth%"),array($lbybratio_length_value,$lbybratio_breadth_value),$template_file_data);
    echo "length/breadth ratio is fixed <br>";
    $var_quantities=$var_quantities.'0';

}

/* Putting the required HAVC into the building */


if($hvactype==5){
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

/* --------------------making template.idf file-----------------*/
$file="tutorial_template2.idf";
$file1 = fopen("$working_dir/$file", "w") or die("can't open model template for writing");
fwrite($file1,$template_file_data);
fclose($file1);


/*-------------------window type calculations-----------------*/
$var_quantities=$var_quantities.'1';//since window is always a varialble

$flagshgc=0;
$shgcvalueset='"';

function findshgcofwindow($a=0){
    if($a==1){
        return 0.25;
    }
    else if($a==2){
        return 0.28;
    }
    else if($a==3){
        return 0.20;
    }
    else if($a==4){
        return 0.67;
    }
}


if($windowtype1!=0){
    if($flagshgc==0){
        $shgcvalueset=$shgcvalueset.findshgcofwindow($windowtype1);
        $flagshgc=1;
    }
    else if($flagshgc==1){
        $shgcvalueset=$shgcvalueset.",".findshgcofwindow($windowtype1);
    }
    echo "window1 is set <br>";
}
if($windowtype2!=0){
    if($flagshgc==0){
        $shgcvalueset=$shgcvalueset.findshgcofwindow($windowtype2);
        $flagshgc=1;
    }
    else if($flagshgc==1){
        $shgcvalueset=$shgcvalueset.",".findshgcofwindow($windowtype2);
    }
    echo "window2 is set <br>";
}
if($windowtype3!=0){
    if($flagshgc==0){
        $shgcvalueset=$shgcvalueset.findshgcofwindow($windowtype3);
        $flagshgc=1;
    }
    else if($flagshgc==1){
        $shgcvalueset=$shgcvalueset.",".findshgcofwindow($windowtype3);
    }
    echo "window3 is set <br>";
}
if($windowtype4!=0){
    if($flagshgc==0){
        $shgcvalueset=$shgcvalueset.findshgcofwindow($windowtype4);
        $flagshgc=1;
    }
    else if($flagshgc==1){
        $shgcvalueset=$shgcvalueset.",".findshgcofwindow($windowtype4);
    }
    echo "window4 is set <br>";
}
$shgcvalueset=$shgcvalueset.'"';	
echo $shgcvalueset."<br>";


$variable_string=$variable_string."  Parameter{ // solar, visible, and thermal transmittance of shading device
    Name    = shgc;
    Ini     = 1;
    Values = $shgcvalueset;
  }
  Function{
      Name = u_factor;
      Function = \"find_u_factor(%shgc%)\";
  }
  Function{
      Name = vlt;
      Function = \"find_vlt(%shgc%)\";
  }
";

/*----------------final printing of the command file for genopt------------------*/

echo "variable var_quantities is <br>";
echo $var_quantities;
echo "<br>";

$variable_string="Vary{
    ".$variable_string."}"."
        OptimizationSettings{
            MaxIte = 2000;
            MaxEqualResults = 100;
            WriteStepNumber = false;
}

Algorithm{
    Main = GPSPSOCCHJ;
    NeighborhoodTopology = vonNeumann;
    NeighborhoodSize = 5;
    NumberOfParticle = 10;
    NumberOfGeneration = 10;
    Seed = 1;
    CognitiveAcceleration = 2.8;
    SocialAcceleration = 1.3;
    MaxVelocityGainContinuous = 0.5;
    MaxVelocityDiscrete = 4;
    ConstrictionGain = 0.5;
    MeshSizeDivider = 2;
    InitialMeshSizeExponent = 0;
    MeshSizeExponentIncrement = 1;
    NumberOfStepReduction = 4;
}
";
$file1 = fopen("$working_dir/command.txt","w") or die("can't open command.txt for writing");
fwrite($file1, $variable_string);
fclose($file1);
echo "variable string is ".$var_quantities."<br>";
//echo("<meta http-equiv=\"refresh\" content=\"0;URL=./mycallserver.php?unique_counter=".$unique_counter."&var_quantities=".$var_quantities."\">");	

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
    $str="e"."./working_directory/".$unique_counter;
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
