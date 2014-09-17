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

?>


<style type="text/css">
	
	.item {
		border: 1px solid;
		border-radius: 10px;
		margin: 2%;
	}

	#parametricform label{
		float: right;
	}

	.center {
		text-align: center;
	}

</style>

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
                <li><a href="#parainput">Input</a></li>
                <li><a href="#paravisualization">Visualization</a></li>

<!--                 <li class="menu-item-divided pure-menu-selected">
                    <a href="#">Services</a>
                </li>
 -->
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header" style="font-size:0.8em">
            <h1>Winopt</h1>
        </div>

        <div id="parainput" class="" style="font-size:0.9em">

        	<form id="parametricform" class="pure-form" action="" method="POST">
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
				<div class="item" style="width:95%;text-align:center">
					<input type="submit">
				</div>
			</form>

            <h2 id="paravisualization" class="content-subhead"></h2>
            <div class="pure-g">

	            <div class="pure-u-1-1">
	            	

	            </div>


            </div>

        </div>
    </div>
</div>

	
</body>

<script type="text/javascript" src="./graph/jquery.js"></script>
<script type="text/javascript" src="./graph/fivezone.js"></script>
<script src="./graph/ui.js"></script>
<script src="./graph/isotope.min.js"></script>

<script type="text/javascript">

	var $parametricform = $('#parametricform');
	// init
	$parametricform.isotope({
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