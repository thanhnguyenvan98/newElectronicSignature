<?php

	$a = [10,4,6,7,8,9];
	for ($i=0; $i < count($a); $i++) { 
		for ($j= $i+1 ; $j < count($a); $j++) { 
			if ($a[$i]< $a[$j]) {
				$tg = $a[$i];
				$a[$i] = $a[$j];
				$a[$j] = $tg;
			}
		}
	}
	var_dump($a);
	
?>