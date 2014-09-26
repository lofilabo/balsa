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


		public function var_dump_parser($contents){

			$arrContents = explode(  chr(10) , $contents );
			$arrOut=array();
			$arrOutAll=array();
			foreach($arrContents as $oneLine){
				$changed = str_replace( "<", "-|TAG|- <", $oneLine );
				$changed = str_replace("=&gt;", " -|GT|-", $changed);

				$changed= strip_tags($changed);
				//at this point, $changed holds an array of strings, each element of which holds a string.  
				//This is quite an acceptable output, so we can always return here.

				//Instead, let's make a more comprehensive array
				//element 0 should say whether the line is debug data or debug metadata.
				//WHAT DOES THAT MEAN?
				//Here's a sample of the kind of data we might have at this moment:
				/*
				  0 => string '-|TAG|- ' (length=8)
				  1 => string '-|TAG|- array-|TAG|-  -|TAG|- (size=3)-|TAG|- ' (length=46)
				  2 => string '  0 -|TAG|-  -|GT|--|TAG|-  ' (length=28)
				  3 => string '    -|TAG|- array-|TAG|-  -|TAG|- (size=3)-|TAG|- ' (length=50)
				  4 => string '      0 -|TAG|-  -|GT|--|TAG|-  -|TAG|- string-|TAG|-  -|TAG|- 'one-one'-|TAG|-  -|TAG|- (length=7)-|TAG|- ' (length=107)
				  5 => string '      1 -|TAG|-  -|GT|--|TAG|-  -|TAG|- string-|TAG|-  -|TAG|- 'one-two'-|TAG|-  -|TAG|- (length=7)-|TAG|- ' (length=107)
				  6 => string '      2 -|TAG|-  -|GT|--|TAG|-  -|TAG|- string-|TAG|-  -|TAG|- 'one-three'-|TAG|-  -|TAG|- (length=9)-|TAG|- ' (length=109)
				*/
				//	it can be clearly seen that there are two kinds of lines: metadata lines (i.e, information about the array, 
				//  starting with some indent spaces and a -|TAG|- )
				//	and actual array data, starting with an array element definition (in this case, an integer.  This could itself be a Char String.)

				/*
				//sample GREP.
				$patterns = array ('/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/','/^\s*{(\w+)}\s*=/');
				$replace = array ('\3/\4/\1\2', '$\1 =');
				$changed = preg_replace($patterns, $replace, $changed);
				*/

				//let's make an array to hold each LINE, with metadata:
				//	0 	dttype 	line type; 0=data item, 1=meta item
				//	1 	spaces	leading spaces
				//	2 	length 	length ( length=xx item strpped of brackets and length= statement)
				//	3 	dtitem	data item with -|TAG|- markers removed 
				$thisline = array();
				
				if( strpos( trim($changed) , "-|TAG|-")==0){
					$thisline['dttype'] = 'meta';
				}else{
					$thisline['dttype'] = 'data';
				}

				$thisline['spaces'] = strlen($changed)-strlen(ltrim($changed));

				preg_match_all( '/\((.*?)\)/' , $changed, $matches) ;
				$thisline['length'] =  implode(' ', $matches[1]);

				preg_match_all( '~(["\'])([^"\']+)\1~' , $changed, $matches) ;
				$thisline['dtitem'] =  implode(' ', $matches[2]);				

				var_dump($thisline);


				$arrOut[] 		= $changed;
				$arrOutAll[]	= $thisline;
			}
			//during dbg dev, look at the state of the dbg array in the browser
			//var_dump( $arrOut );
			//var_dump( $arrOutAll );
			
			//$contents= strip_tags($contents);
			//$contents = str_replace("=&gt;", "-<", $contents);
			//$contents = str_replace("=&gt;", "  |  ", $contents);
			//$contents = str_replace("length=", "", $contents);
			//$contents = str_replace("      ", "        | ", $contents);
			//$contents = str_replace("size=", "", $contents);
			//$contents = str_replace(chr(10), chr(10) . "        _______________________________" . chr(10), $contents);
			$switch=0;

			$totalString = "\n". $this->getColoredString("    Debug Dump                                        ", "black", "green") ."\n";
			foreach ($arrOutAll as $arrOutOne) {



				if($switch==0){
					$metaColourF = "red";
					$metaColourB = "black";
					$dataColourF = "green";
					$dataColourB = "black";
				}else{
					$metaColourF = "red";
					$metaColourB = "black";
					$dataColourF = "brown";
					$dataColourB = "black";
				}


				//var_dump($arrOutOne);
				if($arrOutOne['dttype']=='meta'){
					if( strlen($arrOutOne['length']) > 0 ){
						//$totalString = $totalString . "\n";
						$paddingString = str_pad("" , $arrOutOne['spaces'] - 0);
						$totalString = $totalString . $this->getColoredString(  $paddingString, $dataColourF, $dataColourB);
						$totalString = $totalString . $this->getColoredString(  str_replace("size=",  "", $arrOutOne['length']  ), $metaColourF, $metaColourB);
						$totalString = $totalString . $this->getColoredString(  str_pad($arrOutOne['dtitem'] , 10), $dataColourF, $dataColourB);
						$totalString = $totalString . $this->getColoredString("", $metaColourF, $metaColourB);
						$totalString = $totalString . "\n";
					}
					$switch=0;
				}else{
					if( strlen($arrOutOne['dtitem']) > 0 ){
						//$totalString = $totalString . "\n";
						$paddingString = str_pad("" , $arrOutOne['spaces'] - 0);
						$totalString = $totalString . $paddingString;
						//$totalString = $totalString . $this->getColoredString(  $paddingString, $dataColourF, $dataColourB);
						$totalString = $totalString . $this->getColoredString(  str_pad($arrOutOne['dtitem'] , 70), $dataColourF, $dataColourB);
						$totalString = $totalString . $this->getColoredString(  str_replace("length=",  "", $arrOutOne['length']  ), $dataColourF, $dataColourB);
						$totalString = $totalString . "\n";

						if($switch==0){
							$switch=1;
						}else{
							$switch=0;
						}
					}
				}

			}

			//$contents = implode("\n", $arrOutAll);
			//$contents = implode("\n", $arrOut);
			//return $contents;
			return $totalString;

		}

		public function var_error_log( $object=null ){
			/*Based on*/
			/*http://justinsilver.com/technology/writing-to-the-php-error_log-with-var_dump-and-print_r/*/
			//$colors = new Colors();		   //
		    ob_start();                    // start buffer capture
		    var_dump( $object );           // dump the values
		    $contents = ob_get_contents(); // put the buffer into a variable
		    ob_end_clean();                // end capture

			$out = $this->var_dump_parser($contents);

			//error_log ($this->getColoredString($out, "cyan", "black") . "\n"); 
			error_log($out);

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