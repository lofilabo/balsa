<?php
	//this is CONTROL class.
	class [--CLASSNAME--]_c extends control{

		var $a= array( 'Tires'=>100, 'Oil'=>10, 'Spark Plugs'=>1 );
		var $b= array( 'Tires'=>200, 'Oil'=>20, 'Spark Plugs'=>2 );
		var $c= array( 'Tires'=>300, 'Oil'=>30, 'Spark Plugs'=>3 );		
		var $z=array(0);
		
			
		function [--CLASSNAME--]_c (){
			//allow this array to pass basic data into the View
			//until you have fixed up the database access in the
			//Z_LOGIC->thisclass file.  You can test your layout
			//without worrying about DB stuff.
			array_push($this->z, $this->a, $this->b, $this->c );
						
			//DO NOT invoke the database call until you have written
			//some meaningful code into the Z_LOGIC->thisclass file.
			//then, you may uncomment the next two lines.
			//$logic = new [--CLASSNAME--]();
			//$this->z=($logic->q1());

			//this call must (i) always come last
			//and (ii) must not change since it calls
			//the superclass control method
			
			//If NOTHING is passed as an argument, 
			//the PAGE DEFINED IN THE VIEW IS RENDERED.
			// For an AJAX return, you mightv want to NOT call Control at all
			// and just Print the XML data
			
			$this->control();
			//print(1234);
		}
	}



?>