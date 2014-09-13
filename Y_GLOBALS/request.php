<?php




	function tell($reqname){
	
		$req = "";

		if (isset($_REQUEST[$reqname])){
			$req = $_REQUEST[$reqname];

		}else{
			$req = 0;
		}

	return $req;
	}




class reqpost{

	function tell($reqname){
	
		$req = "";

		if (isset($_POST[$reqname])){
			$req = $_POST[$reqname];

		}else{
			$req = 0;
		}

	return $req;
	}

}


?>