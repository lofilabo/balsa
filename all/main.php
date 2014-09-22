<?php
	//echo("1234");

	include("Fileion.php");
	include("MakeNewPageClass.php");
	//$main = new Fileio();
	$main = new main($argv);

	class main{

		function main($args){
			

			//echo("Command Line args passed to main: ");
			//var_dump($args);

			if(count($args)>1){
				//there is at least one cmd line argument.
				//echo("Args Exist\n");

				$i=0;
				foreach($args as $arg){
					if($arg==="-s"){

						// The SITE command.
						// If no directory is given as an argument after the -s switch, 
						// the present working diretory will be used.

						echo("Deprecated.  Please clone from git (https://github.com/lofilabo/balsa.git)\n");
						die;

						$cwd = getcwd();
						
						if(sizeof($args) >($i+1)){
							$newsitelocation = $args[$i+1];	
							echo("new site location is supplied path " . $newsitelocation  . "\n");
							
						}else{
							echo("new site location is assumed to be PWD.\n");
							$newsitelocation = $cwd;
						}

						
						$src = "C:\\ProjectSource\\j4";
						//$des = opendir (getcwd());	
						$des = "/" . $newsitelocation;
						//echo("site location: " . $newsitelocation . "\n");
						//echo ("cwd: " . $cwd . "\n");
						


						$this->recurse_copy($src, $des);	
						
					}else{
						if($arg==="-p"){
							echo("Making new logic, control and template classes.\n");
							echo("Page name: " . $args[$i+1] . "\n");
							//the page command expects to be executed from the 
							// ./all directory of the NEW SITE. 
							$cwd = realpath(dirname(__FILE__) . '/..');
							$des = opendir ($cwd);	
							$pClassname = $args[$i+1];
							$mnp = new MakeNewPageClass();
							$mnp->doMakeClassMgr($pClassname);

						}
					}
					$i++;
				}


			}else{
				//no arguments.  Go to interactive.
				$this->mainmenu();
			}

		}

		function mainmenu(){
			//TODO: Interactive main menu.
			echo("No switch.  Please specify -p [NewPageName]");
		}

		function recurse_copy($src,$dst) { 
			echo("RECURSE SRC: " . $src . "\n");
			echo("RECURSE DST: " . $dst . "\n");
			//die;
		    $dir = opendir($src); 
		    @mkdir($dst); 
		    while(false !== ( $file = readdir($dir)) ) { 
		        if (( $file != '.' ) && ( $file != '..' )) { 
		            if ( is_dir($src . '/' . $file) ) { 
		                $this->recurse_copy($src . '/' . $file,$dst . '/' . $file); 
		            } 
		            else { 
		                copy($src . '/' . $file,$dst . '/' . $file); 
		            } 
		        } 
		    } 
		    closedir($dir); 
		}
	}

?>