<?php


function putc($text){

	print($text);

}

function putn($text){

	print(chr(10) . chr(13));
	print($text);

}

function puto($text){

	$text = str_replace(chr(10), '', $text);
	$text = str_replace(chr(13), '', $text);
	print($text);

}

function db($name, $val){

	//echo ("<br/>");
	echo ("<table border=0><td bgcolor=#000000>");
	echo ("NAME : <b>");
	echo ($name);
	echo ("&nbsp;&nbsp;");
	echo ("</b>VALUE: <b>");
	echo ($val);
	echo ("</b>&nbsp;&nbsp;</td></table>");
	
}

function br(){
	
	print('<br>');
	print(chr(10) . chr(13));

}

function nl(){

	print(chr(10) . chr(13));

}

function into_textbox($text){

	$text = str_replace(" ", chr(160), $text);
	return $text;
}


function outof_textbox($text){

	$text = str_replace(chr(160), " ", $text);
	return $text;
}



?>