<!DOCTYPE html>
   <html lang="en-US">
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS CREATE FACULTY</title> 
	   </head>
       <body>
	    <body background="w7.jpg" >
	   
		<?php
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
				$vFacultyid = $_POST["FacultyId"];
				$vFacultyName = $_POST["FacultyName"];
				$vFacultyPswd = $_POST["FacultyPswd"];
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
				
				$sql = "insert into fyps_faculty ";
				$sql = $sql . " ( fyps_faculty_id, fyps_faculty_name, fyps_faculty_address, fyps_faculty_contact, ";
				$sql = $sql . "   fyps_faculty_emailid, fyps_faculty_department) values ";
				$sql = $sql . " ( " . '"'.$vFacultyid.'"'.','.'"'.$vFacultyName.'"'.','.'"'.$vFacultyAddr.'"'.',';
				$sql = $sql . '"'.$vFacultyContact.'"'.','.'"'.$vFacultyemailid.'"'.','.'"'.$vFacultydeptmt.'"'.')';
				
				//echo "<script type='text/javascript'>alert('$sql');</script>";
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						echo "<script type='text/javascript'>alert('faculty Saved Successfully...');</script>";
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				
				$FacultyRole = "faculty" ;
				
				
				$sql = "insert into fyps_user ";
				$sql = $sql . " ( fyps_user_id, fyps_user_name, fyps_user_role, fyps_password) values ";
				$sql = $sql . " ( " . '"'.$vFacultyid.'"'.','.'"'.$vFacultyName.'"'.','.'"'.$FacultyRole.'"'.',';
				$sql = $sql . '"'.$vFacultyPswd.'"'.')';
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						//echo "<script type='text/javascript'>alert('user Saved Successfully...');</script>";
				}
				else
				{
						//echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				
				$conn->close();
				
			}   
		?>      
	           
	   
	   
          <div class="fixed-header">
            <div class="container">
                <h1> <center>FINAL YEAR PROJECT STATUS-FYPS</center> </h1>
				<h2> <center>FACULTY - CREATE</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-FACULTY.html'" id = "FACULTY_HOME" >FACULTY_HOME</button>
				<button type="button" onclick= "location.href='index.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>  
	    
		  <br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="SaveFaculty" method="post" > 
			  <div class="body-container">
			  <center>
			  
			  <table>
				<tr><td>FACULTY ID</td><td><br> <Input type="text" name="FacultyId" required ><br><br></td></tr> 
				<tr><td>FACULTY NAME</td> <td><br><Input type="text" name="FacultyName" ><br><br></td></tr> 
				<tr><td>FACULTY ADDR</td> <td><br><Input type="text" name="FacultyAddr"  ><br><br></td></tr> 
				<tr><td>FACULTY PASSWORD</td><td><br> <Input type="password" name="FacultyPswd"  ><br><br></td></tr> 					
				<tr><td>FACULTY CONTACT</td><td><br> <Input type="text" name="FacultyContact" ><br><br></td></tr> 
				<tr><td>FACULTY EMAILID</td><td><br> <Input type="text" name="Facultyemailid" ><br><br></td></tr> 
				<tr><td>FACULTY DEPTMT</td><td><br> <Input type="text" name="Facultydeptmt" ><br><br></td></tr> 
				<br>
				</table>
				<br>
				<input type="submit" name="save" value="SAVE" >
			  <br><br>
			 
			  </center>
			  </div>
			</form>
		  
          <div class="fixed-footer">
              <div class="container"><center>2018 DBIT</center></div>        
          </div>
	
 
	   </body>
</html>
