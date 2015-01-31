<?php 

include_once("../requiredGraphFiles.php");


$unique_counter = "3689b1cd-48e1-35d4-45a6-7ce8bf53a646";

extract($_GET);
extract($_POST);

echo $unique_counter;
$working_directory_location_parametric = "./working_directory/parametric/$unique_counter/";

?>

<!DOCTYPE html>
<html>
   <head>
      <meta content="text/html; charset=UTF-8" http-equiv="content-type">
      <title>Window OptimiZation Tool</title>

      <script type="text/javascript" src="<?php echo $working_directory_location_parametric; ?>results250_2.js"></script>

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
         large {
         font-size: medium;
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
   </head>
   <body>
      <?php
         
         $filename = $working_directory_location_parametric."flagfile.txt";
         
         if (file_exists($filename))
         {
          //echo '<h3><a href="./zoom/index.php?unique_counter='.$unique_counter.'">Go to BitMap Visualization</a></h3>';
         }
         else{
                 echo "";
                 echo "<script type='text/javascript'>
                    var bar1= createBar(300,15,'white',1,'black','blue',85,7,3,'');
                </script>
         ";
         }
         
         
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
         
         ?>
      <?php
         $fp1=fopen($working_directory_location_parametric."results250_2.js","w");
         if(!$fp1){
          
                 echo "unable to open file";
         }
         
         $str="var foods = [
         ";
         
         $foldsize=($count/10);
         if($foldsize<=0){
           $foldsize=1;
         }
         for($i=0;$i<$count;$i++){
                 $str=$str."{'group':".(int)($i/$foldsize);
                 $str=$str.",'Orientation (degrees)':$azimuth1[$i]";
                         $str=$str.",'WWR (%)':$wwr1[$i]";
                         $str=$str.",'Overhang Depth (m)':$depth1[$i]";
                         $str=$str.",'Aspect Ratio':$ratio1[$i]";
                         $str=$str.",'SHGC':$shgc1[$i]";
                         $str=$str.",'Energy (kWh)':$energy1[$i]";
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
         <h1>Parametric Optimization Results</h1>
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
         <h3>Energy Coloring from Min to Max</h3>
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
            //alert("executing");
            
            $(document).ready(function() {
            //alert("executing");
            
            var dimensions = new Filter();
            var highlighter = new Selector();
            
            dimensions.set({data: foods });
            
            var columns = _(foods[0]).keys();
            //alert(columns);
            var newcolumns=new Array();
            for (var i = 0; i < columns.length; i++) {
               newcolumns[i]=columns[i];
            }            
            columns=newcolumns;
            
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
         $filename = $working_directory_location_parametric."flagfile.txt";
         
         if (file_exists($filename)) 
         {
           //echo "redirecting";
           //echo("<meta http-equiv=\"refresh\" content=\"4;URL=displayparametric.php?unique_counter=".$unique_counter."&var_quantities=".$var_quantities."\">");
         }
         
         else{
           echo "Will update more results shortly"."<br>";
           echo $filename;
           echo("<meta http-equiv=\"refresh\" content=\"10;URL=displayparametric.php?unique_counter=".$unique_counter."\">");
         }
         
         ?>
   </body>
</html>