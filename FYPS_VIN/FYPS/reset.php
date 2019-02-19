<!DOCTYPE HTML>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="FYPS-STYLE-1.css" > 
</head>
<body>
<?php

		if(isset($_POST['submit'])) 
		{
				Update_Password_now();
		}
		
		$vUSERId = $_POST["USER_ID"];
		$GLOBALS['USER_ID'] = $vUSERId;
		
		
		function Update_Password_now()
		{
			
		//declare variables for DB connection
		$dbservername = "127.0.0.1";
		$dbusername = "fyps";
		$dbpassword = "fyps123$";
		$dbname = "fyps";
		$success = "0";
		
		//create connection
		$conn = new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		
		$vUSERId = $_POST["user_id"];
		//$GLOBALS['USER_ID'] = $vUSERId;
		$vNewPassword = $_POST["new_password"];
		$vConfirmPassword = $_POST["confirm_password"];
		
		if($vNewPassword==$vConfirmPassword)
		{
			 echo "<script type='text/javascript'>alert('password matched...');</script>";
			 //update password in database
			 $sql = "update fyps_user set" ;
			 $sql = $sql." fyps_password = " . '"'.$vConfirmPassword.'"';
			 $sql = $sql." where fyps_user_id = ".'"'.$vUSERId.'"';
			// echo "<script type='text/javascript'>alert('$sql');</script>";
			 // execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						echo "<script type='text/javascript'>alert(' PASSWORD Updated Successfully...');</script>";
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
		}
		else
		{
			echo "<script type='text/javascript'>alert('password doesnot match...');</script>";
		}
		
		$conn->close();
		}
?>  

<div class="fixed-header">
		<div  class="container" >
				<h1> <center>FYPS - FINAL YEAR PROJECT STATUS</center> </h1>
				<h2> <center>RESET PASSWORD</center> </h2>
				<button type="button" onclick= "location.href='index.html'" id = "ADMIN_HOME" >HOME</button>

		</div>
		</div>
		<br>
	
		<form action="reset.php" alt="reset pph not found" method = "post">		
		<div class="body-container"> <center>
			USER ID : <input type="text" name= "user_id" value="<?php if(isset ($GLOBALS['USER_ID'])){ echo $vUSERId; } ?>" ><br><br>
						<hr>
			NEW PASSWORD: <input type="password" name= "new_password"  > <br><br>
			CONFIRM PASSWORD: <input type="password" name ="confirm_password"  > <br><br>
			
						<input type="submit" name="submit" value="submit" >
		</center>
			</div>
		</form>

		
		<div class="fixed-footer">
              <div class="container"> 2018 36c</div>        
          </div>
</body>
</html>