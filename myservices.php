<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    font-family: 'Poppins',sans-serif;
    box-sizing: border-box;
}

.total{
      width: 100%;
      min-height: 100vh;
      background: white;
}
    .table{
    width: 1400px;
    box-shadow:0 0 30px 30px rgba(0,0,0,0.1);
    margin: 50px 0 0 60px;
    border-radius: 12px;
}


table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border-radius: 12px;
  }
  
 
  th, td {
    text-align: center;
    padding: 8px;
  }
  
  td{
      height: 80px;
  }


  
  .ta1 tr:nth-child(even){background-color: #f2f2f2}

  .h2{
    margin:40px 0 -20px 600px;
  }
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
<link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <div class=total>
    <div class="navbar">
            <div class="c1">
                <img src="images/logo.png">
            </div>
            <nav>
                 <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Account</a></li>
                </ul>
            </nav>
            <button class="dropbtn" onclick="menutoggle()"></button>
        </div>
        <div id="myDropdown" class="dropdown-content menu active">
            <ul>
               <li><img src="images/user.png"><a href="#">My Profile</a></li>
               <li><img src="images/home.png"><a href="myproperty.php">My Property</a></li>
               <li><img src="images/shortlist.png"><a href="#">Shortlist</a></li>
               <li><img src="images/serv.jpg"><a href="myservices.php">My services</a></li>
               <li><img src="images/logout.png"><a href="login page.html">Log out</a></li>
            </ul>
         </div>
         <div class="box">
    <div class="table">
      <table class="ta1">
        <tr>
          <th>Services</th>
          <th>Status</th>
          <th>Delete</th>
        </tr>

        <?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$email=$_SESSION['user'];
$sql = "SELECT * FROM serv where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $row['services']; ?></td>
      <td><span><?php echo $row['status']?></span></td>
      <td><a href="myservices_delete.php?id=<?php echo $row['id'];?>" class="contact">delete</a></td>
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

<div class="box">
<h2 class="h2">Alloted Service Person</h2>
    <div class="table">
      <table class="ta1">
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Work alloted</th>
        </tr>

        <?php

$email=$_SESSION['user'];
$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM allotes_service where user_mail='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $arr=explode(',',$row['staffid']);
    for($i=0;$i<sizeof($arr);$i++){
      $sq = "SELECT * FROM staff where id='$arr[$i]'";
      $re = $conn->query($sq);
      if ($re->num_rows > 0) {
        while($r = $re->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $r['name']; ?></td>
          <td><?php echo $r['phone']; ?></td>
          <td><?php echo $r['work']; ?></td>
        </tr>	
      <?php
     }
    }else{
      echo "Not alloted";
    }
    }
  }
}else{ 
  echo "Not alloted"; 
}
?>
</table>
</div>
</div>

</body>
<script>
    function menutoggle() {
           document.getElementById("myDropdown").classList.toggle("show");
         }
         window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
               var dropdowns = document.getElementsByClassName("dropdown-content");
               var i;
               for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                     openDropdown.classList.remove('show');
                  }
               }
            }
         }
 </script>
</html>