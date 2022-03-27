<?php
echo("<table>");
    echo("<tr>");
    echo("<th>id</th>");
    echo("<th>name</th>");
    echo("<th>Photo</th>");
    echo("<th>Details</th>");
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
$skipVal=isset($_GET["index"])?$_GET["index"]:0;
    $all_records=Capsule::table("items")->skip($skipVal)->take(__RECORDS_PER_PAGE__)->get();
    foreach ($all_records as  $record) { //record
        $photos_names=explode(".",$record->Photo);
        $photos_names=$photos_names[0]."tz."."png";
    
        $image="<img src='images/$photos_names'>";
        $more_link="<a href=index.php?id=$record->id>more</a>";
        echo("<tr>");
        echo("<td>".$record->id."</td>");
        echo("<td>".$record->product_name."</td>");
        echo("<td>".$image."</td>");
        echo("<td>$more_link</td>");
        echo("</tr>");
        
       
    }
    echo("</table>");
    
    ?>
    
