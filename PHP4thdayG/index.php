<?php



require_once "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;
    $capsule = new Capsule;
    $capsule->addConnection([
    "driver" => "mysql",
    "host" =>__HOST__,
    "database" => __DB__,
    "username" => __USER__,
    "password" => __PASS__
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$all_records=Capsule::table("items")->skip(0)->take(__RECORDS_PER_PAGE__)->get();
echo("<table>");
foreach ($all_records as  $record) { //record
    
    foreach ($record as $key => $value) { //inside record
        print "<h5>$key : $value</h5>";
    }
    echo("<br>____________________</br>");
}

echo("</table>");


?>