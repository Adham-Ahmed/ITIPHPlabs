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
$skipVal=isset($_GET["index"])?$_GET["index"]:0;
$all_records=Capsule::table("items")->skip($skipVal)->take(__RECORDS_PER_PAGE__)->get();
?>
<html>
    <h3>Add new glasses</h3>
        <form action="index.php" method="post">
            Name:<input type="text" name="Name">
            <br><br>
            Photo:<input type="file" name="Photo">
            <br><br>
            <button type="submit">Add new glass</button>
        </form>
    </html>


<?php

$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;
$next_index = $index +__RECORDS_PER_PAGE__;
$next_link = "http://localhost/PHPfifthday/index.php?index=$next_index";
$previous_index = (($index - __RECORDS_PER_PAGE__)>=0)?$index - __RECORDS_PER_PAGE__:0;
$previous_link = "http://localhost/PHPfifthday/index.php?index=$previous_index";

if(!isset($_GET['id']))
{
    
   require_once("mainview.php");

   if(isset($_POST)&&isset($_FILES)&&  isset($_POST["submit"]) )
        {
        $name=$_POST["Name"];
        $Photo=$_POST["Photo"];
        $newfile="img".uniqid().".png";
        Capsule::table("items")->insert(
            [
            "PRODUCT_code"=>$name,    
            "product_name"=>$name,
            "Photo"=>"$newfile"]
            );
        }
        
}
else
{
    require_once("itemview.php");

}

require_once("styles.html");

?>

<div> 
    <a href="<?php echo $previous_link;  ?>"> << Prev </a> | <a href="<?php echo $next_link;  ?>">  Next >> </a>
</div>



