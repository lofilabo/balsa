<?php
	//this is the LOGIC class

	class basic{
	
		var $gobjDatabase;
		var $gobjDbSelect;
		var $cdd;
	
		function q1(){
			return $this->executeSql("SELECT * from test");
		}
		
	
		function basic(){
			$this->cdd = new cdd();
			$this->gobjDatabase = mysql_connect($this->cdd->gstrHost,$this->cdd->gstrUser,$this->cdd->gstrPassword);
			mysql_select_db($this->cdd->gstrDatabase,$this->gobjDatabase);		
			$gstrSql = "SELECT * from test";
			$this->gobjDbSelect = mysql_query($gstrSql);
		}


		
		function executeSql($gstrSql){
			
			$this->gobjDbSelect = mysql_query($gstrSql);
			
			//NO. STUPID.  FILE.  POINTERS.
			//we are grown-ups now and we'd like 
			//our data in arrays, please.
			
			//row-by-row, copy the stupid PHP recordset into 
			//an array.
			while($row=mysql_fetch_assoc($this->gobjDbSelect)) { 
				$resultArray[]=$row ;
			} 
			
			return($resultArray);		
		}
		
	}



?>