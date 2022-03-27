<?php
$id=$_GET['id'];

echo("<br><table>");

echo("<tr>");
echo("<th>id</th>");
echo("<th>name</th>");
echo("<th>Photo</th>");
echo("</tr>");
    $image="<img src='images/'>";
    $more_link="<a href=item.php?id=$record->id>more</a>";
    echo("<tr>");
    echo("<td>".$record->id."</td>");
    echo("<td>".$record->product_name."</td>");
    echo("<td>".$image."</td>");
    echo("</tr>");

   

echo("</table>");
?>
