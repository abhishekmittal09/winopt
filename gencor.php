<?php

//wwr is an array of wwr's of each wall
function getCoordinates($totalArea, $azimuth, $wwr, $aspectRatio, $overhangDepth, $heightBuilding){

	$length=sqrt($aspectRatio*$totalArea);
	$breadth=$totalArea/$length;

	$height_of_window=3;//fixing the height of the window to 3; according the given model

	$wwr_height = array();
	$wwr_startz = array();

	$wwr_height[0]=$wwr[0]/100*$height_of_window;
	$wwr_startz[0]=$height_of_window/2-$wwr_height[0]/2;

	$wwr_height[1]=$wwr[1]/100*$height_of_window;
	$wwr_startz[1]=$height_of_window/2-$wwr_height[1]/2;

	$wwr_height[2]=$wwr[2]/100*$height_of_window;
	$wwr_startz[2]=$height_of_window/2-$wwr_height[2]/2;

	$wwr_height[3]=$wwr[3]/100*$height_of_window;
	$wwr_startz[3]=$height_of_window/2-$wwr_height[3]/2;

	$walls = array();

	//side walls
	$walls[0][0] = [0, 0, 0];
	$walls[0][1] = [$length, 0, 0];
	$walls[0][2] = [$length, $height, 0];
	$walls[0][3] = [0, $height, 0];

	$walls[1][0] = [$length, 0, 0];
	$walls[1][1] = [$length, $height, 0];
	$walls[1][2] = [$length, $height, $breadth];
	$walls[1][3] = [$length, 0, $breadth];

	$walls[2][0] = [0, 0, $breadth];
	$walls[2][1] = [0, $height, $breadth];
	$walls[2][2] = [$length, $height, $breadth];
	$walls[2][3] = [$length, 0, $breadth];

	$walls[3][0] = [0, 0, 0];
	$walls[3][1] = [0, $height, 0];
	$walls[3][2] = [0, $height, $breadth];
	$walls[3][3] = [0, 0, $breadth];

	//floor
	$walls[4][0] = [0, 0, 0];
	$walls[4][1] = [$length, 0, 0];
	$walls[4][2] = [$length, 0, $breadth];
	$walls[4][3] = [0, 0, $breadth];

	//ceiling
	$walls[5][0] = [0, $height, 0];
	$walls[5][1] = [$length, $height, 0];
	$walls[5][2] = [$length, $height, $breadth];
	$walls[5][3] = [0, $height, $breadth];

	return $walls;
}



?>