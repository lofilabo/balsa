<?php

class fileio{

var $fp;
var $fname;
var $curline;
var $curpos;

/*
	r 	Open for reading only; place the file pointer at the beginning of the file. 
	r+	Open for reading and writing; place the file pointer at the beginning of the file. 
	w 	Open for writing only; place the file pointer at the beginning of the file and truncate the file to zero length. If the file does not exist, attempt to create it. 
	w+ 	Open for reading and writing; place the file pointer at the beginning of the file and truncate the file to zero length. If the file does not exist, attempt to create it. 
	a 	Open for writing only; place the file pointer at the end of the file. If the file does not exist, attempt to create it. 
	a+ 	Open for reading and writing; place the file pointer at the end of the file. If the file does not exist, attempt to create it. 
	x 	Create and open for writing only; place the file pointer at the beginning of the file. 
	x+ 	Create and open for reading and writing; place the file pointer at the beginning of the file. 
*/

	function getAll($fname){
		//db(1, $fname);
		if(file_exists($fname)){
			$fileHandle = fopen($fname, 'r');
			$fileData = fread ($fileHandle, 8192);
			fclose($fileHandle);
			return $fileData;
		}else{
			return "";
		}
	}
	
	function openRead(){

		//r 	Open for reading only; place the file pointer at the beginning of the file. 

		$fp = fopen($this->fname, 'r'); 
		$this->fp = $fp;
		return $fp;
	}

	function openReadWrite(){

		//r+	Open for reading and writing; place the file pointer at the beginning of the file. 

		$fp = fopen($this->fname, 'r+'); 
		$this->fp = $fp;
		return $fp;
	}

	function openReadWriteERASEALL(){

		//r+	Open for reading and writing; place the file pointer at the beginning of the file. 

		$fp = fopen($this->fname, 'w+'); 
		$this->fp = $fp;
		return $fp;
	}


	function readLine(){
	
		$this->curline = fgets($this->fp);
		$this->curpos  = ftell($this->fp);
		return feof($this->fp);
	}
	
	function readAll(){
	
		$this->curline = fread($this->fp, 8192);
		
		return feof($this->fp);
	}
	
	
	
	function writeAll($stringtowrite){
	
		fputs($this->fp, $stringtowrite);
	
	}

	
	function close(){
	
		fclose($this->fp);
	
	}
	

	
}

?>