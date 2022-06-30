
<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "property management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_GET['id'];
$qry = mysqli_query($conn,"select * from seller where sellerid='$id'");
$row = mysqli_fetch_array($qry);

if(isset($_POST['update'])){
  $phone=$_POST['phone'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $landmark=$_POST['landmark'];
  $pincode=$_POST['pincode'];
  $price=$_POST['price'];
  $pricepersq=$_POST['pricepersq'];
  $maintenance=$_POST['maintenance'];
  $edit=mysqli_query($conn,"update seller set phone='$phone',state='$state',city='$city',landmark='$landmark',pincode='$pincode',price='$price'
  ,pricepersq='$pricepersq',maintenance='$maintenance' where sellerid='$id' ");
  if($edit)
  {
      mysqli_close($conn); // Close connection
      header("location:admin_property.php"); // redirects to all records page
      exit;
  }
  else
  {
      echo "not able to update";
  }  

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .add_detail{
      width: 1000px;
      border: 0ch;
      margin:150px;
  }

  .add_detail tr{
      height: 40px;
  }

  .popup{
      display: block;
      background-color: #d3d3d3;
      margin: 40px 300px 0 300px;
      border-radius: 12px;
  }

.input{
      border-radius: 5px;
      width: 400px;
      border: 1px solid grey;
      height: 30px;
  }

  textarea{
      border-radius: 12px;
  }

  
  .submit{
      margin:20px -840px 30px 0 ;
      width: 100px;
      height: 40px;
      border-radius: 5px;
  }

    </style>
</head>
<body>
<a href="admin_property.php"><p><span>&#8592</span> Back</p></a>
<div class="popup" id="myform">
      <div class="form">
        <form method="post">
          <table class="add_detail">
            <tr>
              <td>Phone:</td>
              <td class="td1"><input type="text" class="input" name="phone" value="<?php echo $row['phone']?>"></td>
            </tr>
            <tr>
              <td>State:</td>
              <td class="td1"><input  class="input" name="state" id="address" cols="50" rows="3" value="<?php echo $row['state']?>"></td>
            </tr>
            <tr>
              <td>City:</td>
              <td class="td1"><input type="text" class="input" name="city" value="<?php echo $row['city']?>"></td>
            </tr>
            <tr>
              <td>Landmark:</td>
              <td class="td1"><input type="text" class="input" name="landmark" value="<?php echo $row['landmark']?>"></td>
            </tr>
            <tr>
              <td>Pincode:</td>
              <td class="td1"><input type="text" class="input" name="pincode" value="<?php echo $row['pincode']?>"></td>
            </tr>
            <tr>
              <td>Price:</td>
              <td class="td1"><input type="text" class="input" name="price" value="<?php echo $row['price']?>"></td>
            </tr>
            <tr>
              <td>price per sq feet:</td>
              <td class="td1"><input type="text" class="input" name="pricepersq" value="<?php echo $row['pricepersq']?>"></td>
            </tr>
            <tr>
              <td>Maintenance:</td>
              <td class="td1"><input type="text" class="input" name="maintenance" value="<?php echo $row['maintenance']?>"></td>
            </tr>
            <td><input type="submit" name="update" class="submit" value="update"></td>
          </table>
        </form>
      </div>
    </div>
</body>
</html>