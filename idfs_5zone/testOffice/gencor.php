<?php

//extract($_POST);
/*echo $length."<br>";
echo $breadth."<br>";
echo $thick."<br>";
*/
$l=40;
$b=20;
$t=6;
$h=4;
$t_root=$t/(sqrt(2));

echo $l."<br>";
echo $b."<br>";
echo $t."<br>";
echo $h."<br>";
echo $t_root."<br>";
echo "<br> <br>";


$origins[0] = array(0, 0, 0);
$origins[1] = array($l, 0, 0);
$origins[2] = array($t_root, $b-$t_root, 0);
$origins[3] = array(0, 0, 0);
$origins[4] = array($t_root, $t_root, 0);

//the information is wrt to the origins

//starting cordinate is lower left
//anti-clockwise direction
//wall1 is the exterior wall always
//walls 2,3,4 are interior wall for the zones
//zone1 is the south one
//zone 2,3,4 are anti-clockwise
//followed by roof and floor
//[5][6][4][3];//5 zones,6 walls, 4 corners, 3 coordinates

$zones=array();

//Zone 1
//w1
$zones[0][0][0]=array(0, 0, $h);
$zones[0][0][1]=array(0, 0, 0);
$zones[0][0][2]=array($l, 0, 0);
$zones[0][0][3]=array($l, 0, $h);

//w2
$zones[0][1][0]=array($l, 0, $h);
$zones[0][1][1]=array($l, 0, 0);
$zones[0][1][2]=array($l-$t_root, $t_root, 0);
$zones[0][1][3]=array($l-$t_root, $t_root, $h);

//w3
$zones[0][2][0]=array($l-$t_root, $t_root, $h);
$zones[0][2][1]=array($l-$t_root, $t_root, 0);
$zones[0][2][2]=array($t_root, $t_root, 0);
$zones[0][2][3]=array($t_root, $t_root, $h);

//w4
$zones[0][3][0]=array($t_root, $t_root, $h);
$zones[0][3][1]=array($t_root, $t_root, 0);
$zones[0][3][2]=array(0, 0, 0);
$zones[0][3][3]=array(0, 0, $h);

//floor
$zones[0][4][0]=array($t_root, $t_root, 0);
$zones[0][4][1]=array($l - $t_root, $t_root, 0);
$zones[0][4][2]=array($l, 0, 0);
$zones[0][4][3]=array(0, 0, 0);

//roof
$zones[0][5][0]=array(0, 0, $h);
$zones[0][5][1]=array($l, 0, $h);
$zones[0][5][2]=array($l - $t_root, $t_root, $h);
$zones[0][5][3]=array($t_root, $t_root, $h);


//Zone 2
//w1
$zones[1][0][0]=array(0, 0, $h);//l=10,b=6,h=4,p=3
$zones[1][0][1]=array(0, 0, 0);
$zones[1][0][2]=array(0, $b, 0);
$zones[1][0][3]=array(0, $b, $h);

//w2
$zones[1][1][0]=array(0, $b, $h);
$zones[1][1][1]=array(0, $b, 0);
$zones[1][1][2]=array(-$t_root, $b-$t_root, 0);
$zones[1][1][3]=array(-$t_root, $b-$t_root, $h);

//w3
$zones[1][2][0]=array(-$t_root, $b-$t_root, $h);
$zones[1][2][1]=array(-$t_root, $b-$t_root, 0);
$zones[1][2][2]=array(-$t_root, $t_root, 0);
$zones[1][2][3]=array(-$t_root, $t_root, $h);

//w4
$zones[1][3][0]=array(-$t_root, $t_root, $h);
$zones[1][3][1]=array(-$t_root, $t_root, 0);
$zones[1][3][2]=array(0, 0, 0);
$zones[1][3][3]=array(0, 0, $h);

//roof
$zones[1][4][0]=array(0, 0, $h);
$zones[1][4][1]=array(0, $b, $h);
$zones[1][4][2]=array(-$t_root, $b-$t_root, $h);
$zones[1][4][3]=array(-$t_root, $t_root, $h);

//floor
$zones[1][5][0]=array(-$t_root, $t_root, 0);
$zones[1][5][1]=array(-$t_root, $b-$t_root, 0);
$zones[1][5][2]=array(0, $b, 0);
$zones[1][5][3]=array(0, 0, 0);


//Zone 3

//w1
$zones[2][0][0]=array(0, 0, $h);
$zones[2][0][1]=array(0, 0, 0);
$zones[2][0][2]=array($l-2*$t_root, 0, 0);
$zones[2][0][3]=array($l-2*$t_root, 0, $h);

//w2
$zones[2][1][0]=array($l-2*$t_root, 0, $h);
$zones[2][1][1]=array($l-2*$t_root, 0, 0);
$zones[2][1][2]=array($l-$t_root, $t_root, 0);
$zones[2][1][3]=array($l-$t_root, $t_root, $h);

//w3
$zones[2][2][0]=array($l-$t_root, $t_root, $h);//l=10,b=6,h=4,p=3
$zones[2][2][1]=array($l-$t_root, $t_root, 0);
$zones[2][2][2]=array(-$t_root, $t_root, 0);
$zones[2][2][3]=array(-$t_root, $t_root, $h);


//w4
$zones[2][3][0]=array(-$t_root, $t_root, $h);
$zones[2][3][1]=array(-$t_root, $t_root, 0);
$zones[2][3][2]=array(0, 0, 0);
$zones[2][3][3]=array(0, 0, $h);

//roof
$zones[2][4][0]=array(0, 0, $h);
$zones[2][4][1]=array($l-2*$t_root, 0, $h);
$zones[2][4][2]=array($l-$t_root, $t_root, $h);
$zones[2][4][3]=array(-$t_root, $t_root, $h);

//floor
$zones[2][5][0]=array(-$t_root, $t_root, 0);
$zones[2][5][1]=array($l-$t_root, $t_root, 0);
$zones[2][5][2]=array($l-2*$t_root, 0, 0);
$zones[2][5][3]=array(0, 0, 0);


//Zone 4
//w1
$zones[3][0][0]=array(0, 0, $h);//l=10,b=6,h=4,p=3
$zones[3][0][1]=array(0, 0, 0);
$zones[3][0][2]=array($t_root, $t_root, 0);
$zones[3][0][3]=array($t_root, $t_root, $h);

//w2
$zones[3][1][0]=array($t_root, $t_root, $h);
$zones[3][1][1]=array($t_root, $t_root, 0);
$zones[3][1][2]=array($t_root, $b-$t_root, 0);
$zones[3][1][3]=array($t_root, $b-$t_root, $h);

//w3
$zones[3][2][0]=array($t_root, $b-$t_root, $h);
$zones[3][2][1]=array($t_root, $b-$t_root, 0);
$zones[3][2][2]=array(0, $b, 0);
$zones[3][2][3]=array(0, $b, $h);

//w4
$zones[3][3][0]=array(0, $b, $h);
$zones[3][3][1]=array(0, $b, 0);
$zones[3][3][2]=array(0, 0, 0);
$zones[3][3][3]=array(0, 0, $h);

//roof
$zones[3][4][0]=array(0, 0, $h);
$zones[3][4][1]=array($t_root, $t_root, $h);
$zones[3][4][2]=array($t_root, $b-$t_root, $h);
$zones[3][4][3]=array(0, $b, $h);

//floor
$zones[3][5][0]=array(0, $b, 0);
$zones[3][5][1]=array($t_root, $b-$t_root, 0);
$zones[3][5][2]=array($t_root, $t_root, 0);
$zones[3][5][3]=array(0, 0, 0);



//Zone 5
//w1
$zones[4][0][0]=array(0, 0, $h);//l=10,b=6,h=4,p=3
$zones[4][0][1]=array(0, 0, 0);
$zones[4][0][2]=array($l-2*$t_root, 0, 0);
$zones[4][0][3]=array($l-2*$t_root, 0, $h);

//w2
$zones[4][1][0]=array($l-2*$t_root, 0, $h);
$zones[4][1][1]=array($l-2*$t_root, 0, 0);
$zones[4][1][2]=array($l-2*$t_root, $b-2*$t_root, 0);
$zones[4][1][3]=array($l-2*$t_root, $b-2*$t_root, $h);

//w3
$zones[4][2][0]=array($l-2*$t_root, $b-2*$t_root, $h);
$zones[4][2][1]=array($l-2*$t_root, $b-2*$t_root, 0);
$zones[4][2][2]=array(0, $b-2*$t_root, 0);
$zones[4][2][3]=array(0, $b-2*$t_root, $h);

//w4
$zones[4][3][0]=array(0, $b-2*$t_root, $h);
$zones[4][3][1]=array(0, $b-2*$t_root, 0);
$zones[4][3][2]=array(0, 0, 0);
$zones[4][3][3]=array(0, 0, $h);

//roof
$zones[4][4][0]=array(0, 0, $h);
$zones[4][4][1]=array($l-2*$t_root, 0, $h);
$zones[4][4][2]=array($l-2*$t_root, $b-2*$t_root, $h);
$zones[4][4][3]=array(0, $b-2*$t_root, $h);

//floor
$zones[4][5][0]=array(0, $b-2*$t_root, 0);
$zones[4][5][1]=array($l-2*$t_root, $b-2*$t_root, 0);
$zones[4][5][2]=array($l-2*$t_root, 0, 0);
$zones[4][5][3]=array(0,0,0);


$file="./templateOffice.idf";
$file1 = fopen($file, "r") or die("can't open template file for reading");
$theData = fread($file1, filesize($file));
fclose($file1);

$theData = str_replace(
	array('%l%', '%b%', '%h%', '%root%', '%lminusroot%', '%bminusroot%', '%lminustworoot%', '%bminustworoot%'),
	array($l, $b, $h, $t_root, $l-$t_root, $b-$t_root, $l-2*$t_root, $b-2*$t_root),
	$theData);

echo "************read<br>";

$file="./templateOfficeOut.idf";
$file1 = fopen($file, "w") or die("can't open template for writing");
fwrite($file1,$theData);
fclose($file1);


for ($i=0; $i < 5; $i++) {//5 zone
	echo "zone $i<br>"; 
	for ($j=0; $j < 6; $j++) {//6 walls 
		for ($k=0; $k < 4; $k++) {//4 points
			for ($l=0; $l < 3; $l++) {//3 coordinates
				echo $zones[$i][$j][$k][$l]." ";
			}
			echo "<br>";
		}
		echo "<br>";
	}
	echo "<br>";
	echo "<br>";
}


?>