<?php 
session_start(); 
 $conn = mysqli_connect("localhost", "root", "", "property management");
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email_id= $_POST['email'];
    $password= $_POST['password'];
    $_SESSION['user']=$email_id;
    if (empty($email_id)) {
        echo "User Name is required";
        exit();
    }else if(empty($password)){
        echo "Password is required";
        exit();
    }else{
        $sql = "SELECT * FROM user WHERE email_id='$email_id' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email_id'] === $email_id && $row['password'] === $password) {
                header("Location: index.html");
                exit();
            }
            else{
                echo "incorrect password";
            }
        }
        else{
            echo "incorrect password";
        }
    }
}
mysqli_close($conn);
?>