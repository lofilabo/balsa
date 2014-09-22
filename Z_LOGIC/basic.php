<?php
/************************************************************************************************
This is a very basic example of how a Data Logic (that's 'model' to you come-lateleys) class works
It's job is get Some Data, and mash it up into a neutral language construct.  In LisP or io, that
would be a list; in Java, a Plain Java Object and in VBscript or PaleoPHP, an array.  In C, it 
would be a pointer to an instance of a struct of array pointers, each addressing an array which 
could contain primitive type instances, or further pointers to further instances of structs of 
array pointers, pointers to arrays of vars or type char or other primitive vartypes, or possibly 
function pointers.  In Javascript it would be a small puddle of puke, and in Haskel, a cubist or 
other abstract representation of some data which doesn't exist at the moment and won't ever until 
Cond.{lambda} evalutes to true (either synchronously or asynchronously), or until you have gone 
mad contemplating the tentacled horror which your meddling has unleashed upon the world.

In this case, we use the constructor to set a class variable (or 'data member' if you're nasty)
with some truly useful data, named z.  If you wish to fight both orcs at once, Go to 143.  If
you want to know what happens to z, go to Z_CONTROL/basic.php.
************************************************************************************************/

	class basic{
	
		var $gobjDatabase;
		var $gobjDbSelect;
		var $cdd;

		public $z=array(0);

	
		function q1(){
			return $this->executeSql("SELECT * from test");
		}
		
		function __construct(){

			//uncomment this section when you have set up a mySQL database and made a table called test
			/*
			$this->cdd = new cdd();
			$this->gobjDatabase = mysql_connect($this->cdd->gstrHost,$this->cdd->gstrUser,$this->cdd->gstrPassword);
			mysql_select_db($this->cdd->gstrDatabase,$this->gobjDatabase);		
			$gstrSql = "SELECT * from test";
			$this->gobjDbSelect = mysql_query($gstrSql);
			*/

			//this section loads a small amount of data into an array, just as your
			//database system of choice would.  We can use this to check the Controller and View-Template.
			$a= array( 'Tires'=>100, 'Oil'=>10, 'Spark Plugs'=>1 );
			$b= array( 'Tires'=>200, 'Oil'=>20, 'Spark Plugs'=>2 );
			$c= array( 'Tires'=>300, 'Oil'=>30, 'Spark Plugs'=>3 );
			array_push($this->z, $a, $b, $c );			
		}
	
		function basic(){
			//Stub Function left over from legacy PHP versions, and also from VBscript on ASP.
			//The syntax of using a class name as a pretend constructor is not needed in PHP5>>
		}


		
		function executeSql($gstrSql){
			
			$this->gobjDbSelect = mysql_query($gstrSql);
			
			//NO. STUPID.  FILE.  POINTERS.
			//we are grown-ups now and we'd like 
			//our data in arrays, please.
			
			//row-by-row, copy the PHP recordset or VB/ODBC Cursor into 
			//an array.
			while($row=mysql_fetch_assoc($this->gobjDbSelect)) { 
				$resultArray[]=$row ;
			} 
			
			return($resultArray);		
		}
		
	}



?>