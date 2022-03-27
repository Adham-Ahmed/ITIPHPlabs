<?php
$id=$_GET['id'];

echo("<br><table>");

echo("<tr>");
echo("<th>id</th>");
echo("<th>name</th>");
echo("<th>Photo</th>");
echo("<th>Price in $</th>");
echo("</tr>");

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

$id=Capsule::table('items')->where('id','=',$id)->value("id");
$image_name=Capsule::table('items')->where('id','=',$id)->value("Photo");
$name=Capsule::table('items')->where('id','=',$id)->value("product_name");
$price=Capsule::table('items')->where('id','=',$id)->value("list_price");
$image="<img src='images/$image_name'>";
echo("<tr>");
echo("<td>".$id."</td>");
echo("<td>".$name."</td>");
echo("<td>".$image."</td>");
echo("<td>".$price."$"."</td>");
echo("</tr>");
echo("</table>");
?>