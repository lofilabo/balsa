<?php

	class MakeNewPageClass {

		function doMakeClassMgr($pClassname){
			$dir1 = realpath(dirname(__FILE__));;
			$curDirAbs = realpath(dirname(__FILE__) . '/..');;
			//echo("curDirAbs: " . $curDirAbs . "\n");
			//die;
			//echo( $curDirAbs. "/Z_CONTROL/" .  $pClassname . ".php");
			//die;
			$cntrlFileH	=	fopen($curDirAbs . "/Z_CONTROL/" .  $pClassname . ".php", "w+" );
			$logicFileH	=	fopen($curDirAbs . "/Z_LOGIC/" .  $pClassname . ".php", "w+" );
			$eviewFileH	=	fopen($curDirAbs . "/Z_VIEW/" .  $pClassname . ".em", "w+" );
			$superFileH	=	fopen($curDirAbs . "/Z_VIEW/super" .  $pClassname . ".em_", "w+" );
				
			
			
			$cntrlTxt	=	file_get_contents($curDirAbs . "/Z_ZZOURCE/" . "cntrl.php") ;
			$logicTxt	=	file_get_contents($curDirAbs . "/Z_ZZOURCE/" . "logic.php") ;
			$eviewTxt	=	file_get_contents($curDirAbs . "/Z_ZZOURCE/" . "view.em") ;
			$superTxt	=	file_get_contents($curDirAbs . "/Z_ZZOURCE/" . "superview.em") ;

			$cntrlTxt	=	str_replace ("[--CLASSNAME--]",$pClassname , $cntrlTxt);
			$logicTxt	=	str_replace ("[--CLASSNAME--]",$pClassname , $logicTxt);
			$eviewTxt	=	str_replace ("[--CLASSNAME--]",$pClassname , $eviewTxt);
			$superTxt	=	str_replace ("[--CLASSNAME--]",$pClassname , $superTxt);
			

			
			echo("Class name: " . $pClassname . "\n");
			//echo("$cntrlFileH :" . $cntrlFileH  . "\n");
			//echo("logicTxt :" . $logicTxt  . "\n");
			//echo("eviewTxt :" . $eviewTxt  . "\n");
			//echo("superTxt :" . $superTxt  . "\n");
			
			fwrite($cntrlFileH, $cntrlTxt);
			fwrite($logicFileH, $logicTxt);
			fwrite($eviewFileH, $eviewTxt);
			fwrite($superFileH, $superTxt);
			
			fclose($cntrlFileH);
			fclose($logicFileH);
			fclose($eviewFileH);
			fclose($superFileH);
		}
		
	}
?>