<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS UPDATE FACULTY</title> 
	   </head>
       <body>
	    <body background="w7.jpg" >
	   
		<?php

			if(isset($_POST['submit'])) {
				Get_Faculty();
			}
		
			if(isset($_POST['save'])) {
				Save_Faculty();
			}
			
			function Save_Faculty()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vFacultyid = $_POST["FacultyID"];
				$vFacultyName = $_POST["FacultyName"];
				$vFacultyAddr = $_POST["FacultyAddr"];
				$vFacultyContact = $_POST["FacultyContact"];
				$vFacultyemailid = $_POST["Facultyemailid"];
				$vFacultydeptmt = $_POST["Facultydeptmt"];

				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				//echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "update fyps_faculty set ";
				$sql = $sql . " fyps_faculty_name = ".'"'.$vFacultyName.'"'.", fyps_faculty_address = ".'"'.$vFacultyAddr.'"';
				$sql = $sql . " ,fyps_faculty_contact = ".'"'.$vFacultyContact.'"'." ,fyps_faculty_emailid = ".'"'.$vFacultyemailid.'"';
				$sql = $sql . " ,fyps_faculty_department = ".'"'.$vFacultydeptmt.'"';
				$sql = $sql . " where fyps_faculty_id = ".'"'.$vFacultyid.'"';
				
				//echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						echo "<script type='text/javascript'>alert(' FYPS_FACULTY...Updated Successfully...');</script>";
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				$conn->close();
				
			}   
			
			function Get_Faculty()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vFacultyID = $_POST["FacultyId"];
				$GLOBALS['vFacultyid'] = $vFacultyID;

				//echo "<script type='text/javascript'>alert('$vFacultyID');</script>";
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				//echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "  select fyps_faculty_id, fyps_faculty_name, fyps_faculty_address, fyps_faculty_contact, ";
				$sql = $sql . "  fyps_faculty_emailid, fyps_faculty_department from fyps_faculty where fyps_faculty_id =  ";
				$sql = $sql . '"'.$vFacultyID.'"';
								
				//echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql); 
				
				if ($result->num_rows > 0)
				{
						//echo "<script type='text/javascript'>alert(' FYPS_FACULTY...Read Successfully...');</script>";
						$row = $result->fetch_assoc();
						
						$vRole = "FACULTY";
						$GLOBALS['vFacultyName'] = $row["fyps_faculty_name"];
						$GLOBALS['vFacultyAddr'] = $row["fyps_faculty_address"];
						$GLOBALS['vFacultyContact'] = $row["fyps_faculty_contact"];
						$GLOBALS['vFacultyemailid'] = $row["fyps_faculty_emailid"];
						$GLOBALS['vFacultydeptmt'] = $row["fyps_faculty_department"];
						
						$vStr = $GLOBALS['vFacultyName'].",".$GLOBALS['vFacultyAddr'].",".$GLOBALS['vFacultyContact'].$GLOBALS['vFacultyemailid'].",".$GLOBALS['vFacultydeptmt'];
						
						//echo "<script type='text/javascript'>alert('$vStr');</script>";
						
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				$conn->close();
				
			}  
			
		?>      
	   
          <div class="fixed-header">
            <div class="container">
                <h1> <center>FINAL YEAR PROJECT STATUS-FYPS</center> </h1>
				<h2> <center>FACULTY - UPDATE</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-FACULTY.html'" id = "FACULTY_HOME" >FACULTY_HOME</button>
				<button type="button" onclick= "location.href='index.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>

		  	<br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="EnterFaculty" method="post" > 
			<div class="body-container">
			  <center>
				FACULTY ID	 <Input type="text" name="FacultyId" ><br><br> 
	
				<input type="SUBMIT" name="submit" value="SUBMIT" >
			  <br><br>
			  </center>
			  
			  <br>
			  
			  
				<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="SaveFaculty" method="post" > 
					
					<center>
					<table>
					<tr><td>FACULTY ID</td><td><br> <Input type="text" name="FacultyID" value="<?php if (isset($GLOBALS['vFacultyid'])){ echo $vFacultyid; } ?>" readonly ><br><br></td></tr> 
					<tr><td>FACULTY NAME</td><td><br><Input type="text" name="FacultyName" value="<?php if (isset($GLOBALS['vFacultyName'])){ echo $vFacultyName; }?>" > <br><br> </td></tr> 
					<tr><td>FACULTY ADDR</td><td><br><Input type="text" name="FacultyAddr" value="<?php if (isset($GLOBALS['vFacultyAddr'])) { echo $vFacultyAddr; } ?>"><br><br> </td></tr> 
					<tr><td>FACULTY Contact</td><td><br><Input type="text" name="FacultyContact" value="<?php if (isset($GLOBALS['vFacultyContact'])) { echo $vFacultyContact;} ?>"><br><br></td></tr> 
					<tr><td>FACULTY EMAILID</td><td><br><Input type="text" name="Facultyemailid" value="<?php if (isset($GLOBALS['vFacultyemailid'])) { echo $vFacultyemailid; } ?>"><br><br></td></tr> 
					<tr><td>FACULTY DEPTMT</td><td><br><Input type="text" name="Facultydeptmt" value="<?php if (isset($GLOBALS['vFacultydeptmt'])) { echo $vFacultydeptmt; } ?>" ><br><br></td></tr> 
					
					</table><br>
					<input type="SUBMIT" name="save" value="SAVE" id="UPDATE" >
					<br><br>
					</center>
					
				</form>
			  
			  
			 </div>
			</form>
			<hr>

		  
		  <br>

		  
          <div class="fixed-footer">
              <div class="container"><center>2018 DBIT</center></div>        
          </div>
	
 
	   </body>
</html>
