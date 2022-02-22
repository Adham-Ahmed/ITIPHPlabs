<?php 
//name --less than 100
//email --email form(validate email)
//msg --less than 255char (strlen)
//msg appears on screen with the first error ( validation faliure)


//if all is well data is submitted and "Thank you for contacting us"
// in addition to the data entered by the user is shown of the screen
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    
<h1>Contact Form</h1>
<?php $msg="";
//echo"**$msg";
?>
<form method="post" action="phpsecond.php">
    <label for="nameInput">Your name:</label><br>
    <input type="text" name="name"><br>

    <label for="ageInput">Your email:</label><br>
    <input type="text" name="email"><br>

    <label for="message">Your message:</label><br>
    <input type="text" name="message" style="width: 250px; height:100px"><br>


    <button type="submit" name="submit">Send email</button>
    <button >Clear form</button>
</form>



<?php 
$name=$email=$message="";
if(isset($_POST['name']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    

}
$valid=false;
$msg="";
$submitted=false;

//if(isset($_POST['submit'])){$submitted=$_POST["submit"];}
if (isset($_POST['submit'])) {


        if (strlen($name)>100 ) //  if name > 100
    {
        $msg="**name should be less than 255 characters";
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) )//  if email is not valid
    {
        $msg="**Email is not valid";
    }

    elseif(strlen($message)>255 )//  if message > 255 char
    {
        $msg="**Message should be less than 255 characters";
    }
    echo"$msg";
        
}




$valid=strlen($name)<100 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($message)<255;



if($valid )//&& $_POST["submit"]
{
    
    //////////// DAY 2 code





    $fp=fopen("csvfile.csv","a+");
    fwrite($fp,date("F j Y g:i a").",");
    fwrite($fp,$_SERVER['REMOTE_ADDR'].",");
    fwrite($fp,"$email,");
    fwrite($fp,"$name,");
    fwrite($fp,"\n");

    echo ("<br><strong>Thanks for contacting Us</strong>
    <br>
    <strong>Name:</strong>$name<br>
    <strong>Email:</strong>$email<br>
    <strong>Message:</strong>$message<br>
    </p>
    ");

    
    
    

    
}
?>




    
</body>


</html>








