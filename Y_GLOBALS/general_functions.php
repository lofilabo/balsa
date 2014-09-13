<?php


function checkprior($pi, $i){

	//$pi priority index

	//$i priority level from the DB


	$p = pow(2, $pi - 1);

	$prior = FALSE;

	while($i >= 1){

		$n=1;

		for(;;){
			if ($n*2 > $i){
				//$n= $n / 2;
				break;
			}else{
				$n= $n * 2;
			}
		}

		$i = $i - $n;

		if($n==$p){
			$prior = TRUE;
		}

	//print ("PRIOR:".$prior);
	}
	
	return $prior;
}


function bustDate($indate, &$day, &$month, &$year){

	$day =   substr($indate, 0, 2);
	$month = substr($indate, 2, 2);
	$year =   substr($indate, 4,4);
	
}

function squirt_check($inItem) {

	$result=0;

	if (strpos(" " . $inItem, "select") != 0) {$result=1;}		
	if (strpos(" " . $inItem, "insert") != 0) {$result=1;}		
	if (strpos(" " . $inItem, "delete")!=0) {$result=1;}	
	if (strpos(" " . $inItem, "drop") != 0) {$result=1;}	
	if (strpos(" " . $inItem, "update") != 0) {$result=1;}	

		//db($inItem, $result);

	return $result;
}

function check_for_number($inItem){

	if (ereg("^[0-9]+[.]?[0-9]*$", $inItem, $p)) {
	return 1;
	} else {
	return 0;
	}// end if


}

?>