<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="table.css">
    <title>Renting</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
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
          <th>User id</th>
          <th>Sell</th>
          <th>Type</th>
          <th>Price</th>
          <th>State</th>
          <th>Pincode</th>
          <th>Edit</th>
        </tr>

        <?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "SELECT * FROM seller ";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $files_array=explode(',',$row['images']);
    ?>
    <tr>
    <td><?php echo $row['user']; ?></td>
    <td><?php echo $row['sell']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['state']; ?></td>
      <td><?php echo $row['pincode']; ?></td>
      <td><a href="admin_edit_property.php?id=<?php echo $row['sellerid'];?>" class="contact">Edit</a></td>
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
     $(document).ready(function(){
       $(".heart").click(function(){
         $(this).toggleclass("active_heart");
       });
     });
</script>
</html>