<?php


/*
	this replaces the old-style include file where all the files were
	explicitly included.  because we'll be doing a lot of real-time file 
	creation, we need to read in the list of *.php files from everywhere 
	in the tree, EXCEPT this file and the index (which calls this file!!)
*/


  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.
 $dir  = getcwd(); 
 $dirlist = ( getFileList($dir, true) );
 
 include("Y_GLOBALS/base_control_c.php");
 include("Y_GLOBALS/base_logic_l.php");


foreach($dirlist as $fname){

	$curfile = $fname["name"];

	if (  strpos($curfile, ".php")  ){
  		if( 
          (strpos($curfile, "common_includes"))  || 
    			(strpos($curfile, "all"))  || 
    		  (strpos($curfile, "db_admin"))  || 
    			(strpos($curfile, "index.php"))  ||
    			(strpos($curfile, "cntrl.php"))  ||
    			(strpos($curfile, "logic.php"))  ||
    			(strpos($curfile, "base_control_c.php"))  ||
          (strpos($curfile, "base_logic_l.php"))  ||

          //Leave these in the config unless you are using dbex to experiment with Eloquent.
          (strpos($curfile, "dbex01.php"))  ||
          (strpos($curfile, "vendor"))  ||
          (strpos($curfile, "~"))
			
		){
		
		}else{
			//print ($curfile);
			//print ("<br/>");
      include($curfile) ;
		}

	}
}

  function getFileList($dir, $recurse=false)
  {
    # array to hold return value
    $retval = array();

    # add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    # open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
      # skip hidden files
      if($entry[0] == ".") continue;
      if(is_dir("$dir$entry")) {
      //just for now, we don't care about listing directories.
       /*
       $retval[] = array(
          "name" => "$dir$entry/",
          "type" => filetype("$dir$entry"),
          "size" => 0,
          "lastmod" => filemtime("$dir$entry")
        );
        */
        if($recurse && is_readable("$dir$entry/")) {
          $retval = array_merge($retval, getFileList("$dir$entry/", true));
        }
      } elseif(is_readable("$dir$entry")) {
        $retval[] = array(
          "name" => "$dir$entry",
          //just for now, we're not interested in any property except NAME
          //"type" => mime_content_type("$dir$entry"),
          //"size" => filesize("$dir$entry"),
          //"lastmod" => filemtime("$dir$entry")
        );
      }
    }
    $d->close();

    return $retval;
  }
	
 
?>
