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


	//	App::error(function(ModelNotFoundException $e)
	//	{
	//	    return Response::make('Not Found', 404);
	//	});


	echo("Started...\n");

	//$gyousho = Gyousho::find(1)->toArray();  
	//$gyousho = Gyousho::find(1)->toArray(); 
	//var_dump($gyousho['field']);
	for($i=0;$i<10;$i++){
		$companydata = Companydata::find($i); 
		var_dump($companydata->address);
	}
	//$companydata = Companydata::get(); 
	//$companydata->each(function($invar){var_dump($invar->address);});

	// Save it to the database
	//$book->save();

	error_reporting(0);

