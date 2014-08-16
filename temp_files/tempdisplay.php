<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>Window OptimiZation Tool</title>

    <link type="text/css" rel="stylesheet" href="./ex.css">
    <script type="text/javascript" src="./protovis.js"></script>
    <style type="text/css"></style>
    <script type="text/javascript" src="./results250.js"></script>
  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/d3.js"></script><style type="text/css"></style>
  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/d3.csv.js"></script>
  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/d3.layout.js"></script>
  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/parallel-coordinates-veggie.js"></script>

  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/jquery.js"></script>
  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/underscore.js"></script>
  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/backbone.js"></script>

  <script src="./Nutrient Contents - Parallel Coordinates_files/jquery-ui-1.8.16.custom.min.js"></script>
  <script type="text/javascript" src="./Nutrient Contents - Parallel Coordinates_files/filter.js"></script>
  
  <!-- SlickGrid -->
  <link rel="stylesheet" href="./Nutrient Contents - Parallel Coordinates_files/slick.grid.css" type="text/css" media="screen" charset="utf-8">
  <script src="./Nutrient Contents - Parallel Coordinates_files/jquery.event.drag-2.0.min.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/slick.core.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/slick.grid.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/slick.dataview.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/slick.pager.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/grid.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/pie.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/options.js"></script>
  <script src="./Nutrient Contents - Parallel Coordinates_files/food-table.js"></script>
  <link rel="stylesheet" href="./Nutrient Contents - Parallel Coordinates_files/style.css" type="text/css" charset="utf-8">
<style type="text/css" rel="stylesheet">.slickgrid_733495 .slick-header-column { left: 1000px; } .slickgrid_733495 .slick-top-panel { height:25px; } .slickgrid_733495 .slick-headerrow-columns { height:25px; } .slickgrid_733495 .slick-cell { height:22px; } .slickgrid_733495 .slick-row { width:1620px; height:25px; } .slickgrid_733495 .lr { float:none; position:absolute; } .slickgrid_733495 .l0 { left: 0px; } .slickgrid_733495 .r0 { right: 1300px; } .slickgrid_733495 .l1 { left: 320px; } .slickgrid_733495 .r1 { right: 1120px; } .slickgrid_733495 .l2 { left: 500px; } .slickgrid_733495 .r2 { right: 1040px; } .slickgrid_733495 .l3 { left: 580px; } .slickgrid_733495 .r3 { right: 960px; } .slickgrid_733495 .l4 { left: 660px; } .slickgrid_733495 .r4 { right: 880px; } .slickgrid_733495 .l5 { left: 740px; } .slickgrid_733495 .r5 { right: 800px; } .slickgrid_733495 .l6 { left: 820px; } .slickgrid_733495 .r6 { right: 720px; } .slickgrid_733495 .l7 { left: 900px; } .slickgrid_733495 .r7 { right: 640px; } .slickgrid_733495 .l8 { left: 980px; } .slickgrid_733495 .r8 { right: 560px; } .slickgrid_733495 .l9 { left: 1060px; } .slickgrid_733495 .r9 { right: 480px; } .slickgrid_733495 .l10 { left: 1140px; } .slickgrid_733495 .r10 { right: 400px; } .slickgrid_733495 .l11 { left: 1220px; } .slickgrid_733495 .r11 { right: 320px; } .slickgrid_733495 .l12 { left: 1300px; } .slickgrid_733495 .r12 { right: 240px; } .slickgrid_733495 .l13 { left: 1380px; } .slickgrid_733495 .r13 { right: 160px; } .slickgrid_733495 .l14 { left: 1460px; } .slickgrid_733495 .r14 { right: 80px; } .slickgrid_733495 .l15 { left: 1540px; } .slickgrid_733495 .r15 { right: 0px; }</style>

    <style type="text/css">
      #fig {
      width: 880px;
      height: 560px;
      }
      #title {
      position: absolute;
      top: 70px;
      left: 200px;
      padding: 10px;
      background: white;
      }
      table.clock {
      text-align: center;
      border: thin dotted blue;
      padding: 5px;
      margin: auto;
      }
      td, input.clock2 {
      text-align: center;
      border: none;
      font: bold .9em verdana, helvetica, arial, sans-serif;
      padding-bottom: .5em;
      }
      .clock3 {
      text-align: center;
      font: .7em verdana, arial, helvetica, ms sans serif;
      }
    </style>
    <script type="text/javascript" src="timeFormat.js"></script>
    <script type="text/javascript" src="xp_progress.js"></script>
  </head>
  <body>
    <?php
      extract($_GET);
      
      $filename = "./working_directory/$unique_counter/flagfile.txt";
      
      if (file_exists($filename)) 
      {
      }
      else{
       echo "<script type='text/javascript'>
       var bar1= createBar(300,15,'white',1,'black','blue',85,7,3,'');
      </script>
      ";
      }
      
      $whatvar=-1;
      for($i=0;$i<5;$i++){
      if($var_quantities[$i]=='1'){
        $whatvar=$i;
        break;
      }
      }
      $namevar="";
      if($whatvar==0){
      $namevar="azimuth";
      }
      if($whatvar==1){
      $namevar="height";
      }
      if($whatvar==2){
      $namevar="depth";
      }
      if($whatvar==3){
      $namevar="length";
      }
      if($whatvar==4){
      $namevar="shgc";
      }
      
      
      ?>
    <?php
      $item1=array();
      $item2=array();
      $item3=array();
      $item4=array();
      $item5=array();
      $item6=array();
      $count=0;
      $file=fopen("./working_directory/$unique_counter/OutputListingAll.txt","r");
      $flag=0;
      if($file == NULL){
        echo "null file found";
      }
      else{
        //parsing the file till the end to get the output generated by genopt
        while(!feof($file))
        {
          $no=0;
          $a= fgets($file);
          $len=strlen($a);
          if($len==0 or $len==1)
          {
            continue;
          }
          else
          {
            if($len > 4 and $a[0]=='S' and $a[1]=='i' and $a[2]=='m' and $a[3]=='u' and $a[4]=='l' and $a[5]=='a')
            {
              $flag=1;
              continue;
            }
            if($flag==1)
            {
              $piece = preg_split('/[\s]+/', $a);
              $item1[$count]=$piece[4];
              $item1[$count]=((float)($item1[$count]))/(3600000);
              $take=11;
              if($var_quantities[0]=="1")
              {
               $item2[$count]=$piece[$take];
               $take=$take+1;
             }
             else
             {
               $item2[$count]=1;
             }
      
             if($var_quantities[1]=="1")
             {
               $item3[$count]=$piece[$take];
               $item3[$count]=$item3[$count]/3*100;
               $take=$take+1;
             }
             else
             {
               $item3[$count]=1;
             }
             if($var_quantities[2]=="1")
             {
               $item4[$count]=$piece[$take];
               $take=$take+1;
             }
             else
             {
               $item4[$count]=1;
             }
             if($var_quantities[3]=="1")
             {
               $item5[$count]=$piece[$take];
               $item5[$count]=($item5[$count]*$item5[$count])/25;
               $take=$take+1;
             }
             else
             {
               $item5[$count]=1;
             }
             if($var_quantities[4]=="1")
             {
               $item6[$count]=$piece[$take];
               $take=$take+1;
             }
             else
             {
               $item6[$count]=1;
             }
             $count=$count+1;
           }          
           
      
      
         }
       }
       fclose($file);
      }
      $x1=0;
      $y1=0;
      $temp1;
      $temp2;
      $temp3;
      $temp4;
      $temp5;
      $temp6;
      
      //sorting the output
      
      while($x1 < $count)
      {
        $y1=0;
        while($y1 < $x1)
        {
          if($item1[$x1] < $item1[$y1])
          {
            $temp1=$item1[$x1];
            $item1[$x1]=$item1[$y1];
            $item1[$y1]=$temp1;
            
      
            $temp2=$item2[$x1];
            $item2[$x1]=$item2[$y1];
            $item2[$y1]=$temp2;
            
      
            $temp3=$item3[$x1];
            $item3[$x1]=$item3[$y1];
            $item3[$y1]=$temp3;
            
            $temp4=$item4[$x1];
            $item4[$x1]=$item4[$y1];
            $item4[$y1]=$temp4;
            
            $temp5=$item5[$x1];
            $item5[$x1]=$item5[$y1];
            $item5[$y1]=$temp5;
      
            $temp6=$item6[$x1];
            $item6[$x1]=$item6[$y1];
            $item6[$y1]=$temp6;
            
          }
          $y1=$y1+1;
        }
        $x1=$x1+1;
      
      }
      
      
      
      ?>
    <!-- 
      displaying the graph from here.... -->
    <div id="center">
      <h2>Optimization Results</h2>
      <?php 
        echo "No of simulations performed till now is ".$count."<br>"."<br>"."<br>";
        ?>
      <!-- <small>Filter &amp; explore results by selecting a region and moving the sliders.</small><br><br>
        -->
      <span style="display: inline-block;">
      </span>
      <div id="fig">
        <script type="text/javascript+protovis">
          // The units and dimensions to visualize, in order.
          <?php
            if($count>0){
            
            
              echo 'var units = {
                ';
            
                if($var_quantities[0]=='1'){
                 echo 'azimuth: {name: "Azimuth", unit: " deg"},
                 ';
               }
               if($var_quantities[1]=='1'){
                echo 'height: {name: "WWR", unit: " %"},
                ';
              }
              if($var_quantities[2]=='1'){
               echo 'depth: {name: "Overhang depth", unit: " m"},
               ';
             }
             if($var_quantities[3]=='1'){
               echo 'length: {name: "Aspect Ratio", unit: ""},
               ';
             }
             if($var_quantities[4]=='1'){
               echo 'shgc: {name: "SHGC", unit: ""},
               ';
             }
            
             echo 'energy: {name: "Energy", unit: " kWh"},
             ';
            
             echo '}
             ';
            
            }
            ?>
          
          

          var dims = pv.keys(units);
          
          /* Sizing and scales. */
          var w = 1200,
          h = 500,
          fudge = 0.1,
          x = pv.Scale.ordinal(dims).splitFlush(0, w),
          y = pv.dict(dims, function(t) pv.Scale.linear(
            cars.filter(function(d) !isNaN(d[t])),
            function(d) Math.floor(d[t])-fudge,
            function(d) Math.ceil(d[t]) +fudge
            ).range(0, h)),
          c = pv.dict(dims, function(t) pv.Scale.linear(
            cars.filter(function(d) !isNaN(d[t])),
            function(d) Math.floor(d[t])-fudge,
            function(d) Math.ceil(d[t]) +fudge
            ).range("#00FF00", "red"));
          
          /* Interaction state. */
          var filter = pv.dict(dims, function(t) {
            return {min: y[t].domain()[0], max: y[t].domain()[1]};
          }), active = "<?php echo $namevar;?>";
          

          /* The root panel. */
          var vis = new pv.Panel()
          .width(w)
          .height(h)
          .left(30)
          .right(30)
          .top(30)
          .bottom(20);
          
          // The parallel coordinates display.
          vis.add(pv.Panel)
          .data(cars)
          .visible(function(d) dims.every(function(t)
            (d[t] >= filter[t].min) && (d[t] <= filter[t].max)))
          .add(pv.Line)
          .data(dims)
          .left(function(t, d) x(t))
          .bottom(function(t, d) y[t](d[t]))
          .event("click", function() alert("ok"))
          //.event("mouseover", function()  {alert("ok");alert("double ok");} )
          .cursor("pointer")
          .strokeStyle("#ddd")
          .lineWidth(1)
          .antialias(false);
          
          // Rule per dimension.
          rule = vis.add(pv.Rule)
          .data(dims)
          .left(x);
          
          // Dimension label
          rule.anchor("top").add(pv.Label)
          .top(-12)
          .font("bold 10px sans-serif")
          .text(function(d) units[d].name);
          
          // The parallel coordinates display.
          var change = vis.add(pv.Panel);
          
          var line = change.add(pv.Panel)
          .data(cars)
          .visible(function(d) dims.every(function(t)
            (d[t] >= filter[t].min) && (d[t] <= filter[t].max)))
          .add(pv.Line)
          .data(dims)
          .left(function(t, d) x(t))
          .bottom(function(t, d) y[t](d[t]))
          .event("click", function() alert("ok"))
          //.event("mouseover", function(){ alert("ok");alert("double ok"); })
          .cursor("pointer")
          .strokeStyle(function(t, d) c[active](d[active]))
          .lineWidth(1);
          

          // Updater for slider and resizer.
          function update(d) {
            var t = d.dim;
            filter[t].min = Math.max(y[t].domain()[0], y[t].invert(h - d.y - d.dy));
            filter[t].max = Math.min(y[t].domain()[1], y[t].invert(h - d.y));
            active = t;
            change.render();
            return false;
          }
          
          // Updater for slider and resizer.
          function selectAll(d) {
            if (d.dy < 3) {
              var t = d.dim;
              filter[t].min = Math.max(y[t].domain()[0], y[t].invert(0));
              filter[t].max = Math.min(y[t].domain()[1], y[t].invert(h));
              d.y = 0; d.dy = h;
              active = t;
              change.render();
            }
            return false;
          }
          
          /* Handle select and drag */
          var handle = change.add(pv.Panel)
          .data(dims.map(function(dim) { return {y:0, dy:h, dim:dim}; }))
          .left(function(t) x(t.dim) - 30)
          .width(60)
          .fillStyle("rgba(0,0,0,.001)")
          .cursor("crosshair")
          .event("mousedown", pv.Behavior.select())
          .event("select", update)
          .event("selectend", selectAll)
          .add(pv.Bar)
          .left(25)
          .top(function(d) d.y)
          .width(10)
          .height(function(d) d.dy)
          .fillStyle(function(t) t.dim == active
            ? c[t.dim]((filter[t.dim].max + filter[t.dim].min) / 2)
            : "hsla(0,0,50%,.5)")
          .strokeStyle("white")
          .cursor("move")
          .event("mousedown", pv.Behavior.drag())
          .event("dragstart", update)
          .event("drag", update);
          
          handle.anchor("bottom").add(pv.Label)
          .textBaseline("top")
          .text(function(d) filter[d.dim].min.toFixed(2) + units[d.dim].unit);
          
          handle.anchor("top").add(pv.Label)
          .textBaseline("bottom")
          .text(function(d) filter[d.dim].max.toFixed(2) + units[d.dim].unit);
          
          vis.render();
          
        </script>
      </div>
    </div>
    <table border="5" style="position:relative;left:30%;width:35%;text-align:center;">
      <tr>
        <th>
          Annual Energy Consumption (kWh)
        </th>
        <?php
          if ($var_quantities[0]=="1"){
           echo "<th>";
           echo "Azimuth Angle (deg)";
           echo "</th>";
          }
          ?>
        <?php
          if ($var_quantities[1]==1){
           echo "<th>";
           echo" WWR (%)";
           echo "</th>";
          }
          ?>
        <?php
          if ($var_quantities[2]==1){
            echo "<th>";
            echo" Depth (m)";
            echo "</th>";
          }
          ?>
        <?php
          if ($var_quantities[3]==1){
            echo "<th>";
            echo" Aspect Ratio";
            echo "</th>";
          }
          ?>
        <?php
          if ($var_quantities[4]==1){
            echo "<th>";
            echo" SHGC ";
            echo "</th>";
          }
          ?>
      </tr>
      <?php
        $fp1=fopen("./results250.js","w");
        if(!$fp1){
         echo "unable to open file";
        }
        
        $str="var cars = [
        ";
        
        for($i=0;$i<$count;$i++){
         $model=$i+1;
         if($var_quantities[0]=='1'){
          if($whatvar==0){
            $str=$str."{azimuth:$item2[$i]";
          }
          else{
            $str=$str.",azimuth:$item2[$i]";
          }
        }
        if($var_quantities[1]=='1'){
          if($whatvar==1){
            $str=$str."{height:$item3[$i]";
          }
          else{
            $str=$str.",height:$item3[$i]";
          }
        }
        if($var_quantities[2]=='1'){
          if($whatvar==2){
            $str=$str."{depth:$item4[$i]";
          }
          else{
            $str=$str.",depth:$item4[$i]";
          }
        }
        if($var_quantities[3]=='1'){
          if($whatvar==3){
            $str=$str."{length:$item5[$i]";
          }
          else{
            $str=$str.",length:$item5[$i]";
          }
        }
        if($var_quantities[4]=='1'){
          if($whatvar==4){
            $str=$str."{shgc:$item6[$i]";
          }
          else{
            $str=$str.",shgc:$item6[$i]";
          }
        }
        $str=$str.",energy:$item1[$i]";
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
        
        $x1=0;
        while ($x1 < $count) 
        {
        echo "<tr>";
        
        echo "<td>";
        echo $item1[$x1];
        echo "</td>";
        
        
        if($var_quantities[0]=="1")
        {
        echo "<td>";
        echo $item2[$x1] ;
        echo "</td>";
        }
        
        
        if($var_quantities[1]=="1")
        {
         echo "<td>";
         echo $item3[$x1];
         echo "</td>";
        }
        
        if($var_quantities[2]=="1")
        {
        echo "<td>" ;
        echo $item4[$x1] ;
        echo "</td>";
        }
        
        if($var_quantities[3]=="1")
        { 
        echo "<td>";  
        echo $item5[$x1] ;
        echo "</td>";
        
        }
        
        if($var_quantities[4]=="1")
        { 
        echo "<td>";  
        echo $item6[$x1] ;
        echo "</td>";
        
        }
        echo "</tr>";
        $x1++;
        }
        
        ?>
    </table>
    <?php
      $filename = "./working_directory/$unique_counter/flagfile.txt";
      
      if (file_exists($filename)) 
      {
        echo "redirecting";
        //echo("<meta http-equiv=\"refresh\" content=\"4;URL=mydisplay.php?unique_counter=".$unique_counter."&var_quantities=".$var_quantities."\">");
      }
      
      else{
        echo "Will update new results shortly";
        echo("<meta http-equiv=\"refresh\" content=\"10;URL=mydisplay.php?unique_counter=".$unique_counter."&var_quantities=".$var_quantities."\">");
      }
      
      ?>


      <div id="nav">
  <h1>Nutrient Contents - Parallel Coordinates</h1>
  <div class="widget right toggle">
    <input type="range" min="0" max="1" value="0.2" step="0.01" name="power" list="powers" id="line_opacity">
   <br>
    Opacity: <span id="opacity_level">19%</span>
  </div>
  <div><a href="http://exposedata.com/parallel/#" id="shadows" class="right toggle">Shadows</a></div>
  <div><a href="http://exposedata.com/parallel/#" id="inverted" class="right toggle">Dark</a></div>
  <div><a href="http://exposedata.com/parallel/#" id="no_ticks" class="right toggle">Hide Ticks</a></div>
  <p class="intro left clear">
    An interactive visualization of the <a href="http://www.ars.usda.gov/Services/docs.htm?docid=8964">USDA Nutrient Database</a>.
    For information on parallel coordinates, read this <a href="http://eagereyes.org/techniques/parallel-coordinates">tutorial</a>.
  </p>
</div>
<div id="main">
  <div class="widgets">
    <h3>Per 100g of Food</h3>
    <div id="totals" class="widget right">Total Selected<br></div>
    <div id="pie" class="widget right">Group Breakdown<br></div>
    <a href="http://exposedata.com/parallel/#" id="export_selected" class="button green filter_control">Export</a>
    <a href="http://exposedata.com/parallel/#" id="remove_selected" class="button red filter_control">Remove</a>
    <a href="http://exposedata.com/parallel/#" id="keep_selected" class="button green filter_control">Keep</a>
    <div id="pager" class="info"></div>
        <div id="legend">
        </div>
  </div>
  <div id="parallel">
  </div>
  <div id="myGrid"></div>
      <script type="text/javascript">
  
  $(function() {
  
    var dimensions = new Filter();
    var highlighter = new Selector();

    dimensions.set({data: foods });

    var columns = _(foods[0]).keys();
    alert(columns);
    var foodgroups =
      ["Dairy and Egg Products", /*"Spices and Herbs", "Baby Foods","Ethnic Foods",*/ "Restaurant Foods"];
    
    var colors = {
      "Dairy and Egg Products" : '#ff7f0e',
      "Spices and Herbs" : '#aec7e8',
      "Baby Foods" : '#555',
      "Restaurant Foods" : '#1f77b4'
    }
    

    var pc = parallel(dimensions, colors);
    var pie = piegroups(foods, foodgroups, colors, 'group');
    var totals = pietotals(
      ['in', 'out'],
      [_(foods).size(), 0]
    );

    var slicky = new grid({//slicky is giving the new grids for the table view of the results
      model: dimensions,//it is the filter that filters the results to be displayed and removed
      selector: highlighter,//highlighter is the selector that tells what is selected
      width: $('body').width(),
      columns: columns
    });
    
    // vertical full screen
    var parallel_height = $(window).height();
    if (parallel_height < 120) parallel_height = 120;  // min height
    $('#parallel').css({
        height: parallel_height + 'px',
        width: $(window).width() + 'px'
    });
    
    slicky.update();
    pc.render();
    dimensions.bind('change:filtered', function() {
      var data = dimensions.get('data');
      var filtered = dimensions.get('filtered');
      var data_size = _(data).size();
      var filtered_size = _(filtered).size();
      pie.update(filtered);
      totals.update([filtered_size, data_size - filtered_size]);
      
      var opacity = _([2/Math.pow(filtered_size,0.37), 100]).min();
      $('#line_opacity').val(opacity).change();
    });
    
    highlighter.bind('change:selected', function() {
      var highlighted = this.get('selected');
      pc.highlight(highlighted);
    });

    $('#remove_selected').click(function() {
      dimensions.outliers();
      pc.update(dimensions.get('data'));
      pc.render();
      dimensions.trigger('change:filtered');
      return false;
    });
    
    $('#keep_selected').click(function() {
      dimensions.inliers();
      pc.update(dimensions.get('data'));
      pc.render();
      dimensions.trigger('change:filtered');
      return false;
    });
    
    $('#export_selected').click(function() {
      var data = dimensions.get('filtered');
      var keys = _.keys(data[0]);
      var csv = _(keys).map(function(d) { return '"' + addslashes(d) + '"'; }).join(",");
      _(data).each(function(row) {
        csv += "\n";
        csv += _(keys).map(function(k) {
          var val = row[k];
          if (_.isString(val)) {
            return '"' + addslashes(val) + '"';
          }
          if (_.isNumber(val)) {
            return val;
          }
          if (_.isNull(val)) {
            return "";
          }
        }).join(",");
      });
      var uriContent = "data:application/octet-stream," + encodeURIComponent(csv);
      var myWindow = window.open(uriContent, "Nutrient CSV");
      myWindow.focus();
      return false;
    });

    $('#line_opacity').change(function() {
      var val = $(this).val();
      $('#parallel .foreground path').css('stroke-opacity', val.toString());
      $('#opacity_level').html((Math.round(val*10000)/100) + "%");
    });
    
    $('#parallel').resize(function() {
      // vertical full screen
      pc.render();
      var val = $('#line_opacity').val();
      $('#parallel .foreground path').css('stroke-opacity', val.toString());
    });
    
    $('#parallel').resizable({
      handles: 's',
      resize: function () { return false; }
    });
    
    $('#myGrid').resizable({
      handles: 's'
    });

    function addslashes( str ) {
      return (str+'')
        .replace(/\"/g, "\"\"")        // escape double quotes
        .replace(/\0/g, "\\0");        // replace nulls with 0
    };
  
  });

  </script>
  <!--
    <p>
     Copyright 2011, Kai Chang
    </p>
    <p>
     Licensed under the Apache License, Version 2.0 (the "License");
     you may not use this file except in compliance with the License.
     You may obtain a copy of the License at
    </p>
    <p>
         http://www.apache.org/licenses/LICENSE-2.0
    </p>
    <p>
     Unless required by applicable law or agreed to in writing, software
     distributed under the License is distributed on an "AS IS" BASIS,
     WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     See the License for the specific language governing permissions and
     limitations under the License.
	-->
</div>

  </body>
</html>