<?php
	$a = "Original";

	$my_array = array("a" => "Cat","b" => "Dog", "c" => "Horse");
	$my_array2 = array("a" => "Cat2","b" => "Dog2", "c" => $my_array);
	extract($my_array2);
	echo "\$a = $a; \$b = $b; \$c = $c";

	$inputPara[0]="hi";
	print_r($inputPara);

?>