<?php
	/************************************************************************************************
	The Control class.
	Or rather, a subclass of the Control class with bits added.  The bits will usually consist of a 
	class and a method with the same name as the file, because unless we learn to swallow CoC, we'll 
	end	up with XML all over our Server Faces.

	The line 
		$logic = new basic();
	invokes the Data Logic class, which sets its own $z.  We can access this and pass it directly to 
	our template controller method, which is always the statement
		$this->control

	************************************************************************************************/

	class basic_c extends control{

		var $z;
				
		function basic_c (){

			$colors = new Colors();
			
			//error_log ($colors->getColoredString("USEFUL OUTPUT 2", "purple", "yellow") . "\n"); 

			$logic = new basic();

			//for other data queries, we can explicitly call methods of the Logic class:
			//$this->z=($logic->q1());

			$this->z = $logic->z;


			error_log ($colors->getColoredString("Useful Debugging Message", "light_green", "black") . "\n"); 

			$arr=array();
			$arr[0]=array('one-one' , 'one-two' , 'one-three');
			$arr[1]=array('two-one' , 'two-two' , 'two-three');
			$arr[2]=array('three-one' , 'three-two' , 'three-three');
			$colors->var_error_log($arr);

			//this call must (i) always come last
			//and (ii) must not change since it calls
			//the superclass control method
			$this->control();
			//If NOTHING is passed as an argument, 
			//the PAGE DEFINED IN THE VIEW IS RENDERED.
			
			// For an AJAX return, you mightv want to NOT call Control at all
			// and just Print the data
			//	
			//  echo $this->z;
			//

		}
	}



?>