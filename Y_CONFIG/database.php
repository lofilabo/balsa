<?php  
require 'vendor/autoload.php';  
 
use Illuminate\Database\Capsule\Manager as Capsule;  
 
$capsule = new Capsule; 
 /*
$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'u076oran_kanri',
    'username'  => 'u076oran_wpuser',
    'password'  => 'dy9Otz109',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));
 */
 $capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'u076oran_kanri',
    'username'  => 'richard',
    'password'  => 'richard',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));
 
$capsule->bootEloquent();
//var_dump($capsule);
