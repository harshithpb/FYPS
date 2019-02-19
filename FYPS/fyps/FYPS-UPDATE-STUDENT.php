<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS UPDATE STUDENT</title> 
	   </head>
       <body>
	   
		<?php

			if(isset($_POST['submit'])) {
				Get_Student();
			}
		
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
				
				$vStudentId = $_POST["StudentID"];
				$vStudentName = $_POST["StudentName"];
				//$vStudentLastName = $_POST["StudentLastName"];
				//$vStudentAge = $_post["StudentAge"];
                //$vStudentPswd = $_POST["StudentPswd"];
				//$vStudentProjectTitle = $_POST["StudentProjectTitle"];
				$vStudentAddr = $_POST["StudentAddr"];
				$vStudentContact = $_POST["StudentContact"];
				$vStudentemailid = $_POST["Studentemailid"];
			//	$vStudentDepartment= $_POST["StudentDepartment"];

				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				//echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "update fyps_student set ";
				$sql = $sql . " fyps_student_name = ".'"'.$vStudentName.'"';
				$sql = $sql . ", fyps_student_address = ".'"'.$vStudentAddr.'"'.", fyps_student_contact = ".'"'.$vStudentContact.'"'." ,fyps_student_emailid = ".'"'.$vstudentemailid.'"';
				//$sql = $sql . " ,fyps_student_department = ".'"'.$vStudentDepartment.'"';
				$sql = $sql . " where fyps_student_id = ".'"'.$vStudentId.'"';
				
				//echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						echo "<script type='text/javascript'>alert(' FYPS_Student...Updated Successfully...');</script>";
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				$conn->close();
				
			}   
			
			function Get_Student()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vStudentID = $_POST["StudentId"];
				$GLOBALS['vStudentId'] = $vStudentID;

				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				//echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "  select  fyps_student_name, fyps_student_address,  ";
				$sql = $sql . "  fyps_student_contact, fyps_student_emailid from fyps_student where fyps_student_id =  ";
						$sql = $sql . '"'.$vStudentID.'"';
								
				echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0)
				{
						//echo "<script type='text/javascript'>alert(' FYPS_FACULTY...Read Successfully...');</script>";
						$row = $result->fetch_assoc();
						
						
			
				$GLOBALS['vStudentName'] = $row["fyps_student_name"];
				//$GLOBALS['vStudentLastName'] = $row["fyps_student_last_name"];
				//$GLOBALS['vStudentAge'] = $row["fyps_student_age"];
				//$GLOBALS['vStudentProjectTitle'] = $row["fyps_project_title"];
				$GLOBALS['vStudentAddr']= $row["fyps_student_address"];
				$GLOBALS['vStudentContact'] = $row["fyps_student_contact"];
				$GLOBALS['vStudentemailid']= $row["fyps_student_emailid"];
				//$GLOBALS['vStudentDepartment']= $row["fyps_student_department"];
						
						
						
						
						
						$vStr = $GLOBALS['vStudentName'].",".$GLOBALS['vStudentAddr'];
						
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
                <h1> <center>FYPS - FINAL YEAR PROJECT STATUS</center> </h1>
				<h2> <center>STUDENT - UPDATE</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-STUDENT.html'" id = "STUDENT_HOME" >STUDENT_HOME</button>
				<button type="button" onclick= "location.href='FYPS-INDEX-LOGIN.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>

		  	<br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="EnterStudent" method="post" > 
			<div class="body-container">
			  <center>
		   Student Id 	: <Input type="text" name="StudentId" ><br><br> 
	
				<input type="submit" name="submit" value="submit" >
			  <br><br>
			  </center>
			  
			  <hr>
			  
			  
				<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="SaveStudent" method="post" > 
					
					<center>
					
				
				student Id	: <Input type="text" name="StudentID" value="<?php if (isset($GLOBALS['vStudentId'])){ echo $vStudentId; } ?>" ><br><br> 
				Student Name: <Input type="text" name="StudentName" value="<?php if (isset($GLOBALS['vStudentName'])){ echo $vStudentName; } ?>"><br><br> 
			<!--	Student Last Name: <Input type="text" name="StudentLastName" value="<?php if (isset($GLOBALS['vStudentLastName'])){ echo $vStudentLastName; } ?>" ><br><br> 
Student Password: <Input type="text" name="StudentPswd" value="<?php if (isset($GLOBALS['vStudentPswd'])){ echo $vStudentPswd; } ?>" ><br><br> 
				Student Age: <Input type="text" name="StudentAge" value="<?php if (isset($GLOBALS['vStudentAge'])){ echo $vStudentAge; } ?>" ><br><br> 
				Student Project Title: <Input type="text" name="StudentProjectTitle"  value="<?php if (isset($GLOBALS['vStudentProjectTitle'])){ echo $vStudentProjectTitle; } ?>"><br><br> -->
				Student Addr: <Input type="text" name="StudentAddr"  value="<?php if (isset($GLOBALS['vStudentAddr'])){ echo $vStudentAddr; } ?>" ><br><br> 
				Student Contact: <Input type="text" name="StudentContact" value="<?php if (isset($GLOBALS['vStudentContact'])){ echo $vStudentContact; } ?>"><br><br> 
				Student emailid: <Input type="text" name="Studentemailid" value="<?php if (isset($GLOBALS['vStudentemailid'])){ echo $vStudentemailid; } ?>" ><br><br> 
		<!--		Student Deptmt: <Input type="text" name="Studentdeptmt" value="<?php if (isset($GLOBALS['vStudentDepartment'])){ echo $vStudentDepartment; } ?>" ><br><br> -->
				
					<input type="submit" name="save" value="save" id="update" >
					<br><br>
					</center>
					
				
				</form>
			  
			  
			 </div>
			</form>
			<hr>

		  
		  <br>

		  
          <div class="fixed-footer">
              <div class="container">Copyright &copy; 2018 36c</div>        
          </div>
	
 
	   </body>
</html>
