<?php

	//  Create new Colors class: sample invocation
	//  $colors = new Colors();
 
	// Test some basic printing with Colors class
	/*
	error_log ($colors->getColoredString("Testing Colors class, this is purple string on yellow background.", "purple", "yellow") . "\n"); 
	error_log ($colors->getColoredString("Testing Colors class, this is blue string on light gray background.", "blue", "light_gray") . "\n");
	error_log ($colors->getColoredString("Testing Colors class, this is red string on black background.", "red", "black") . "\n");
	error_log ($colors->getColoredString("Testing Colors class, this is cyan string on green background.", "cyan", "green") . "\n");
	error_log ($colors->getColoredString("Testing Colors class, this is cyan string on default background.", "cyan") . "\n");
	error_log ($colors->getColoredString("Testing Colors class, this is default string on cyan background.", null, "cyan") . "\n");
	*/
 


	class Colors {


		public function var_error_log( $object=null ){
			/*Based on*/
			/*http://justinsilver.com/technology/writing-to-the-php-error_log-with-var_dump-and-print_r/*/
			//$colors = new Colors();		   //
		    ob_start();                    // start buffer capture
		    var_dump( $object );           // dump the values
		    $contents = ob_get_contents(); // put the buffer into a variable
		    ob_end_clean();                // end capture


			$xml = simplexml_load_string($contents);
			$contents= strip_tags($contents);
			//$contents = str_replace("=&gt;", "-<", $contents);
			$contents = str_replace("=&gt;", "  |  ", $contents);
			$contents = str_replace("length=", "", $contents);
			$contents = str_replace("      ", "        | ", $contents);
			$contents = str_replace("size=", "", $contents);
			//$contents = str_replace(chr(10), chr(10) . "        _______________________________" . chr(10), $contents);
			error_log ($this->getColoredString($contents, "cyan", "black") . "\n"); 
		}


		/*Based on:*/
		/* http://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/ */

		private $foreground_colors = array();
		private $background_colors = array();
 
		public function __construct() {
			// Set up shell colors
			$this->foreground_colors['black'] = '0;30';
			$this->foreground_colors['dark_gray'] = '1;30';
			$this->foreground_colors['blue'] = '0;34';
			$this->foreground_colors['light_blue'] = '1;34';
			$this->foreground_colors['green'] = '0;32';
			$this->foreground_colors['light_green'] = '1;32';
			$this->foreground_colors['cyan'] = '0;36';
			$this->foreground_colors['light_cyan'] = '1;36';
			$this->foreground_colors['red'] = '0;31';
			$this->foreground_colors['light_red'] = '1;31';
			$this->foreground_colors['purple'] = '0;35';
			$this->foreground_colors['light_purple'] = '1;35';
			$this->foreground_colors['brown'] = '0;33';
			$this->foreground_colors['yellow'] = '1;33';
			$this->foreground_colors['light_gray'] = '0;37';
			$this->foreground_colors['white'] = '1;37';
 
			$this->background_colors['black'] = '40';
			$this->background_colors['red'] = '41';
			$this->background_colors['green'] = '42';
			$this->background_colors['yellow'] = '43';
			$this->background_colors['blue'] = '44';
			$this->background_colors['magenta'] = '45';
			$this->background_colors['cyan'] = '46';
			$this->background_colors['light_gray'] = '47';
		}
		// Returns colored string
		public function getColoredString($string, $foreground_color = null, $background_color = null) {
			$colored_string = "";
 
			// Check if given foreground color found
			if (isset($this->foreground_colors[$foreground_color])) {
				$colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
			}
			// Check if given background color found
			if (isset($this->background_colors[$background_color])) {
				$colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
			}
 
			// Add string and end coloring
			$colored_string .=  $string . "\033[0m";
 
			return $colored_string;
		}
 
		// Returns all foreground color names
		public function getForegroundColors() {
			return array_keys($this->foreground_colors);
		}
 
		// Returns all background color names
		public function getBackgroundColors() {
			return array_keys($this->background_colors);
		}





	}		


?>