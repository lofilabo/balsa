<?php
	
	class logic{
		var $gobjDatabase;
		var $gobjDbSelect;
		var $cdd;
	
	
		function logic(){
		
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