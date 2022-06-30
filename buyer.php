<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/rent_buy.css">
    <title>Renting</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <style>
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
    box-sizing: border-box;
}
      .contact{
        border-radius:12px;
        border:0.4px solid black;
        padding:5px;
      }
      .contact:hover{
        background-color: red;
        color:white;
      }
      
      .search_box{
        align-items:center;
        width: 100%;
        justify-content: center;
      }
      .search{
        width: 300px;
        padding-top:2px;
        border-radius:12px;
        margin:20px 0 0 600px;
        text-align:center;
      }
      .sea_but{
        margin: 0 0 -10px -30px;
        background-color: transparent;
        border:none;
        height: 18px;
      }
      .sea_img{
        margin-bottom:-40px;
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
                            <li><a href="index.html" >Home</a></li>
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
            <?php
               session_start();
                error_reporting(0);
                ?>
                <div id='connectMsg' class='alert alert-success'>
                    <?php
               echo $_SESSION['wish_msg'];
               unset($_SESSION['wish_msg']);
               ?>               
                </div>  
            <div class="search_box">
              <form action="buyer.php" method="POST">
              <input type="text" name="search" class="search" placeholder="city/state/pincode.....">
                <button type="submit" name="sea_subm" class="sea_but"><img name="sea_img" src="images/search.png" style="width:17px; height:17px;"></button>
              </form>
            </div>
             <div class="box">
    <div class="table">
      <table class="ta1">
        <tr>
          <th>Image</th>
          <th>type</th>
          <th>price</th>
          <th>state</th>
          <th>contact</th>
          <th>favorite</th>
        </tr>

        <?php


$conn = mysqli_connect("localhost", "root", "", "property management");
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['sea_subm'])){
  $search=$_POST['search'];
  if($search!=NULL){
    $sql = "SELECT * FROM seller where (sell='rent' or sell='lease') and pincode='$search'";
  }
  else{
    $sql = "SELECT * FROM seller where sell='rent' or sell='lease'";
  }
}
else{
  $sql = "SELECT * FROM seller where sell='rent' or sell='lease'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
     $files_array=explode(',',$row['images']);
    ?>
    <tr>
      <td><a href="mul_images.php?id=<?php echo $row['sellerid'];?>">
      <img class="img1" id="img1" src="uploads/<?php echo $files_array[0]; ?>" width="100" height="100"></a></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['state']; ?></td>
      <td><a href="rent_pop.php?id=<?php echo $row['sellerid'];?>" class="contact">contact</a></td>
      <td><a onclick="hideMessage()" href="add_to_wishlist_rent.php?id=<?php echo $row['sellerid'];?>,<?php echo $row['user'];?>" class="contact">Add to wishlist</a></td>
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
     function hideMessage() {
     document.getElementById("connectMsg").style.display = "none"};
     setTimeout(hideMessage,3000);

     $(document).ready(function(){
       $(".heart").click(function(){
         $(this).toggleclass("active_heart");
       });
     });
</script>
</html>