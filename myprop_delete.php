<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "property management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['sellerid']; // get id through query string

$del = mysqli_query($conn,"delete from seller where sellerid='$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:myproperty.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>