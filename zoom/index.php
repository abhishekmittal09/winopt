<!-- 
parameter need to be transfered to this file for displaying the correct outputs are :-
the path of the file :- finalvalues.txt
the order in which outputs have to printed
the number of times each parameter comes
order is azi,wwr,od,ratio,shgc
 -->
 <!doctype html>
<html>
   <head>
      <link rel="stylesheet" href="./css/pure-min.css">

<!--[if lte IE 8]>
        <link rel="stylesheet" href="/combo/1.11.5?/css/main-grid-old-ie.css&/css/main-old-ie.css&/css/home-old-ie.css&/css/rainbow/baby-blue.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="./css/1.11.5.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="./css/d.css">
      <title>Graphical Display</title>
      <style>
         .dragpositive{
            position: relative;
         }
         .zoom_button{
            cursor: pointer;
         }
      </style>

      <script src="./js_files/jquery-1.9.1.js"></script>
      <script src="./js_files/jquery-ui.js"></script>
   
   </head>
   <body>

      <?php

         $val1=null;
         $val2=null;
         $val3=null;
         $val4=null;
         $val5=null;
         $unique_counter="a6f0eb35-00a0-de35-e541-2295ad61a265";
         extract($_GET);
         echo $val1;
         echo $val2;
         echo $val3;
         echo $val4;
         echo $val5;
         echo "<br>";
         echo $unique_counter."<br>";
         echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
         // return the interpolated value between pBegin and pEnd
         function interpolate($pBegin, $pEnd, $pStep, $pMax) {
         	if ($pBegin < $pEnd) {
         		return (($pEnd - $pBegin) * ($pStep / $pMax)) + $pBegin;
         	} else {
         		return (($pBegin - $pEnd) * (1 - ($pStep / $pMax))) + $pEnd;
         	}
         }
         
         
         function gradient(&$colorindex,$pos,$theColorBegin,$theColorEnd,$theNumSteps){
         
         	//just check function so that the values are not less
         	$theColorBegin = (($theColorBegin >= 0x000000) && ($theColorBegin <= 0xffffff)) ? $theColorBegin : 0x000000;
         	$theColorEnd = (($theColorEnd >= 0x000000) && ($theColorEnd <= 0xffffff)) ? $theColorEnd : 0xffffff;
         	$theNumSteps = (($theNumSteps > 0) && ($theNumSteps < 256)) ? $theNumSteps : 256;
         
         
         	$theR0 = ($theColorBegin & 0xff0000) >> 16;
         	$theG0 = ($theColorBegin & 0x00ff00) >> 8;
         	$theB0 = ($theColorBegin & 0x0000ff) >> 0;
         
         	$theR1 = ($theColorEnd & 0xff0000) >> 16;
         	$theG1 = ($theColorEnd & 0x00ff00) >> 8;
         	$theB1 = ($theColorEnd & 0x0000ff) >> 0;
         
         
         	// generate gradient swathe now
         	//echo "<table width='100%' cellpadding='8' style='border-collapse:collapse'>\n";
         	for ($i = 0; $i <= $theNumSteps; $i++) {
         		$theR = interpolate($theR0, $theR1, $i, $theNumSteps);
         		$theG = interpolate($theG0, $theG1, $i, $theNumSteps);
         		$theB = interpolate($theB0, $theB1, $i, $theNumSteps);
         
         		$theVal = ((($theR << 8) | $theG) << 8) | $theB;
         
         		$theTDTag = sprintf("<td bgcolor='#%06X'>", $theVal);
         		$theTDARTag = sprintf("<td bgcolor='#%06X' align='right'>", $theVal);
         
         		$temp=dechex($theVal);
         		while(strlen($temp)<6){
         			$temp='0'.$temp;
         		}
         		$colorindex[$i+$pos]=$temp;
         		$theFC0Tag = "<font color='#000000'>";
         		$theFC1Tag = "<font color='#ffffff'>";
         		//printf("<tr>$theTDTag$theFC0Tag%d</font></td>$theTDTag$theFC0Tag%d%%</font></td>$theTDARTag$theFC0Tag%d</font></td>$theTDARTag$theFC0Tag%06X</font></td>", $i, ($i/$theNumSteps) * 100, $theVal, $theVal);
         		//printf("$theTDTag$theFC1Tag%06X</font></td>$theTDTag$theFC1Tag%d</font></td>$theTDARTag$theFC1Tag%d%%</font></td>$theTDARTag$theFC1Tag%d</font></td></tr>\n", $theVal, $theVal, ($i/$theNumSteps) * 100, $i);
         	}
         	//echo "</table>\n";
         }
         
         $colorindex=array();
         gradient($colorindex,0,0xffffff,0x0000ff,200);
         gradient($colorindex,128,0xffc5c5,0xff0000,128);
         
         
         $azimuth1=array();//first
         $energy1=array();
         $wwr1=array();//second
         $ratio1=array();//third
         $shgc1=array();//fifth
         $depth1=array();//fourth
         $u_factor1=array();
         $vlt1=array();
         $count=0;
         $file=fopen("../working_directory/parametric/".$unique_counter."/finalvalues.txt","r");
         $flag=0;
         if($file == NULL){
         	echo "why null";
         }
         else{
         	while(!feof($file))
         	{
         		$no=0;
         		$a= fgets($file);
         		$len=strlen($a);
         		if($len==0 or $len==1)
         		{
         			break;
         		}
         		$piece=explode(" ",$a);
         		$energy1[$count]=$piece[0];
         		//echo $energy1[$count];
         		$azimuth1[$count]=$piece[1];
         		$wwr1[$count]=$piece[2];
         		$depth1[$count]=$piece[3];
         		$ratio1[$count]=$piece[4];
         		$shgc1[$count]=$piece[5];
         		$u_factor1[$count]=$piece[6];
         		$vlt1[$count]=$piece[7];
         		$count=$count+1;
         	}
         
         }
         $minenergy=9999999;
         $maxenergy=0;
         for ($i=0; $i < $count; $i++) { 
         # code...
         	if($minenergy>$energy1[$i]){
         		$minenergy=$energy1[$i];
         	}
         	if($maxenergy<$energy1[$i]){
         		$maxenergy=$energy1[$i];
         	}
         }


         $azimuth1=array_unique($azimuth1);
         $wwr1=array_unique($wwr1);
         $depth1=array_unique($depth1);
         $ratio1=array_unique($ratio1);
         $shgc1=array_unique($shgc1);


         sort($azimuth1);
         sort($wwr1);
         sort($depth1);
         sort($ratio1);
         sort($shgc1);

         function getwhatvaluerepresents($val){
            if($val==1){
               return "ratio";
            }
            if($val==2){
               return "azi";
            }
            if($val==3){
               return "od";
            }
            if($val==4){
               return "shgc";
            }
            if($val==5){
               return "wwr";
            }
         }
         $order["1"]=getwhatvaluerepresents($val1);
         $order["2"]=getwhatvaluerepresents($val2);
         $order["3"]=getwhatvaluerepresents($val3);
         $order["4"]=getwhatvaluerepresents($val4);
         $order["5"]=getwhatvaluerepresents($val5);
         if($val1==null || $val2=null || $val3==null || $val4==null || $val5==null){
            $order["1"]="ratio";
            $order["2"]="azi";
            $order["3"]="od";
            $order["4"]="shgc";
            $order["5"]="wwr";            
         }
         $mult["azi"]=5;
         $mult["wwr"]=5;
         $mult["od"]=5;
         $mult["ratio"]=5;
         $mult["shgc"]=5;

         function findmult($type,&$mult){
            if($type=="azi"){
               return $mult["wwr"]*$mult["od"]*$mult["ratio"]*$mult["shgc"];
            }
            else if($type=="wwr"){
               return $mult["od"]*$mult["ratio"]*$mult["shgc"];
            }
            if($type=="od"){
               return $mult["ratio"]*$mult["shgc"];
            }
            if($type=="ratio"){
               return $mult["shgc"];
            }
            if($type=="shgc"){
               return 1;
            }
         }

         function getcolor($i,$j,$k,$l,$m,&$energy1,$minenergy,$maxenergy,&$colorindex,&$mult,&$order){
         	//echo $i+4*$j+12*$k+36*$l+108*$m;
         	//echo $energy1[$i+4*$j+12*$k+36*$l+108*$m]."<br>";
         	$index=intval(($energy1[findmult($order["1"],$mult)*$i+findmult($order["2"],$mult)*$j+findmult($order["3"],$mult)*$k+findmult($order["4"],$mult)*$l+findmult($order["5"],$mult)*$m]-$minenergy)/($maxenergy-$minenergy)*255);
         	//echo $index;
         	return $colorindex[$index];
         }

         //the original file has the ordering as this azimuth, wwr, overhang, aspect ratio, shgc
         //tells the proper name of the element
         function findname($name){
            if($name=="shgc"){
               return "SHGC";
            }
            if($name=="ratio"){
               return "Aspect Ratio";
            }
            if($name=="od"){
               return "Overhang Depth";
            }
            if($name=="azi"){
               return "Azimuth";
            }
            if($name=="wwr"){
               return "WWR";
            }
         }

         function findAssoValue($name,$index){

            global $azimuth1,$wwr1,$depth1,$ratio1,$shgc1;
            if($name=="wwr"){
               return $wwr1[$index];
            }
            if($name=="shgc"){
               return $shgc1[$index];
            }
            if($name=="od"){
               return $depth1[$index];
            }
            if($name=="ratio"){
               return $ratio1[$index];
            }
            if($name=="azi"){
               return $azimuth1[$index];
            }
            return -1;
         }

         function layerdata1(&$energy1,$minenergy,$maxenergy,&$colorindex,$layer,&$mult,&$order){
            echo '<table border="1" style="width:100%">';//625 table
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr print heading
               echo '<th style="font-size:15px;">'.findname($order["5"]).' '.findAssoValue($order["5"],$m).'</th>';
            }
            echo '</tr>';
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr
               echo "<td>";
         
               echo '<table style="width:100%">';//625 table
               $flag=1;//for limiting the no of times "Overhang Depth" is to be printed
               for($l=0;$l<$mult[$order["4"]];$l++){//shgc
                  echo '<tr>';
                  echo "<td>";
         
                  echo '<table style="width:100%">';//125 table
                  echo "<tr>";
                  $flag=0;
                  for($k=0;$k<$mult[$order["3"]];$k++){//overhang
                     echo "<td>";
         
                     echo '<table bgcolor="black" style="width:100%">';//5*5 table
                     for($j=0;$j<$mult[$order["2"]];$j++){//represents azimuth
                        echo "<tr>";
                        for($i=0;$i<$mult[$order["1"]];$i++){//aspect ratio
                           $hascolor=getcolor($i,$j,$k,$l,$m,$energy1,$minenergy,$maxenergy,$colorindex,$mult,$order);
                           $tempindex=0;//=intval(($energy1[5*$i+625*$j+25*$k+$l+125*$m]-$minenergy)/($maxenergy-$minenergy)*255);
                           //echo '<td bgcolor="'.$hascolor.'"><font color="black">'.(5*$i+625*$j+25*$k+$l+125*$m)." ".$tempindex.'</font></td>';
                           echo '<td  bgcolor="'.$hascolor.'"><font color="black">
                        <div style="width:'.($layer*5).'px;height:10px"></div>
                     </font></td>';
                        }
                        echo "</tr>";
                     }
                     $flag=-1;
                     echo "</table>";
         
                     echo "</td>";
                  }
                  echo "</tr>";
                  echo "</table>";
                  echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
               echo "</td>";
            }
            echo "</tr>";
            echo "</table>";
         
         }

         function layerdata2(&$energy1,$minenergy,$maxenergy,&$colorindex,$layer,&$mult,&$order){
            echo '<table border="1" style="width:100%">';//625 table
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr print heading
               echo '<th style="font-size:15px;">'.findname($order["5"]).' '.findAssoValue($order["5"],$m).'</th>';
            }
            echo '</tr>';
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr
               echo "<td>";
         
               echo '<table style="width:100%">';//625 table
               $flag=1;//for limiting the no of times "Overhang Depth" is to be printed
               for($l=0;$l<$mult[$order["4"]];$l++){//shgc
                  echo '<tr>';
                  echo "<td>";
         
                  echo '<table style="width:100%">';//125 table
                  echo "<tr>";
                  echo "<td></td>";//an extra column due to shgc printing
                  if($flag==1){
                     for($t=0;$t<$mult[$order["3"]];$t++){
                        echo "<td>";
                        echo findname($order["3"]).' '.findAssoValue($order["3"],$t);
                        echo "</td>";
                     }
                     $flag=0;
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo '<td>'.findname($order["4"]).' '.findAssoValue($order["4"],$l).'</td>';
                  $flag=0;
                  for($k=0;$k<$mult[$order["3"]];$k++){//overhang
                     echo "<td>";
         
                     echo '<table bgcolor="black" style="width:100%">';//5*5 table
                     for($j=0;$j<$mult[$order["2"]];$j++){//represents azimuth
                        echo "<tr>";
                        for($i=0;$i<$mult[$order["1"]];$i++){//aspect ratio
                           $hascolor=getcolor($i,$j,$k,$l,$m,$energy1,$minenergy,$maxenergy,$colorindex,$mult,$order);
                           $tempindex=0;//=intval(($energy1[5*$i+625*$j+25*$k+$l+125*$m]-$minenergy)/($maxenergy-$minenergy)*255);
                           //echo '<td bgcolor="'.$hascolor.'"><font color="black">'.(5*$i+625*$j+25*$k+$l+125*$m)." ".$tempindex.'</font></td>';
                           echo '<td  bgcolor="'.$hascolor.'"><font color="black">
                        <div style="width:'.($layer*5).'px;height:10px"></div>
                     </font></td>';
                        }
                        echo "</tr>";
                     }
                     $flag=-1;
                     echo "</table>";
         
                     echo "</td>";
                  }
                  echo "</tr>";
                  echo "</table>";
                  echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
               echo "</td>";
            }
            echo "</tr>";
            echo "</table>";
         
         }


         function layerdata3(&$energy1,$minenergy,$maxenergy,&$colorindex,$layer,&$mult,&$order){
            echo '<table  border="1">';//625 table
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr print heading
               echo '<th style="font-size:15px;">'.findname($order["5"]).' '.findAssoValue($order["5"],$m).'</th>';
            }
            echo '</tr>';
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr
               echo "<td>";
         
               echo '<table >';//625 table
               $flagod=1;//for limiting the no of times "Overhang Depth" is to be printed
               for($l=0;$l<$mult[$order["4"]];$l++){//shgc
                  echo '<tr>';
                  echo "<td>";
         
                  echo '<table >';//125 table
                  echo "<tr>";
                     echo "<td></td>";//an extra column due to shgc printing
                  if($flagod==1){
                     for($t=0;$t<$mult[$order["3"]];$t++){
                        echo "<td>";
                        echo findname($order["3"]).' '.findAssoValue($order["3"],$t);
                        echo "</td>";
                     }
                     //$flagod=0;
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo '<td>'.findname($order["4"]).' '.findAssoValue($order["4"],$l).'</td>';
                  for($k=0;$k<$mult[$order["3"]];$k++){//overhang
                     echo "<td>";
         
                     echo '<table border="1" bgcolor="white">';//5*5 table
                     echo "<tr>";
                     
                     echo "<th>";//extra heading due to aspect ratio
                     echo "</th>";

                    for($t=0;$t<$mult[$order["1"]];$t++){
                           echo "<th>";
                           echo findname($order["1"]).' '.findAssoValue($order["1"],$t);//printing aspect ratio
                           echo "</th>";
                     }
                     echo "</tr>";
                     for($j=0;$j<$mult[$order["2"]];$j++){//represents azimuth
                        echo "<tr>";
                        $flag=0;
                        if($flag==0){
                              echo '<td>'.findname($order["2"]).' '.findAssoValue($order["2"],$j).'</td>';//printing azimuth
                        }
                        for($i=0;$i<$mult[$order["1"]];$i++){//aspect ratio
                           $hascolor=getcolor($i,$j,$k,$l,$m,$energy1,$minenergy,$maxenergy,$colorindex,$mult,$order);
                           $tempindex=0;//=intval(($energy1[5*$i+625*$j+25*$k+$l+125*$m]-$minenergy)/($maxenergy-$minenergy)*255);
                           //echo '<td bgcolor="'.$hascolor.'"><font color="black">'.(5*$i+625*$j+25*$k+$l+125*$m)." ".$tempindex.'</font></td>';
                        //(findmult($order["1"],$mult)*$i+findmult($order["2"],$mult)*$j+findmult($order["3"],$mult)*$k+findmult($order["4"],$mult)*$l+findmult($order["5"],$mult)*$m)
                           
                           echo '<td  bgcolor="'.$hascolor.'"><font color="black"><div style="width:'.($layer*5).'px;height:10px"></div></font></td>';
                        }
                        echo "</tr>";
                     }
                     $flag=-1;
                     echo "</table>";
         
                     echo "</td>";
                  }
                  echo "</tr>";
                  echo "</table>";
                  echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
               echo "</td>";
            }
            echo "</tr>";
            echo "</table>";
         
         }

         function layerdata4(&$energy1,$minenergy,$maxenergy,&$colorindex,$layer,&$mult,&$order){
            echo '<table  border="1">';//625 table
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr print heading
               echo '<th style="font-size:15px;">'.findname($order["5"]).' '.findAssoValue($order["5"],$m).'</th>';
            }
            echo '</tr>';
            echo '<tr>';
            for($m=0;$m<$mult[$order["5"]];$m++){//wwr
               echo "<td>";
         
               echo '<table >';//625 table
               $flagod=1;//for limiting the no of times "Overhang Depth" is to be printed
               for($l=0;$l<$mult[$order["4"]];$l++){//shgc
                  echo '<tr>';
                  echo "<td>";
         
                  echo '<table >';//125 table
                  echo "<tr>";
                  echo "<td></td>";//an extra column due to shgc printing
                  if($flagod==1){
                     for($t=0;$t<$mult[$order["3"]];$t++){
                        echo "<td>";
                        echo findname($order["3"]).' '.findAssoValue($order["3"],$t);
                        echo "</td>";
                     }
                     //$flagod=0;
                  }
                  echo "</tr>";
                  echo "<tr>";
                  echo '<td>'.findname($order["4"]).' '.findAssoValue($order["4"],$l).'</td>';
                  for($k=0;$k<$mult[$order["3"]];$k++){//overhang
                     echo "<td>";
         
                     echo '<table border="1" bgcolor="white">';//5*5 table
                     echo "<tr>";
                     
                     echo "<th>";//extra heading due to azimuth angle
                     echo "</th>";

                    for($t=0;$t<$mult[$order["1"]];$t++){
                           echo "<th>";
                           echo findname($order["1"]).' '.findAssoValue($order["1"],$t);//printing ratio
                           echo "</th>";
                     }
                     echo "</tr>";
                     for($j=0;$j<$mult[$order["2"]];$j++){//represents azimuth
                        echo "<tr>";
                        $flag=0;
                        if($flag==0){
                              echo '<td>'.findname($order["2"]).' '.findAssoValue($order["2"],$j).'</td>';//printing azimuth
                        }
                        for($i=0;$i<$mult[$order["1"]];$i++){//aspect ratio
                           $hascolor=getcolor($i,$j,$k,$l,$m,$energy1,$minenergy,$maxenergy,$colorindex,$mult,$order);
                           $tempindex=0;//=intval(($energy1[5*$i+625*$j+25*$k+$l+125*$m]-$minenergy)/($maxenergy-$minenergy)*255);
                           //echo '<td bgcolor="'.$hascolor.'"><font color="black">'.(5*$i+625*$j+25*$k+$l+125*$m)." ".$tempindex.'</font></td>';
                           echo '<td  bgcolor="'.$hascolor.'"><font color="black">
                        <div style="width:'.($layer*5).'px;height:10px"><font size="1">'.round($energy1[findmult($order["1"],$mult)*$i+findmult($order["2"],$mult)*$j+findmult($order["3"],$mult)*$k+findmult($order["4"],$mult)*$l+findmult($order["5"],$mult)*$m],2).'</font></div>
                     </font></td>';
                        }
                        echo "</tr>";
                     }
                     $flag=-1;
                     echo "</table>";
         
                     echo "</td>";
                  }
                  echo "</tr>";
                  echo "</table>";
                  echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
               echo "</td>";
            }
            echo "</tr>";
            echo "</table>";
         
         }
         
         ?>

         <div class="hero-titles">
            <h1 class="hero-site" style="font-size:3em;text-align:center;">BitMap Visualization of Data</h1>
         </div>

         <div style="text-align:center;">
            <div id="meter">
               <br>
               Gradient: Min-Energy Consumption to Max-Energy Consumption
               <table style="margin: 0px auto;">
                  <tbody>
                     <tr>
                        <?php
                        foreach ($colorindex as $value) {
                           echo '<td><div style="width:3px;height:15px;background-color:'.'#'.$value.'"></div></td>';
                        }
                        ?>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <br>

         <div style="overflow:scroll;width:100%;height:400px;background-color:white;">
            <div id="layer1" class="dragpositive" style="font-size:5px;min-width:100%;min-height:100%">
               <!--top level map content goes here--> 
               <?php
                  layerdata1($energy1,$minenergy,$maxenergy,$colorindex,1,$mult,$order);
               ?>
            </div>
            <div id="layer2" class="dragpositive" style="display:none;font-size:10px;min-width:100%;min-height:100%;">
               <!-- 	<div class="mapcontent">
                  -->		<!--map content goes here--> 
               <?php
                  layerdata2($energy1,$minenergy,$maxenergy,$colorindex,2,$mult,$order);
               ?>
               <!-- </div> 
                  -->
            </div>
            <div id="layer3" class="dragpositive" style="display:none;font-size:15px;min-width:100%;min-height:100%;"> 
               <?php
                  layerdata3($energy1,$minenergy,$maxenergy,$colorindex,3,$mult,$order);
                  ?>
            </div>
            <div id="layer4" class="dragpositive" style="display:none;font-size:20px;min-width:100%;min-height:100%;"> 
               <?php
                  layerdata4($energy1,$minenergy,$maxenergy,$colorindex,4,$mult,$order);
                  ?>
            </div>
         </div>
         <br><br>
      <div style="width:100%;height:50px;text-align:center">
         <input id="zoomin" type="button" onclick="zoomin()" value="Zoom In">
         <input id="zoomout" type="button" onclick="zoomout()" value="Zoom Out" disabled="true">
      </div>

      <div class="hero-titles" style="text-align:center">
        <form action="#" method="GET">
      <table>
         <tbody>
            <tr>
               <td>
                     <input type="radio" name="val1" value="1" checked>Aspect Ratio<br>
                     <input type="radio" name="val1" value="2">Azimuth Angle<br>
                     <input type="radio" name="val1" value="3">Overhang Depth<br>
                     <input type="radio" name="val1" value="4">Shgc<br> 
                     <input type="radio" name="val1" value="5">Window Wall Ratio<br>
               </td>
               <td>
                     <input type="radio" name="val2" value="1">Aspect Ratio<br>
                     <input type="radio" name="val2" value="2" checked>Azimuth Angle<br>
                     <input type="radio" name="val2" value="3">Overhang Depth<br>
                     <input type="radio" name="val2" value="4">Shgc<br>
                     <input type="radio" name="val2" value="5">Window Wall Ratio<br>
               </td>
               <td>
                     <input type="radio" name="val3" value="1">Aspect Ratio<br>
                     <input type="radio" name="val3" value="2">Azimuth Angle<br>
                     <input type="radio" name="val3" value="3" checked>Overhang Depth<br>
                     <input type="radio" name="val3" value="4">Shgc<br>
                     <input type="radio" name="val3" value="5">Window Wall Ratio<br>
               </td>
               <td>
                     <input type="radio" name="val4" value="1">Aspect Ratio<br>
                     <input type="radio" name="val4" value="2">Azimuth Angle<br>
                     <input type="radio" name="val4" value="3">Overhang Depth<br>
                     <input type="radio" name="val4" value="4" checked>Shgc<br>
                     <input type="radio" name="val4" value="5">Window Wall Ratio<br>
               </td>
               <td>
                     <input type="radio" name="val5" value="1">Aspect Ratio<br>
                     <input type="radio" name="val5" value="2">Azimuth Angle<br>
                     <input type="radio" name="val5" value="3">Overhang Depth<br>
                     <input type="radio" name="val5" value="4">Shgc<br>
                     <input type="radio" name="val5" value="5" checked>Window Wall Ratio<br>
               </td>
            </tr>
         </tbody>
      </table>
               <input type="Submit" value="Submit">
         </form>
      </div>


      <script type="text/javascript">

      /*$(function() {
         $( ".dragpositive" ).draggable();
      });*/

      var dataInLayer=1;

      function zoomin(){
         dataInLayer=dataInLayer+1;
         if(dataInLayer>=5){
            dataInLayer=4;
         }
         else{
            //alert(dataInLayer);
            $("#layer"+(dataInLayer-1)).hide();
            $("#layer"+dataInLayer).show();
         }
         if(dataInLayer==4){
            $("#zoomin").prop("disabled",true);
            $("#zoomout").prop("disabled",false);
         }
         else{
            $("#zoomin").prop("disabled",false);
            $("#zoomout").prop("disabled",false);            
         }
      }
      function zoomout(){
         dataInLayer=dataInLayer-1;
         if(dataInLayer<=0){
            dataInLayer=1;
         }
         else{
            //alert(dataInLayer);
            $("#layer"+(dataInLayer+1)).hide();
            $("#layer"+dataInLayer).show();
         }
         if(dataInLayer==1){
            $("#zoomin").prop("disabled",false);
            $("#zoomout").prop("disabled",true);
         }
         else{
            $("#zoomin").prop("disabled",false);
            $("#zoomout").prop("disabled",false);            
         }
         //alert(dataInLayer);
      }
      </script>
 

   </body>
</html>
