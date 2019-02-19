<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS CREATE Student</title> 
	   </head>
       <body>
	   
		<?php
			if(isset($_POST['save'])) {
				Save_Student();
			}
			
			function Save_Student()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted

				$vStudentId = $_POST["StudentId"];
				$vStudentName = $_POST["StudentName"];

				$vStudentPswd = $_POST["StudentPswd"];

				$vStudentAddr = $_POST["StudentAddr"];
				$vStudentContact = $_POST["StudentContact"];
				$vStudentemailid = $_POST["Studentemailid"];
				
				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				
				$sql = "insert into fyps_student "; 
				$sql = $sql . " ( fyps_student_id, fyps_student_name, fyps_student_address, fyps_student_contact, fyps_student_emailid)";
				$sql = $sql . "  values "; 
				$sql = $sql . " ( " . '"'.$vStudentId.'"'.','.'"'.$vStudentName.'"'.',';
				$sql = $sql . '"'.$vStudentAddr.'"'.','.'"'.$vStudentContact.'"'.','.'"'.$vStudentemailid.'"'.')';
								
				echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result == TRUE)
				{
						echo "<script type='text/javascript'>alert('Student Saved Successfully...');</script>";
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				
				$StudentRole = "student" ;
				
				
				$sql = "insert into fyps_user ";
				$sql = $sql . " ( fyps_user_id, fyps_user_name, fyps_user_role, fyps_password) values ";
				$sql = $sql . " ( " . '"'.$vStudentId.'"'.','.'"'.$vStudentName.'"'.','.'"'.$StudentRole.'"'.',';
				$sql = $sql . '"'.$vStudentPswd.'"'.')';
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result == TRUE)
				{
						echo "<script type='text/javascript'>alert('User Saved Successfully...');</script>";
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
                <h1> <center>FYPS - FINAL YEAR PROJECT STATUS</center> </h1>
				<h2> <center>Student - CREATE</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-STUDENT.html'" id = "STUDENT_HOME" >STUDENT_HOME</button>
				<button type="button" onclick= "location.href='FYPS-INDEX-LOGIN.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>
	    
		  <br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="SaveStudent" method="post" > 
			  <div class="body-container">
			  <center>
			  
				Student ID	: <Input type="text" name="StudentId" required ><br><br> 
				Student Name: <Input type="text" name="StudentName" ><br><br> 
				<!--Student Last Name: <Input type="text" name="StudentLastName" ><br><br> -->
				Student Password: <Input type="password" name="StudentPswd"  ><br><br>
				<!--Student Age: <Input type="text" name="StudentAge"  ><br><br> 
				Student Project Title: <Input type="text" name="StudentProjectTitle"  ><br><br> -->
				Student Addr: <Input type="text" name="StudentAddr"  ><br><br>
				Student Contact: <Input type="text" name="StudentContact" ><br><br>
				Student emailid: <Input type="text" name="Studentemailid" ><br><br>
				<!--Student Deptmt: <Input type="text" name="Studentdeptmt" ><br><br> -->
				
				<hr>
				<input type="submit" name="save" value="save" >
			  <br><br>
			  </center>
			  </div>
			</form>
		  
          <div class="fixed-footer">
              <div class="container">Copyright &copy; 2018 36c</div>        
          </div>
	
 
	   </body>
</html>
