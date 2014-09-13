<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start(); 
header("Cache-control: private"); 
include("common_includes/includes.php");

//loginchecker();
//temp end
//Print_R($_POST);

	if (isset($_GET['op'] ) ){
		$op = ($_GET["op"]);

		if($op==="logout"){
			$_SESSION['pri'] = 0;
		}

		if($op==="checklogin"){
			loginchecker();
		}else{

			if (class_exists($op . "_c")){
				$constr = "new " . $op . "_c();";
				eval($constr);
			}else{
				//trigger_error("Unable to load path: $op ", E_USER_WARNING);
			}
		}
	}else{
		
		if(isset($_POST['op'] ) ){
			$op = ($_POST["op"]);

			if($op==="logout"){
				
				$_SESSION['pri'] = 0;
			}

			if($op==="checklogin"){
				loginchecker();
			}else{
				
				if (class_exists($op . "_c")){
					$constr = "new " . $op . "_c();";
					eval($constr);
				}else{
					//trigger_error("Unable to load path: $op ", E_USER_WARNING);
					$pg=new basic_c;
				}
			}
		
		}else{


			//if a 'default' page is required, enter it here with a statement similar to:
			//
			$pg=new basic_c;
		
		}


	}


?>
