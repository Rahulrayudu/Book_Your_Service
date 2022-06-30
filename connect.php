<?php
 session_start();
 $conn = mysqli_connect("localhost", "root", "", "property management");
if($conn === false){
 die("ERROR: Could not connect. "
 . mysqli_connect_error());
 }

 if(isset($_POST['submit'])){
 $email_id = $_POST['email'];
 $name= $_POST['name'];
 $password = $_POST['password1'];
 $con_password=$_POST['password'];

if($password==$con_password){
    $sql = "INSERT INTO user VALUES ('$email_id','$name','$password')";
     if(mysqli_query($conn, $sql)){
          echo '<meta http-equiv="refresh" content="1; URL=login page.html" />';
     } else{
         echo "Username already registered ";
    }
}
else{
    echo "Password Not Match ";
}
}
else{
    echo "not able connect";
}
 mysqli_close($conn);
 ?>
