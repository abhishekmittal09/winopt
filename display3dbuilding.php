<?php


$unique_counter = "a6f0eb35-00a0-de35-e541-2295ad61a265";

extract($_GET);
extract($_POST);

$working_directory_location_parametric = "./working_directory/parametric/$unique_counter/";

$azimuth1=array();
$energy1=array();
$wwr1=array();
$ratio1=array();
$shgc1=array();
$depth1=array();
$u_factor1=array();
$vlt1=array();
$count=0;
$file=fopen($working_directory_location_parametric."finalvalues.txt","r");
$flag=0;
if($file == NULL){

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
         $azimuth1[$count]=$piece[1];
         $wwr1[$count]=$piece[2];
         $depth1[$count]=$piece[3];
         $ratio1[$count]=$piece[4];
         $shgc1[$count]=$piece[5];
         $u_factor1[$count]=$piece[6];
         $vlt1[$count]=$piece[7];
         $count=$count+1;
      }

      //sorting the values
      $x1=0;
      $y1=0;
      while($x1 < $count)
      {
        $y1=0;
        while($y1 < $count)
        {
          if($energy1[$x1] < $energy1[$y1])
          {
            $temp1=$energy1[$x1];
            $energy1[$x1]=$energy1[$y1];
            $energy1[$y1]=$temp1;


            $temp1=$azimuth1[$x1];
            $azimuth1[$x1]=$azimuth1[$y1];
            $azimuth1[$y1]=$temp1;

            $temp1=$wwr1[$x1];
            $wwr1[$x1]=$wwr1[$y1];
            $wwr1[$y1]=$temp1;

            $temp1=$depth1[$x1];
            $depth1[$x1]=$depth1[$y1];
            $depth1[$y1]=$temp1;

            $temp1=$ratio1[$x1];
            $ratio1[$x1]=$ratio1[$y1];
            $ratio1[$y1]=$temp1;

            $temp1=$shgc1[$x1];
            $shgc1[$x1]=$shgc1[$y1];
            $shgc1[$y1]=$temp1;

            $temp1=$u_factor1[$x1];
            $u_factor1[$x1]=$u_factor1[$y1];
            $u_factor1[$y1]=$temp1;

            $temp1=$vlt1[$x1];
            $vlt1[$x1]=$vlt1[$y1];
            $vlt1[$y1]=$temp1;

          }
          $y1=$y1+1;
        }
        $x1=$x1+1;
      }
}

$fp1=fopen($working_directory_location_parametric."results250_3.js","w");
if(!$fp1){

     echo "unable to open file";
}

$str="var data = [
";

$foldsize=($count/10);
if($foldsize<=0){
$foldsize=1;
}
for($i=0;$i<$count;$i++){
     $str=$str."{'group':".(int)($i/$foldsize);
     $str=$str.",'azimuth':$azimuth1[$i]";
             $str=$str.",'wwr':$wwr1[$i]";
             $str=$str.",'overhang':$depth1[$i]";
             $str=$str.",'aspectRatio':$ratio1[$i]";
             $str=$str.",'shgc':$shgc1[$i]";
             $str=$str.",'energy':$energy1[$i]";
     if($i==$count-1){
     $str=$str."}
";
     }
     else{
     $str=$str."},
";

     }
}
$str=$str."];";
fwrite($fp1,$str);
fclose($fp1);

?>


<html>
<head>
	 <script type="text/javascript" src="./graph/Cango3D-7v00.js"></script>
	 <script type="text/javascript" src="./graph/jquery.js"></script>
	 <script type="text/javascript" src="./graph/jquery-ui.js"></script>
     <script type="text/javascript" src="<?php echo $working_directory_location_parametric; ?>results250_3.js"></script>
	<link rel="stylesheet" href="./css/jquery-ui.css">
<style type="text/css">
  #canvasTable {
     border-collapse: collapse;
  }
  canvas{
    height: 200px;
  }
</style>
</head>
<body>


	<table border="1" style="width:100%;" id="canvasTable" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td>
					<h3>Plan</h3>
					<canvas id="cvs1"></canvas><br>			
					<input id="zoomcvs1" type="range" name="points" min="10" max="100" value="70">
				</td>
				<td>
					<h3>Elevation</h3>
					<canvas id="cvs2"></canvas><br>								
					<input id="zoomcvs2" type="range" name="points" min="10" max="100" value="70">
				</td>
				<td rowspan="2">
					<h3>Max Energy</h3>
					<div id="slider-vertical" style="height:100%;left:20px"></div>
					<h3>Min Energy</h3>
				</td>
			</tr>
			<tr>
				<td>
					<h3>3D View</h3>
					<canvas id="cvs3"></canvas><br>
					<input id="zoomcvs3" type="range" name="points" min="10" max="100" value="70">
				</td>
				<td>
					<h3>Glass Properties</h3>
					<canvas id="cvs4"></canvas><br>								
          <input id="zoomcvs4" type="range" name="points" min="10" max="100" value="70">
				</td>			
			</tr>
			<tr></tr>
		</tbody>
	</table>

	<script type="text/javascript">

  //$("canvas").css($(td).width());
	$("#slider-vertical").css("height", $("#canvasTable").height()-50);

	var initval=Math.floor(data.length/2);
	var energyIndex = initval;
	$(function() {
		$( "#slider-vertical" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: data.length-1,
			value: initval,
			slide: function( event, ui ) {
				energyIndex = ui.value;
        drawCube4("cvs4", data[energyIndex]);
				drawCube3("cvs3", data[energyIndex]);
				drawCube2("cvs2", data[energyIndex]);
				drawCube1("cvs1", data[energyIndex]);
				console.log(data[energyIndex]);
			}
		});
		console.log(energyIndex);
	});
	</script>
	<script type="text/javascript">

	var totalArea = "<?php echo 50; ?>";

	//$( "#energyRange" ).attr("max", data.length);

	$( "#zoomcvs1" ).change(function() {
		drawCube1("cvs1", data[energyIndex]);
	});
	$( "#zoomcvs2" ).change(function() {
		drawCube2("cvs2", data[energyIndex]);
	});
  $( "#zoomcvs3" ).change(function() {
    drawCube3("cvs3", data[energyIndex]);
  });
  $( "#zoomcvs4" ).change(function() {
    drawCube4("cvs4", data[energyIndex]);
  });

	// $( "#energyRange" ).change(function() {
	// 	energyIndex = $( "#energyRange" ).val();
	// 	drawCube3("cvs3", data[energyIndex]);
	// 	drawCube2("cvs2", data[energyIndex]);
	// 	drawCube1("cvs1", data[energyIndex]);
	// 	console.log(data[energyIndex]);
	// });

  drawCube4("cvs4", data[energyIndex]);
  drawCube3("cvs3", data[energyIndex]);
	drawCube2("cvs2", data[energyIndex]);
	drawCube1("cvs1", data[energyIndex]);

    function drawCube1(cvsID, data)
    {//topview
      var g = new Cango3D(cvsID),  // create a graphics context
          width = 100,
          colors = ["3399FF", "green", "blue", "yellow", "silver", "sienna"],
          cube, movedCube,
          radius = 50,         // sensitivity of dragging action
          savMouse,
          dragPt,
          csrPt,
          u, theta;

      function grabCube(mousePos)
      {
        savMouse = mousePos;
      }

      function dragCube(mousePos)
      {
        // This drag function rotates an object around its drawing origin
        // assume a lever from drawing origin to drag point z=radius is moved by csr
        var dragPt = {x:savMouse.x-this.grabOfs.x, y:savMouse.y-this.grabOfs.y, z:radius},
            csrPt = {x:mousePos.x-this.grabOfs.x, y:mousePos.y-this.grabOfs.y, z:radius},
            u, theta;

        savMouse = mousePos;    // save these as reference for next drag
        // axis to rotate lever is the normal to plane defined by the 3 points
        u = calcNormal(this.dwgOrg, dragPt, csrPt);
        // calc angle between dragPt and csrPt (amount of rotation needed about axis 'u')
        theta = calcIncAngle(this.dwgOrg, dragPt, csrPt);    // degrees
        // apply this drag rotation to 'cube' Group3D
        //cube.transform.rotate(u.x, u.y, u.z, theta);
        if(u.y>0){
        	u.y=1;
        }
        else{
        	u.y=-1;
        }
        cube.transform.rotate(0, u.y, 0, theta); //rotates only in the x-z direction
        // redraw with rotation applied
        g.renderFrame(movedCube);
      }

      g.clearCanvas();
      g.setPropertyDefault("backgroundColor", "lightyellow");
      g.setWorldCoords3D(-150, -100, 400);
      g.setLightSource(0, 0, 200);

      var origin = [0,0,0];

      cube = buildRectShape(g, colors, totalArea, data.azimuth, [data.wwr, data.wwr, data.wwr, data.wwr],
      						data.aspectRatio, data.overhang, 3);
      
      cube.scale($( "#zoomcvs1" ).val()/5);
      //cube = buildCubemanual(g, 100, colors, [0,0,0]);

      // move the cube so cnter is over the drawing origin for nice drag rotation
      //cube.translate(-width/2, -width/2, width/2);

      // enable dragging
      //cube.enableDrag(grabCube, dragCube, null);

      // make a group to move the cube independent of turning
      movedCube = g.createGroup3D(cube);
      movedCube.transform.rotate(1, 0, 0, 90);
      movedCube.transform.rotate(0, 1, 0, data.azimuth);

      g.render(movedCube);
    }


    function drawCube2(cvsID, data)
    {
      var g = new Cango3D(cvsID),  // create a graphics context
          width = 100,
          colors = ["3399FF", "green", "blue", "yellow", "silver", "sienna"],
          cube, movedCube,
          radius = 50,         // sensitivity of dragging action
          savMouse,
          dragPt,
          csrPt,
          u, theta;

      function grabCube(mousePos)
      {
        savMouse = mousePos;
      }

      function dragCube(mousePos)
      {
        // This drag function rotates an object around its drawing origin
        // assume a lever from drawing origin to drag point z=radius is moved by csr
        var dragPt = {x:savMouse.x-this.grabOfs.x, y:savMouse.y-this.grabOfs.y, z:radius},
            csrPt = {x:mousePos.x-this.grabOfs.x, y:mousePos.y-this.grabOfs.y, z:radius},
            u, theta;

        savMouse = mousePos;    // save these as reference for next drag
        // axis to rotate lever is the normal to plane defined by the 3 points
        u = calcNormal(this.dwgOrg, dragPt, csrPt);
        // calc angle between dragPt and csrPt (amount of rotation needed about axis 'u')
        theta = calcIncAngle(this.dwgOrg, dragPt, csrPt);    // degrees
        // apply this drag rotation to 'cube' Group3D
        //cube.transform.rotate(u.x, u.y, u.z, theta);
        if(u.y>0){
        	u.y=1;
        }
        else{
        	u.y=-1;
        }
        cube.transform.rotate(0, u.y, 0, theta); //rotates only in the x-z direction
        // redraw with rotation applied
        g.renderFrame(movedCube);
      }

      g.clearCanvas();
      g.setPropertyDefault("backgroundColor", "lightyellow");
      g.setWorldCoords3D(-150, -40, 400);
      g.setLightSource(0, 100, 200);

      var origin = [0,0,0];

      //cube = buildRectShape(g, colors, 10000, 30, [20, 10, 90, 50], 2, 10, 30);
      cube = buildRectShape(g, colors, totalArea, data.azimuth, [data.wwr, data.wwr, data.wwr, data.wwr],
      						data.aspectRatio, data.overhang, 3);
      
      cube.scale($( "#zoomcvs2" ).val()/5);
      //cube = buildCubemanual(g, 100, colors, [0,0,0]);

      // move the cube so cnter is over the drawing origin for nice drag rotation
      //cube.translate(-width/2, -width/2, width/2);

      // enable dragging
      cube.enableDrag(grabCube, dragCube, null);

      // make a group to move the cube independent of turning
      movedCube = g.createGroup3D(cube);
      movedCube.transform.rotate(0, 1, 0, data.azimuth);

      g.render(movedCube);
    }


    function drawCube3(cvsID, data)
    {
      var g = new Cango3D(cvsID),  // create a graphics context
          width = 100,
          colors = ["3399FF", "green", "blue", "yellow", "silver", "sienna"],
          cube, movedCube,
          radius = 50,         // sensitivity of dragging action
          savMouse,
          dragPt,
          csrPt,
          u, theta;

      function grabCube(mousePos)
      {
        savMouse = mousePos;
      }

      function dragCube(mousePos)
      {
        // This drag function rotates an object around its drawing origin
        // assume a lever from drawing origin to drag point z=radius is moved by csr
        var dragPt = {x:savMouse.x-this.grabOfs.x, y:savMouse.y-this.grabOfs.y, z:radius},
            csrPt = {x:mousePos.x-this.grabOfs.x, y:mousePos.y-this.grabOfs.y, z:radius},
            u, theta;

        savMouse = mousePos;    // save these as reference for next drag
        // axis to rotate lever is the normal to plane defined by the 3 points
        u = calcNormal(this.dwgOrg, dragPt, csrPt);
        // calc angle between dragPt and csrPt (amount of rotation needed about axis 'u')
        theta = calcIncAngle(this.dwgOrg, dragPt, csrPt);    // degrees
        // apply this drag rotation to 'cube' Group3D
        cube.transform.rotate(u.x, u.y, u.z, theta);
        //cube.transform.rotate(0, 1, 0, theta); //rotates only in the x-z direction
        // redraw with rotation applied
        g.renderFrame(movedCube);
      }

      g.clearCanvas();
      g.setPropertyDefault("backgroundColor", "lightyellow");
      g.setWorldCoords3D(-100, -10, 150);
      g.setLightSource(0, 100, 200);

      var origin = [0,0,0];

      //cube = buildRectShape(g, colors, 10000, 30, [20, 10, 90, 50], 2, 10, 30);
      cube = buildRectShape(g, colors, totalArea, data.azimuth, [data.wwr, data.wwr, data.wwr, data.wwr],
      						data.aspectRatio, data.overhang, 3);
      
      cube.scale($( "#zoomcvs3" ).val()/5);
      //cube = buildCubemanual(g, 100, colors, [0,0,0]);

      // move the cube so cnter is over the drawing origin for nice drag rotation
      //cube.translate(-width/2, -width/2, width/2);

      // enable dragging
      cube.enableDrag(grabCube, dragCube, null);

      // make a group to move the cube independent of turning
      movedCube = g.createGroup3D(cube);
      movedCube.transform.rotate(0, 1, 0, data.azimuth);

      g.render(movedCube);
    }

    function drawCube4(cvsID, data)
    {
      var g = new Cango3D(cvsID),  // create a graphics context
          width = 100,
          colors = ["3399FF", "green", "blue", "yellow", "silver", "sienna"],
          cube, movedCube,
          radius = 50,         // sensitivity of dragging action
          savMouse,
          dragPt,
          csrPt,
          u, theta;

      function grabCube(mousePos)
      {
        savMouse = mousePos;
      }

      function dragCube(mousePos)
      {
        // This drag function rotates an object around its drawing origin
        // assume a lever from drawing origin to drag point z=radius is moved by csr
        var dragPt = {x:savMouse.x-this.grabOfs.x, y:savMouse.y-this.grabOfs.y, z:radius},
            csrPt = {x:mousePos.x-this.grabOfs.x, y:mousePos.y-this.grabOfs.y, z:radius},
            u, theta;

        savMouse = mousePos;    // save these as reference for next drag
        // axis to rotate lever is the normal to plane defined by the 3 points
        u = calcNormal(this.dwgOrg, dragPt, csrPt);
        // calc angle between dragPt and csrPt (amount of rotation needed about axis 'u')
        theta = calcIncAngle(this.dwgOrg, dragPt, csrPt);    // degrees
        // apply this drag rotation to 'cube' Group3D
        cube.transform.rotate(u.x, u.y, u.z, theta);
        //cube.transform.rotate(0, 1, 0, theta); //rotates only in the x-z direction
        // redraw with rotation applied
        g.renderFrame(movedCube);
      }

      g.clearCanvas();
      g.setPropertyDefault("backgroundColor", "lightyellow");
      g.setWorldCoords3D(-40, -10, 200);
      g.setLightSource(0, 100, 200);

      var origin = [0,0,0];

      //cube = buildRectShape(g, colors, 10000, 30, [20, 10, 90, 50], 2, 10, 30);
      cube = buildRectShape(g, colors, totalArea, 0, [0, 0, 0, 0],
                  1, 0, 0.3);
      
      cube.scale($( "#zoomcvs4" ).val()/5);
      //cube = buildCubemanual(g, 100, colors, [0,0,0]);

      // move the cube so cnter is over the drawing origin for nice drag rotation
      //cube.translate(-width/2, -width/2, width/2);

      // enable dragging
      cube.enableDrag(grabCube, dragCube, null);

      // make a group to move the cube independent of turning
      movedCube = g.createGroup3D(cube);
      movedCube.transform.rotate(1, 0, 0, -90);
      g.render(movedCube);
    }

    //here order of wwr is (north, east, south, west)
	function buildRectShape(g, colors, totalArea, azimuth, wwr, aspectRatio, overhangDepth, height) // pass width and array of 6 colors
	{

		var length=Math.sqrt(aspectRatio*totalArea);
		var breadth=totalArea/length;

		var height_of_window=height;//fixing the height of the window to 3; according the given model

		var wwr_height = [];
		var wwr_startz = [];

		wwr_height[0] = wwr[0]/100*height_of_window;
		wwr_startz[0] = height_of_window/2+wwr_height[0]/2;

		wwr_height[1] = wwr[1]/100*height_of_window;
		wwr_startz[1] = height_of_window/2+wwr_height[1]/2;

		wwr_height[2] = wwr[2]/100*height_of_window;
		wwr_startz[2] = height_of_window/2+wwr_height[2]/2;

		wwr_height[3] = wwr[3]/100*height_of_window;
		wwr_startz[3] = height_of_window/2+wwr_height[3]/2;

		var walls = [];
		var totalwalls = 13;
		for (var i = totalwalls; i >= 0; i--) {
			walls[i] = [];
		};
		//side walls
		walls[0][0] = [0, 0, 0];
		walls[0][1] = [length, 0, 0];
		walls[0][2] = [length, height, 0];
		walls[0][3] = [0, height, 0];

		walls[1][0] = [length, 0, 0];
		walls[1][1] = [length, height, 0];
		walls[1][2] = [length, height, breadth];
		walls[1][3] = [length, 0, breadth];

		walls[2][0] = [0, 0, breadth];
		walls[2][1] = [0, height, breadth];
		walls[2][2] = [length, height, breadth];
		walls[2][3] = [length, 0, breadth];

		walls[3][0] = [0, 0, 0];
		walls[3][1] = [0, height, 0];
		walls[3][2] = [0, height, breadth];
		walls[3][3] = [0, 0, breadth];

		//floor
		walls[4][0] = [0, 0, 0];
		walls[4][1] = [length, 0, 0];
		walls[4][2] = [length, 0, breadth];
		walls[4][3] = [0, 0, breadth];

		//ceiling
		walls[5][0] = [0, height, 0];
		walls[5][1] = [length, height, 0];
		walls[5][2] = [length, height, breadth];
		walls[5][3] = [0, height, breadth];

		//overhang wall1
		walls[6][0] = [0, wwr_startz[0], 0];
		walls[6][1] = [length, wwr_startz[0], 0];
		walls[6][2] = [length, wwr_startz[0], -overhangDepth];
		walls[6][3] = [0, wwr_startz[0], -overhangDepth];

		walls[7][0] = [length, wwr_startz[1], 0];
		walls[7][1] = [length, wwr_startz[1], breadth];
		walls[7][2] = [length+overhangDepth, wwr_startz[1], breadth];
		walls[7][3] = [length+overhangDepth, wwr_startz[1], 0];

		walls[8][0] = [length, wwr_startz[2], breadth];
		walls[8][1] = [0, wwr_startz[2], breadth];
		walls[8][2] = [0, wwr_startz[2], breadth+overhangDepth];
		walls[8][3] = [length, wwr_startz[2], breadth+overhangDepth];

		walls[9][0] = [0, wwr_startz[3], breadth];
		walls[9][1] = [0, wwr_startz[3], 0];
		walls[9][2] = [-overhangDepth, wwr_startz[3], 0];
		walls[9][3] = [-overhangDepth, wwr_startz[3], breadth];

		var smallinc = 0.01;
		//windows
		walls[10][0] = [0, wwr_startz[0], 0-smallinc];
		walls[10][1] = [length, wwr_startz[0], 0-smallinc];
		walls[10][2] = [length, wwr_startz[0]-wwr_height[0], 0-smallinc];
		walls[10][3] = [0, wwr_startz[0]-wwr_height[0], 0-smallinc];

		walls[11][0] = [length+smallinc, wwr_startz[1], 0];
		walls[11][1] = [length+smallinc, wwr_startz[1], breadth];
		walls[11][2] = [length+smallinc, wwr_startz[1]-wwr_height[1], breadth];
		walls[11][3] = [length+smallinc, wwr_startz[1]-wwr_height[1], 0];

		walls[12][0] = [length, wwr_startz[2], breadth+smallinc];
		walls[12][1] = [0, wwr_startz[2], breadth+smallinc];
		walls[12][2] = [0, wwr_startz[2]-wwr_height[2], breadth+smallinc];
		walls[12][3] = [length, wwr_startz[2]-wwr_height[2], breadth+smallinc];

		walls[13][0] = [0-smallinc, wwr_startz[3], breadth];
		walls[13][1] = [0-smallinc, wwr_startz[3], 0];
		walls[13][2] = [0-smallinc, wwr_startz[3]-wwr_height[3], 0];
		walls[13][3] = [0-smallinc, wwr_startz[3]-wwr_height[3], breadth];

		console.log(walls);

	  	var sq=[];
	    var colorNum = 4;
	    var  faces = g.createGroup3D(),
	      side;

	  	for (var i = walls.length - 1; i >= 0; i--) {
	  		if(i>=10){
	  			colorNum=0;
	  		}
	  		else{
	  			colorNum=4;
	  		}
		  	sq[i] = ['M',walls[i][0][0], walls[i][0][1], walls[i][0][2], 'L',walls[i][1][0],walls[i][1][1],walls[i][1][2],
		  	walls[i][2][0], walls[i][2][1], walls[i][2][2], walls[i][3][0], walls[i][3][1], walls[i][3][2], 'z'];
		    side = g.compileShape3D(sq[i], colors[colorNum]);
		   	//side.backHidden = true;
		    faces.addObj(side);
	  	};

	  return faces;
	}

	</script>
</body>
</html>
