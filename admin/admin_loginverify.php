<?php

session_start();

$username = $_POST["username"];
$password=$_POST["password"];
$error = "username/password incorrect";
$conn = mysqli_connect("localhost", "root", "", "property management");

$sql = "SELECT * FROM admin WHERE user_id='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['user_id'] === $username && $row['password'] === $password) {
        header("location: admin_index.php");
        exit();
    }
    else{
        $_SESSION["error"] = $error;
        header("location: admin_login.php");
    }
}
else{
    $_SESSION["error"] = $error;
    header("location: admin_login.php");
}

?>