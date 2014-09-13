<?php
	class control{	
	
		var $auth;
	
		function control($pg=0){
		
			//no argument renders the default view.
			
			//the value of auth can be anything:
			//if auth is non-null at all, we authenticate.
			//TO DO: 
			//Modify loginchecker such that it gets from
			//the database, and validates, and returns
			//return a priority level to check against
			//the value of Auth.	
			$myName = (get_class($this));
			$myName = str_replace("_c", "", $myName);

			if (isset($_SESSION['pri'] ) ){
			}else{
				$_SESSION['pri'] = 0;
			}
						
			if($this->auth===null){
				$this->goahead($pg);
			}else{
				
				
				$prior = (int)$_SESSION['pri'];

				
				if($prior > 0 ){
					$this->goahead($pg);
				}else{
					$prior = loginchecker($myName);
				}
			}
			

		}

		function goahead($pg){
			if ($pg != 0){
			
			}else{
				$this->render();
			}
		}

		function render(){

			$myIO = new fileio();
			
			$myName = (get_class($this));
			
			$myName = str_replace("_c", "", $myName);
			
			$universal = ($myIO->getAll('Z_ZUNIVERSAL/app_view.em'));
			
			$super = ($myIO->getAll('Z_VIEW/super' . $myName . '.em'));
			
			$thispage  = ($myIO->getAll('Z_VIEW/' . $myName . '.em'));
			
			$btoken = "[!!--RENDER--!!]";
			
			if (strlen($super)>0){
				$allHTML = str_replace($btoken , $thispage , $super);
			}else{
				$allHTML = str_replace($btoken , $thispage , $universal);
			}
			
			/*
			//	$strToEvl = "?>" . $allHTML . "<?";
			*/
			
			$strToEvl = "?>" . $allHTML . "";
			
			$strToEvl = str_replace("[--", "<?php" . chr(13) . chr(10), $strToEvl );
			$strToEvl = str_replace("[-", "<?php", $strToEvl );
			
			$strToEvl = str_replace("-]", "?>", $strToEvl );
			
			$strToEvl = $this->parseSpecial($strToEvl);
			
			eval($strToEvl);
		}
		
		function parseSpecial($in){
		
			$in = str_replace("--", "//", $in);
			$in = str_replace("STC", "/*", $in);
			$in = str_replace("ENC", "*/", $in);
			$in = str_replace("LPS", "for(;;){", $in);
			$in = str_replace("LPE", "}", $in);
			$in = str_replace("LPB", "break;", $in);
			$in = str_replace("", "", $in);
			$in = str_replace("", "", $in);
			$in = str_replace("", "", $in);
			$in = str_replace("", "", $in);
			$in = str_replace("", "", $in);
			$in = str_replace("", "", $in);
			$in = str_replace("", "", $in);
			
			return $in;
		}
	}
?>