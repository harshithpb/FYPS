<html>
<body>

	<?php
		
		/* declare variables */
		$dbservername = "127.0.0.1";
		$dbusername = "fyps";
		$dbpassword = "fyps123$";
		$dbname = "fyps";
		$success = "0";

	//echo "server: " . $dbservername . " username: " . $dbusername . " dbnname: " . $dbname . "<br>";
		
	//echo "USERID: " . $_POST["UserId"]; 
	//echo "<br>";
//	echo "PWD: " . $_POST["password"]; 
		
		// Create connection
		$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
//		echo "Connected successfully". "<br>";
				
		// construct SQL query
		$sql = "SELECT fyps_user_id, fyps_user_name, fyps_password, fyps_user_role FROM fyps_user ";
		$sql = $sql . " where fyps_user_id = " . '"'.$_POST["UserId"].'"'." and fyps_password = " . '"'.$_POST["password"]. '"';
		
		echo $sql;
		echo "<br>";
				
		// execute SQL query
		$result = $conn->query($sql);
				
				// check query result
				if ($result->num_rows == 1) 
				{
					$row = $result->fetch_assoc();
					echo "Validation successfull... Role: ".$row["fyps_user_role"] ;
					$success = "0";
					if ( $row["fyps_user_role"] == "faculty" )
					{
						include("FYPS-FACULTY.html");
						//include("FYPS-ADMIN.html");
					}
					elseif ( $row["fyps_user_role"] == "admin" )
					{
						include("FYPS-ADMIN.html");
						//include("FYPS-FACULTY.html");
					}
					elseif ( $row["fyps_user_role"] == "student" )
					{
						
						include("FYPS-STUDENT.html");
					}
					else{
						echo "<br>";
						echo "Invalid User Role... ";
					}
				} 
				else 
				{
					echo "Invalid User-id and/or Password";
					$success = "1";
				}				
				
				// Close connection
				$conn->close();	

			
	?>

</body>
</html>