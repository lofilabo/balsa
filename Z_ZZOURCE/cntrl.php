<?php
	//this is CONTROL class.
	class [--CLASSNAME--]_c extends control{

			
			
		function [--CLASSNAME--]_c (){
		
			//this call must (i) always come last
			//and (ii) must not change since it calls
			//the superclass control method
			
			//If NOTHING is passed as an argument, 
			//the PAGE DEFINED IN THE VIEW IS RENDERED.
			// For an AJAX return, you mightv want to NOT call Control at all
			// and just Print the XML data
			
			$this->control();
		}
	}



?>