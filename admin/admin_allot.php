<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


$id=$_GET['id'];
$gh=explode(',',$id);

$_SESSION['service_id']=$gh[0];
$_SESSION['user_mail']=$gh[1];
$im=$_SESSION['service_id'];
$sql = "SELECT * FROM serv where id='$im'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['status']=="in progress"){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="table.css">
      <link rel="stylesheet" href="navbar.css">
    </head>
    <body>
    <div class="navbar">
            <div class="c1">
                <img src="images/logo.png">
            </div>
      <nav>
        <ul>
          <li><a href="admin_index.php">Services</a></li>
          <li><a href="#">Properties</a></li>
          <li><a href="admin_logout.php" class="a">logout</a></li>
        </ul>
      </nav>
    </div>
      <div style="width:100%; margin-left:35%;">
        <h3>user selected: <span style="font-weight:lighter;"><?php echo $row['services']?></span> </h3>
      </div>
    </body>
    </html>
    <?php
    }else{
      header('location:admin_index.php');
    }
    }
}

?>

<form action="alloted_services.php" method="POST">

<div class="box">
<div class="table">
  <table class="ta1">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>phone</th>
      <th>Services</th>
      <th>Allot</th>
    </tr>

    <?php


$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM staff";
$result = $conn->query($sql);

?>

<?php
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<tr>
  <td><?php echo $row['id']; ?></td>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['phone']; ?></td>
  <td><?php echo $row['work']; ?></td>
  <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="worker[]"></td>
  
</tr>	
<?php
}
}else{ 
echo "0 results"; 
}
?>
</table>

  </div>
</div>
  

<input type="submit" style="margin:10px 0 0 46%;">
</form>
