<?php
	//this is the LOGIC class
	class [--CLASSNAME--] extends logic{
	
		var $gobjDatabase;
		var $gobjDbSelect;
		var $cdd;
	
		function __construct(){
			//default constructor.
		}

		function q1(){
			//this is a stub query.  You can make more
			//of your own, and call them from (control)
			return $this->executeSql("SELECT * from test");
		}
		
	
		function [--CLASSNAME--] (){
			$this->cdd = new cdd();
			$this->gobjDatabase = mysql_connect($this->cdd->gstrHost,$this->cdd->gstrUser,$this->cdd->gstrPassword);
			mysql_select_db($this->cdd->gstrDatabase,$this->gobjDatabase);		
			
		}

		function executeSqlNoR($gstrSql){
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