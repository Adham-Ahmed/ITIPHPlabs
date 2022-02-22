<?php

$imported_content=file("csvfile.csv");

foreach ($imported_content as $key => $value) {
    //var_dump($value."<br>");
    $line=explode(",",$value);
    //var_dump($line);
    echo("Visit Date:".$line[0]);
    echo("<br>");
    echo("IP address: ".$line[1]);
    echo("<br>");
    echo("Email:".$line[2]);
    echo("<br>");
    echo("Name:".$line[3]);
    echo("<br>");
    echo("<br>");
    echo("<hr>");
}
?>