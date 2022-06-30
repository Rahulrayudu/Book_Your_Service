<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


$l=$_POST['worker'];
$p=$_SESSION['service_id'];
$h= implode(',',$l);
$m=explode(',',$h);
$mail=$_SESSION['user_mail'];

$sql = "INSERT INTO allotes_service (servid,staffid,user_mail) VALUES ('$p','$h','$mail')";


     if(mysqli_query($conn, $sql)){
       $qu= "UPDATE serv SET status= 'alloted' WHERE id='$p'";
       if(mysqli_query($conn, $qu)){
        header("location:admin_index.php");
       }

      }else{
        echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
} 

?>