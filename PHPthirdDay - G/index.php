<?php 
require_once("vendor/autoload.php");
session_start();
echo("<h3>Counter Unique Visitors:</h3 <br>");
if(!isset($_SESSION["isCounted"]))
//
{
    Counter::increment();//incremenets counts in Counter.txt
    $_SESSION["isCounted"]=true;
}

echo(file("Counter.txt")[0]);
?>