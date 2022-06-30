<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <style>
        .flex{
            display:flex;
            justify-content:center;
        }
        .box{
            margin:100px;
            width: 400px;
            height: 320px;
            box-shadow:0 0 40px 20px rgba(0,0,0,0.26);
            border-radius:12px;
        }
        .lower{
            margin-top:30px;
        }
        #input{
            width: 350px;
            text-align:center;
            height: 20px;
            margin:10px 0 5px 20px;
            border-radius:12px;
            border:1px solid grey;
        }
        .upper h2{
            text-align:center;
        }
        .output{
            margin-top:30px;
            margin-left:165px;
        }
        .submit{
            width: 70px;
            border-radius:12px;
        }
    </style>
</head>
<body>
	<div class="total">
		<div class="flex">
			<div class="box">
				<div class="upper">
					<h2>ADMIN LOGIN</h2>
				</div>
			    <hr>
                <?php
                    session_start();
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>
				<div class="lower">
					<form action="admin_loginverify.php" method="POST">
						<input type="text" class="username" placeholder="username" id="input" name="username">
						<input type="password" class="password" placeholder="password" id="input" name="password">
                        <div class="output">
                            <input type="submit" class="submit">
                        </div>
					</form>
				</div>
			</div>
	    </div>
	</div>
</body>
</html>