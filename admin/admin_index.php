<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin index</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="table.css">
    <style>

        .contact{
        border-radius:12px;
        border:0.4px solid black;
        padding:5px;
        color:black;
        text-decoration:none;
      }
      .contact:hover{
        background-color: red;
        color:white;
      }

    </style>
</head>
<body>
  <div class="total">
    <div class="navbar">
            <div class="c1">
                <img src="images/logo.png">
            </div>
      <nav>
        <ul>
          <li><a href="admin_index.php">Services</a></li>
          <li><a href="admin_property.php">Properties</a></li>
          <li><a href="admin_logout.php" class="a">logout</a></li>
        </ul>
      </nav>
    </div>
    <div class="box">
    <div class="table">
      <table class="ta1">
        <tr>
          <th>Email</th>
          <th>Address</th>
          <th>House no</th>
          <th>Services</th>
          <th>Allot</th>
        </tr>

        <?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM serv";
$result = $conn->query($sql);




if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['houseno']; ?></td>
      <td><?php echo $row['services']; ?></td>
      <td><a href="admin_allot.php?id=<?php echo $row['id'];?>,<?php echo $row['email'];?>" class="contact"><?php echo $row['status']?></a></td>
      
    </tr>	
    <?php
  }
}else{ 
  echo "0 results"; 
}
?>


</table>
<?php $conn->close();?>
      </div>
    </div>
  </div>

  <script>
    function openform(){
      document.getElementById("myform").style.display="block";
    }
    function closeform(){
      document.getElementById("myform").style.display="none";
    }
  </script>
</body>
</html>