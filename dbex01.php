<?php 

error_reporting(E_ALL & ~E_NOTICE);

include 'Y_CONFIG/database.php'; 
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Companydata extends Eloquent {
    protected $table = 'companydata';
}

class Gyousho extends Eloquent {
    protected $table = 'gyousho';
}

/*
	App::error(function(ModelNotFoundException $e)
	{
	    return Response::make('Not Found', 404);
	});
*/

echo("Started...\n");
 
//$companydata = Companydata::find(1); 
$gyousho = Gyousho::find(1)->toArray(); 

var_dump($gyousho['field']);

// Change some stuff 
//$book->name = "The Best Book in the World";
//$book->author = "Ed Zynda";
 
// Save it to the database
//$book->save();




error_reporting(0);
