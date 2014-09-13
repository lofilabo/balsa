<?php
	class Fileion {

		
		
		function Fileion (){
			
			$dir1 = realpath(dirname(__FILE__));;
			$dir2 = dirname($dir1);
			
			print("Debug Output: ");
			print("\n");
			print($dir1);
			print("\n");
			print($dir2);
			print("\n");
			
			
		}
		
		function  chk(){
		
		}
		
		//$fromFile, $toFile are file handles
		function copyFile($fromFile, $toFile){
		
		}
		
		function copyFiles($src, $dest){
		
		}
	}
?>