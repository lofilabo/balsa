<?php

	class cdd{
		var $gstrHost = "localhost";
		var $gstrDatabase = "";
		var $gstrUser = "";
		var $gstrPassword = "";
		var $gstrVersion = "0.10";
		
		function cdd(){
			$this->gobjDatabase = mysql_connect($this->gstrHost,$this->gstrUser,$this->gstrPassword);
			//this is SUPER-IMPORTANT if you want 
			//nonroman characters to show up ;)
			mysql_query('SET NAMES utf8');
		}
		
	}
	
?>