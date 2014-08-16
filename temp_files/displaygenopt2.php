<!DOCTYPE html>
<html>
   <head>
      <meta content="text/html; charset=UTF-8" http-equiv="content-type">
      <title>Window OptimiZation Tool</title>
      <link type="text/css" rel="stylesheet" href="./ex.css">
      <script type="text/javascript" src="./protovis.js"></script>
      <style type="text/css"></style>
      <script type="text/javascript" src="./results250.js"></script>
      <script type="text/javascript" src="./graph/d3.js"></script>
      <style type="text/css"></style>
      <script type="text/javascript" src="./graph/d3.csv.js"></script>
      <script type="text/javascript" src="./graph/d3.layout.js"></script>
      <script type="text/javascript" src="./graph/parallel-coordinates-veggie.js"></script>
      <script type="text/javascript" src="./graph/jquery.js"></script>
      <script type="text/javascript" src="./graph/underscore.js"></script>
      <script type="text/javascript" src="./graph/backbone.js"></script>
      <script src="./graph/jquery-ui-1.8.16.custom.min.js"></script>
      <script type="text/javascript" src="./graph/filter.js"></script>
      <!-- SlickGrid -->
      <link rel="stylesheet" href="./graph/slick.grid.css" type="text/css" media="screen" charset="utf-8">
      <script src="./graph/jquery.event.drag-2.0.min.js"></script>
      <script src="./graph/slick.core.js"></script>
      <script src="./graph/slick.grid.js"></script>
      <script src="./graph/slick.dataview.js"></script>
      <script src="./graph/slick.pager.js"></script>
      <script src="./graph/grid.js"></script>
      <script src="./graph/pie.js"></script>
      <script src="./graph/options.js"></script>
      <link rel="stylesheet" href="./graph/style.css" type="text/css" charset="utf-8">
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
      <?php
         $fp1=fopen("./results2502.js","w");
         if(!$fp1){
         	echo "unable to open file";
         }
         $str="var foods = [
         ";
         
         $foldsize=(int)($count/10);
         if($foldsize<=0){
         	$foldsize=1;
         }
         for($i=0;$i<$count;$i++){
         	$str=$str."{group:".(int)($i/$foldsize);
         	if($var_quantities[0]=='1'){
         		$str=$str.",azimuth:$item2[$i]";
         	}
         	if($var_quantities[1]=='1'){
         		$str=$str.",height:$item3[$i]";
         	}
         	if($var_quantities[2]=='1'){
         		$str=$str.",depth:$item4[$i]";
         	}
         	if($var_quantities[3]=='1'){
         		$str=$str.",length:$item5[$i]";
         	}
         	if($var_quantities[4]=='1'){
         		$str=$str.",shgc:$item6[$i]";
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
         ?>
      <div id="nav">
         <h1>Optimization Results</h1>
         <div class="widget right toggle">
            <input type="range" min="0" max="1" value="0.2" step="0.01" name="power" list="powers" id="line_opacity">
            <br>
            Opacity: <span id="opacity_level">19%</span>
         </div>
         <div><a id="shadows" class="right toggle">Shadows</a></div>
         <div><a id="inverted" class="right toggle">Dark</a></div>
         <div><a id="no_ticks" class="right toggle">Hide Ticks</a></div>
      </div>
      <div id="main">
         <div class="widgets">
            <h3>Per 100g of Food</h3>
            <div id="totals" class="widget right">Total Selected<br></div>
            <div id="pie" class="widget right">Group Breakdown<br></div>
            <a id="export_selected" class="button green filter_control">Export</a>
            <a id="remove_selected" class="button red filter_control">Remove</a>
            <a id="keep_selected" class="button green filter_control">Keep</a>
            <div id="pager" class="info"></div>
            <div id="legend"></div>
         </div>
         <div id="parallel"></div>
         <div id="myGrid" style="left:20%;height:1000px" ></div>
         <script type="text/javascript">
            alert("executing");
            
            $(document).ready(function() {
            alert("executing");
            
            var dimensions = new Filter();
            var highlighter = new Selector();
            
            dimensions.set({data: foods });
            
            var columns = _(foods[0]).keys();
            alert(columns);
            
            
             var foodgroups =
                ["0","1","2","3","4","5","6","7","8","9","10"];
              
              var colors = {
                "0" : '#ff7f0e',
                "1" : '#aec7e8',
                "2" : '#555',
                "3" : '#ffbb78',
                "4" : '#d62728',
                "5" : '#98df8a',
                "6" : '#2ca02c',
                "7" : '#ff9896',
                "8" : '#9467bd',
                "9" : '#c5b0d5',
                "10" : '#1f77b4'
              }
            
            _(foodgroups).each(function(group) {
                $('#legend').append("<div class='item'><div class='color' style='background: " + colors[group] + "';></div><div class='key'>" + group + "</div></div>");
              });
            
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
            var parallel_height = $(window).height()-400;
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
            
            /*$('#myGrid').resizable({
            handles: 's'
            });*/
            
            function addslashes( str ) {
            return (str+'')
            .replace(/\"/g, "\"\"")        // escape double quotes
            .replace(/\0/g, "\\0");        // replace nulls with 0
            };
            
            });
            
         </script>
      </div>
      <?php
         //checking whether all updates have been performed or not or do we need to still update the graph page
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
   </body>
</html>