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
   <script type="text/javascript" src="./graph/angular.min.js"></script>
   <script type="text/javascript" src="./graph/Cango3D-7v00.js"></script>
	 <script type="text/javascript" src="./graph/jquery.js"></script>
	 <script type="text/javascript" src="./graph/jquery-ui.js"></script>
   <script type="text/javascript" src="<?php echo $working_directory_location_parametric; ?>results250_3.js"></script>
   <link rel="stylesheet" href="./css/jquery-ui.css">
   <link rel="stylesheet" href="./css/pure-min.css">
   <link rel="stylesheet" href="./css/side-menu-old-ie.css">
   <link rel="stylesheet" href="./css/side-menu.css">
   <link rel="stylesheet" href="./css/1.11.5.css">
   <link rel="stylesheet" href="./css/d.css">

<style type="text/css">
  #slider-vertical {
    background: -webkit-linear-gradient(red, green); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(red, green); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(red, green); /* For Firefox 3.6 to 15 */
    background: linear-gradient(red, green); /* Standard syntax (must be last) */    
  }

  #canvasTable {
     border-collapse: collapse;
  }

  canvas{
    height: 200px;
  }

  body{
  }
  .sliderDiv {
    width: 80%;
    left: 10%;
    margin: 2%;
  }
  h3{
    margin: 0px;
  }

  .slider-label-left{
    position: relative;
    top: 20px;
  }

  .slider-label-right{
    float: right;
    position: relative;
  }

</style>
</head>
<body ng-app="">
<div class="hero-titles" style="text-align:center">
  <h1 class="hero-site" style="font-size: 3em">EDOT</h1>
</div>
	<table border="1" style="width:100%;" id="canvasTable" cellpadding="0" cellspacing="0"
    data-ng-init="ufactors=['1.5','3.72','1.5','5.7','3.3']">
		<tbody>
			<tr>
				<td id="firstTd">
					<h3>Plan</h3>
					<canvas id="cvs1"></canvas><br>			
					<input id="zoomcvs1" type="range" name="points" min="10" max="100" value="70">
				</td>
				<td>
					<h3>Elevation</h3>
					<canvas id="cvs2"></canvas><br>								
					<input id="zoomcvs2" type="range" name="points" min="10" max="100" value="70">
				</td>
				<td id="energyTd" rowspan="2">
					<h3>Max Energy (kWh)</h3>
					<div id="slider-vertical" style="height:100%;left:20px"></div>
					<h3>Min Energy</h3>
				</td>
			</tr>
			<tr>
				<td>
					<h3>3D View</h3>
					<canvas id="cvs3"></canvas><br>
					<input id="zoomcvs3" type="range" name="points" min="10" max="100" value="30">
				</td>
				<td>
					<h3>Glass Properties</h3>
          <div>
  					<canvas id="cvs4" style="float:left"></canvas>								
            <table border="1">
              <tbody>
                <tr>
                  <td>U-Factor</td>
                  <td id="curufactor"></td>
                </tr>
                <tr>
                  <td>SHGC</td>
                  <td id="curshgc"></td>
                </tr>
                <tr>
                  <td>VLT</td>
                  <td id="curvlt"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <input id="zoomcvs4" type="range" name="points" min="10" max="100" value="50" hidden>
				</td>			
			</tr>
			<tr></tr>
    <tr>
      <td>
          Azimuth (degrees)
          <div id="slider-azimuth" class="sliderDiv">
            <div class="slider-label-left">0</div>
            <div class="slider-label-right">360</div>
          </div>
      </td>
      <td style="text-align:center">
        Glass Type
        <select id="glassType" onchange="filterData('glassType', this.value)">
          <option value="0" selected="selected">None</option>
          <option value="0.25">U factor: 1.5; SHGC: 0.25; VLT:0.50</option>
          <option value="0.28">U factor: 3.72; SHGC: 0.28; VLT: 0.27</option>
          <option value="0.20">U factor: 1.5; SHGC: 0.20; VLT: 0.35</option>
          <option value="0.67">U factor: 5.7; SHGC: 0.67; VLT: 0.67</option>
          <option value="0.85">U factor: 3.3; SHGC: 0.85; VLT: 0.85</option>
        </select>
      </td>
      <td rowspan="3"></td>
    </tr>
    <tr>
      <td>Aspect Ratio<div id="slider-aspectratio" class="sliderDiv">
        <div class="slider-label-left">0</div>
        <div class="slider-label-right">10</div>        
      </div></td>
      <td>Overhang (meter)<div id="slider-overhang" class="sliderDiv">
        <div class="slider-label-left">0</div>
        <div class="slider-label-right">10</div>        
      </div></td>
    </tr>
    <tr>
      <td>WWR (%)<div id="slider-wwr" class="sliderDiv">
        <div class="slider-label-left">5</div>
        <div class="slider-label-right">95</div>        
      </div></td>
      <td id="initInputInfo" style="text-align:center">
      </td>
    </tr>
  </tbody>
</table>

	<script type="text/javascript">

  minValArray = [];
  maxValArray = [];
  azimuthVals = [];
  wwrVals = [];
  aspectVals = [];
  overhangVals = [];

  function min(a,b){
    if(a<b)
      return a;
    return b;
  }
  function max(a,b){
    if(a>b)
      return a;
    return b;
  }

  function locateMin(data){
    minValArray = data[0];
    maxValArray = data[0];
    for (var i = data.length - 1; i >= 0; i--) {
      minValArray.azimuth = min(minValArray.azimuth, data[i].azimuth);
      minValArray.wwr = min(minValArray.wwr, data[i].wwr);
      minValArray.overhang = min(minValArray.overhang, data[i].overhang);
      minValArray.aspectRatio = min(minValArray.aspectRatio, data[i].aspectRatio);
      minValArray.energy = min(minValArray.energy, data[i].energy);

      maxValArray.azimuth = max(maxValArray.azimuth, data[i].azimuth);
      maxValArray.wwr = max(maxValArray.wwr, data[i].wwr);
      maxValArray.overhang = max(maxValArray.overhang, data[i].overhang);
      maxValArray.aspectRatio = max(maxValArray.aspectRatio, data[i].aspectRatio);
      maxValArray.energy = max(maxValArray.energy, data[i].energy);
    };
  }

  function findDistinct(data){
    for (var i = data.length - 1; i >= 0; i--) {
      var flag=0;
      for (var j = azimuthVals.length - 1; j >= 0; j--) {
        if(azimuthVals[j]===data[i].azimuth){
          flag=1;
          break;
        }
      };
      if(flag===0){
        azimuthVals.push(data[i].azimuth);
      }
      flag=0;

      for (var j = wwrVals.length - 1; j >= 0; j--) {
        if(wwrVals[j]===data[i].wwr){
          flag=1;
          break;
        }
      };
      if(flag===0){
        wwrVals.push(data[i].wwr);
      }
      flag=0;

      for (var j = aspectVals.length - 1; j >= 0; j--) {
        if(aspectVals[j]===data[i].aspectRatio){
          flag=1;
          break;
        }
      };
      if(flag===0){
        aspectVals.push(data[i].aspectRatio);
      }

      flag=0;
      for (var j = overhangVals.length - 1; j >= 0; j--) {
        if(overhangVals[j]===data[i].overhang){
          flag=1;
          break;
        }
      };
      if(flag===0){
        overhangVals.push(data[i].overhang);
      }
      flag=0;
    };
    azimuthVals.sort(function(a, b){return a-b});
    wwrVals.sort(function(a, b){return a-b});
    overhangVals.sort(function(a, b){return a-b});
    aspectVals.sort(function(a, b){return a-b});
  }

  storeData=data;
  locateMin(storeData);
  findDistinct(storeData);

  $("canvas").width($("#firstTd").width());
  $("#cvs4").width($("#firstTd").width()/2);
	$("#slider-vertical").css("height", $("#energyTd").height()-100);

  $( "#slider-azimuth" ).slider({
    orientation: "horizontal",
    range: true,
    min: 0,
    max: 4,
    values: [0, 4],
    slide: function( event, ui ) {
      console.log(ui);
      filterData("azimuth", [ azimuthVals[ui.values[0]], azimuthVals[ui.values[1]] ]);
      $($("#slider-azimuth").children()[0]).html(azimuthVals[ui.values[0]]);
      $($("#slider-azimuth").children()[1]).html(azimuthVals[ui.values[1]]);
    }
  });
  $($("#slider-azimuth").children()[0]).html(azimuthVals[0]);
  $($("#slider-azimuth").children()[1]).html(azimuthVals[4]);
  $( "#slider-aspectratio" ).slider({
    orientation: "horizontal",
    range: true,
    min: 0,
    max: 4,
    values: [0, 4],
    slide: function( event, ui ) {
      console.log(ui);
      filterData("aspectRatio", [ aspectVals[ui.values[0]], aspectVals[ui.values[1]] ]);
      $($("#slider-aspectratio").children()[0]).html(aspectVals[ui.values[0]]);
      $($("#slider-aspectratio").children()[1]).html(aspectVals[ui.values[1]]);
    }
  });
  $($("#slider-aspectratio").children()[0]).html(aspectVals[0]);
  $($("#slider-aspectratio").children()[1]).html(aspectVals[1]);
  $( "#slider-wwr" ).slider({
    orientation: "horizontal",
    range: true,
    min: 0,
    max: 4,
    values: [0, 4],
    slide: function( event, ui ) {
      console.log(ui);
      filterData("wwr", [ wwrVals[ui.values[0]], wwrVals[ui.values[1]] ]);
      $($("#slider-wwr").children()[0]).html(wwrVals[ui.values[0]]);
      $($("#slider-wwr").children()[1]).html(wwrVals[ui.values[1]]);
    }
  });
  $($("#slider-wwr").children()[0]).html(wwrVals[0]);
  $($("#slider-wwr").children()[1]).html(wwrVals[4]);
  $( "#slider-overhang" ).slider({
    orientation: "horizontal",
    range: true,
    min: 0,
    max: 4,
    values: [0, 4],
    slide: function( event, ui ) {
      console.log(ui);
      filterData("overhang", [ overhangVals[ui.values[0]], overhangVals[ui.values[1]] ]);
      $($("#slider-overhang").children()[0]).html(overhangVals[ui.values[0]]);
      $($("#slider-overhang").children()[1]).html(overhangVals[ui.values[1]]);
    }
  });
  $($("#slider-overhang").children()[0]).html(overhangVals[0]);
  $($("#slider-overhang").children()[1]).html(overhangVals[4]);

  function updateshgc(shgc){
    var ufactor, vlt;
    if(shgc===0.25){
      ufactor=1.5;
      vlt=0.50;
    }
    if(shgc===0.28){
      ufactor=3.72;
      vlt=0.27;
    }
    if(shgc===0.67){
      ufactor=5.7;
      vlt=0.67;
    }
    if(shgc===0.20){
      ufactor=1.5;
      vlt=0.35;
    }
    if(shgc===0.85){
      ufactor=3.3;
      vlt=0.85;
    }
    $("#curshgc").html(shgc);
    $("#curvlt").html(vlt);
    $("#curufactor").html(ufactor+" W/m<sup>2</sup>-K");
  }

	var totalArea = "<?php echo 50; ?>";

  function init(data){
    if(data.length===0){
      return ;
    }
    var initval=Math.floor(data.length/2);
    var energyIndex = initval;
    console.log(data);
    console.log(data.length/2);
    console.log("energyIndex " + energyIndex);

    $( "#slider-vertical" ).slider({
      orientation: "vertical",
      range: false,
      min: 0,
      max: data.length-1,
      value: initval,
      slide: function( event, ui ) {
        energyIndex = ui.value;
        drawCube4("cvs4", data[energyIndex]);
        drawCube3("cvs3", data[energyIndex]);
        drawCube2("cvs2", data[energyIndex]);
        drawCube1("cvs1", data[energyIndex]);
        updateshgc(data[energyIndex].shgc);
        console.log(data[energyIndex]);
        $($("#slider-vertical").children()[0]).html("<span style=\"left:20px;position:relative;\">"+data[energyIndex].energy.toFixed(1)+"</span>");
      }
    });
    $($("#slider-vertical").children()[0]).html("<span style=\"left:20px;position:relative;\">"+data[energyIndex].energy.toFixed(1)+"</span>");
    updateshgc(data[energyIndex].shgc);

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

    drawCube4("cvs4", data[energyIndex]);
    drawCube3("cvs3", data[energyIndex]);
  	drawCube2("cvs2", data[energyIndex]);
  	drawCube1("cvs1", data[energyIndex]);
    $("#initInputInfo").html(
      "Azimuth : " + data[energyIndex].azimuth + " degrees" + "<br>" +
      "WWR : " + data[energyIndex].wwr + " %" + "<br>" +
      "Overhang : " + data[energyIndex].overhang + " m" + "<br>" +
      "Aspect Ratio : " + data[energyIndex].aspectRatio + "<br>"
    );
  }

  init(data);

  var filterInfo = {};

  function filterData(param, val){
    if(param==="glassType"){
      if(typeof val === "string"){
        val=parseFloat(val);
      }
    }
    filterInfo[param] = val;
    applyFiltering(filterInfo);
  }

  function applyFiltering(filterInfo){
    console.log("filtering Info");
    console.log(filterInfo);
    console.log("filtering");
    data=storeData;
    var tempdata=storeData;
    if(filterInfo.glassType){
        tempdata=data;
        data=[];
        var val=filterInfo.glassType;
        for (var i = tempdata.length - 1; i >= 0; i--) {
          // console.log(typeof tempdata[i].shgc + typeof val);
          // console.log(tempdata[i].shgc + " " + val);
          if(val===0){
            data.push(tempdata[i]);
          }
          else if(tempdata[i].shgc===val){
            data.push(tempdata[i]);
          }
        }
      }
      if(filterInfo.azimuth){
        tempdata=data;
        data=[];
        var val=filterInfo.azimuth;
        // console.log("azimuth vals are " + val[0] + " " + val[1]);
        for (var i = tempdata.length - 1; i >= 0; i--) {
          if(tempdata[i].azimuth>=val[0] && tempdata[i].azimuth<=val[1]){
            data.push(tempdata[i]);
          }
        };
      }
      if(filterInfo.aspectRatio){
        tempdata=data;
        data=[];
        var val=filterInfo.aspectRatio;
        // console.log("azimuth vals are " + val[0] + " " + val[1]);
        for (var i = tempdata.length - 1; i >= 0; i--) {
          if(tempdata[i].aspectRatio>=val[0] && tempdata[i].aspectRatio<=val[1]){
            data.push(tempdata[i]);
          }
        };
      }
      if(filterInfo.wwr){
        tempdata=data;
        data=[];
        var val=filterInfo.wwr;
        // console.log("azimuth vals are " + val[0] + " " + val[1]);
        for (var i = tempdata.length - 1; i >= 0; i--) {
          if(tempdata[i].wwr>=val[0] && tempdata[i].wwr<=val[1]){
            data.push(tempdata[i]);
          }
        };
      }
      if(filterInfo.overhang){
        tempdata=data;
        data=[];
        var val=filterInfo.overhang;
        // console.log("azimuth vals are " + val[0] + " " + val[1]);
        for (var i = tempdata.length - 1; i >= 0; i--) {
          if(tempdata[i].overhang>=val[0] && tempdata[i].overhang<=val[1]){
            data.push(tempdata[i]);
          }
        };
      }
      console.log("sizeof data " + data.length);
      init(data);
    }

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

        var incx=0;
        if(mousePos.x - savMouse.x > 0){
          incx++;
        }
        else{
          incx--;
        }
        var incz=0;
        if(mousePos.y - savMouse.y > 0){
          incz++;
        }
        else{
          incz--;
        }
        incx=csrPt.x - dragPt.x;
        incz=csrPt.y - dragPt.y;
        console.log(incx + " " + incz);
        console.log(this.grabOfs);
        console.log(savMouse);
        console.log(mousePos);

        savMouse = mousePos;    // save these as reference for next drag

        cube.translate(-incx, 0, incz);

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
      cube.enableDrag(grabCube, dragCube, null);

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
      						data.aspectRatio, data.overhang, 3, true);
      
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
	function buildRectShape(g, colors, totalArea, azimuth, wwr, aspectRatio, overhangDepth, height, floor) // pass width and array of 6 colors
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
		walls[0][0] = [0, 0, 0];//proper
		walls[0][1] = [0, height, 0];
		walls[0][2] = [length, height, 0];
		walls[0][3] = [length, 0, 0];

		walls[1][0] = [length, 0, 0];//proper
		walls[1][1] = [length, height, 0];
		walls[1][2] = [length, height, breadth];
		walls[1][3] = [length, 0, breadth];

		walls[2][0] = [0, 0, breadth];//proper
		walls[2][1] = [length, 0, breadth];
		walls[2][2] = [length, height, breadth];
		walls[2][3] = [0, height, breadth];

		walls[3][0] = [0, 0, 0];//proper
		walls[3][1] = [0, 0, breadth];
		walls[3][2] = [0, height, breadth];
		walls[3][3] = [0, height, 0];

		//floor proper
		walls[4][0] = [0, 0, 0];
		walls[4][1] = [length, 0, 0];
		walls[4][2] = [length, 0, breadth];
		walls[4][3] = [0, 0, breadth];

		//ceiling proper
		walls[5][0] = [0, height, 0];
		walls[5][1] = [0, height, breadth];
		walls[5][2] = [length, height, breadth];
		walls[5][3] = [length, height, 0];

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

    if(floor===true){
      totalwalls++;
      walls[totalwalls]=[];
      flen=10;
      fbred=10;
      walls[14][0] = [-flen, -smallinc,  -flen];
      walls[14][1] = [ flen, -smallinc,  -flen];
      walls[14][2] = [ flen, -smallinc,   flen];
      walls[14][3] = [-flen, -smallinc, flen];
    }

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
        faces.addObj(side);
	  	};

	  return faces;
	}

	</script>
</body>
</html>
