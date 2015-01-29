<html>
<head>
	
<link rel="stylesheet" href="./css/pure.css">
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="./css/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="./css/side-menu.css">
    <!--<![endif]-->


<?php 

	include_once("./requiredGraphFiles.php");

	$unique_counter="3689b1cd-48e1-35d4-45a6-7ce8bf53a646";//for parametric simulation results
	$unique_counter_gen="fiveGenasp3";
	$var_quantities="12110";
?>


<style type="text/css">
	
	.item {
		min-width: 240px;
		border: 1px solid;
		border-radius: 10px;
		margin: 2%;
		min-height: 200px;
	}

	#parametricform label{
		float: right;
	}

	#genoptform label{
		float: right;
	}

	.center {
		text-align: center;
	}

	.header h2 {
		color: black;
	}

</style>

<script type="text/javascript" src="./graph/jquery.js"></script>
<script type="text/javascript" src="./fiveZoneFiles/graph/fivezone.js"></script>
<script src="./graph/ui.js"></script>
<script src="./graph/isotope.min.js"></script>

</head>

<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="#main">Top</a>

            <ul>
                <li><a href="#edotinput">eDOT Input</a></li>
                <li><a href="#edotvisualization">eDOT Visualization</a></li>
                <li><a href="#parainput">Parametric Input</a></li>
                <li><a href="#paravisualization">Parametric Visualization</a></li>
                <li><a href="#oldsimulation">Previous Simulations</a></li>

<!--                 <li class="menu-item-divided pure-menu-selected">
                    <a href="#">Services</a>
                </li>
 -->
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header" style="font-size:0.8em">
            <h1>eDOT (5 Zone Model)</h1>
        </div>


        <div id="edotinput">
	    	<div class="header">
	        	<h2>GenOpt Input</h2>
	        </div>
        	<form id="genoptform" class="pure-form" action="./fiveZoneFiles/mycommand_file_generator.php" method="POST" style="font-size:0.9em">
	        <?php
	        	include_once("./fiveZoneGenOpt.php");
	        ?>
	        </form>
		</div>

        <div id="edotvisualization">
	    	<div class="header">
	        	<h2>GenOpt Visualization</h2>
				<iframe id="iframe2" src="./fiveZoneFiles/displaygenopt_ver1.php?unique_counter=<?php echo $unique_counter_gen; ?>&amp;var_quantities=<?php echo $var_quantities; ?>&amp;total_area=1500" style="position:relative;width:80%;height:800px;"></iframe>
	        </div>
        </div>


        <div id="parainput" class="">
        	<div class="header">
	        	<h2>Parametric Input</h2>
	        </div>
        	<form id="parametricform" class="pure-form" action="" method="POST"  style="font-size:0.9em">
				<div class="item">
					<h3 class="center">Azimuth</h3>
					<label>
						First Value
						<input name="azi[]" value="0" min="0.0" max="360.0" step="any" type="number">
					</label><br>
					<label>
						Second Value
						<input name="azi[]" value="45" min="0.0" max="360.0" step="any" type="number">
					</label><br>
					<label>
						Third Value
						<input name="azi[]" value="90" min="0.0" max="360.0" step="any" type="number">
					</label><br>
					<label>
						Fourth Value
						<input name="azi[]" value="135" min="0.0" max="360.0" step="any" type="number">
					</label><br>
					<label>
						Fifth Value
						<input name="azi[]" value="180" min="0.0" max="360.0" step="any" type="number">
					</label>
				</div>
				
				<div class="item">
					<h3 class="center">WWR</h3>
					<label>
						First Value
						<input name="wwr[]" value="20" min="10.0" max="90.0" step="any" type="number">
					</label><br>
					<label>
						Second Value
						<input name="wwr[]" value="40" min="10.0" max="90.0" step="any" type="number">
					</label><br>
					<label>
						Third Value
						<input name="wwr[]" value="60" min="10.0" max="90.0" step="any" type="number">
					</label><br>
					<label>
						Fourth Value
						<input name="wwr[]" value="80" min="10.0" max="90.0" step="any" type="number">
					</label><br>
					<label>
						Fifth Value
						<input name="wwr[]" value="15" min="10.0" max="90.0" step="any" type="number">
					</label><br>
				</div>
				
				<div class="item">
					<h3 class="center">Depth</h3>				
					<label>
						First Value
						<input name="depth[]" value="0.5" min="0.1" max="3.0" step="any" type="number">
					</label><br>
					<label>
						Second Value
						<input name="depth[]" value="0.8" min="0.1" max="3.0" step="any" type="number">
					</label><br>
					<label>
						Third Value
						<input name="depth[]" value="1.5" min="0.1" max="3.0" step="any" type="number">
					</label><br>
					<label>
						Fourth Value
						<input name="depth[]" value="2.0" min="0.1" max="3.0" step="any" type="number">
					</label><br>
					<label>
						Fifth Value
						<input name="depth[]" value="2.5" min="0.1" max="3.0" step="any" type="number">
					</label><br>
				</div>

				<div class="item">
					<h3 class="center">Aspect Ratio</h3>
					<label>
						First Value
						<input name="lbybratio[]" value="0.5" min="0.5" max="2.0" step="any" type="number">
					</label><br>
					<label>
						Second Value
						<input name="lbybratio[]" value="1.0" min="0.1" max="2.0" step="any" type="number">
					</label><br>
					<label>
						Third Value
						<input name="lbybratio[]" value="1.5" min="0.1" max="2.0" step="any" type="number">
					</label><br>
					<label>
						Fourth Value
						<input name="lbybratio[]" value="2.0" min="0.1" max="2.0" step="any" type="number">
					</label><br>
					<label>
						Fifth Value
						<input name="lbybratio[]" value="1.2" min="0.1" max="2.0" step="any" type="number">
					</label><br>
				</div>
				<div class="item" style="min-height:0px;width:95%;text-align:center">
					<input type="submit">
				</div>
			</form>

        	<div id="paravisualization" class="header">
	        	<h2>Parametric Simulation Results</h2>
	        </div>

            <div class="pure-g">

	            <div class="pure-u-1-1">

					<iframe id="iframe1" src="./fiveZoneFiles/displayparametric.php?unique_counter=<?php echo $unique_counter; ?>/" style="position:relative;left:10%;width:80%;height:800px"></iframe>

	            </div>

            </div>

        	<div id="oldsimulation" class="header">
	        	<h2>View Previous Simulations</h2>
	        </div>
            <div class="content">
            	<br>
            	Please Enter the UID of the simulation <input type="text" name="unique_counter_old">
            </div>
           	<?php
           	if (isset($unique_counter_old)) {
           	?>
	            <div class="pure-g">

		            <div class="pure-u-1-1">

						<iframe id="iframe2" src="./fiveZoneFiles/displaygenopt_ver1.php?unique_counter=<?php echo $unique_counter_old; ?>&amp;var_quantities=<?php echo $var_quantities; ?>&amp;total_area=1500" style="position:relative;width:80%;height:800px;"></iframe>

		            </div>

	            </div>
	        <?php
	    	}
            ?>
        </div>
    </div>
</div>

	
</body>

<script type="text/javascript">

	var $parametricform = $('#parametricform');
	// init
	$parametricform.isotope({
	  // options
	  itemSelector: '.item',
	  layoutMode: 'fitRows'
	});

	var $genoptform = $('#genoptform');
	// init
	$genoptform.isotope({
	  // options
	  itemSelector: '.item',
	  layoutMode: 'fitRows'
	});
	
	$(document).ready(function() {


	    $('a').click(function(e){
	       e.preventDefault();

	       var target= $(this).attr("href");
	       $target=$(target);

	       $('html,body').animate({scrollTop:$target.offset().top},900,'swing');
	    });

	});

</script>


</html>