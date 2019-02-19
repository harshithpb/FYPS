<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS DELETE PROJECT</title> 
	   </head>
       <body>
	   
		<?php

			if(isset($_POST['submit'])) {
				Get_Project();
			}
		
			if(isset($_POST['delete'])) {
				Delete_Project();
			}
			
			function Delete_Project()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vProjectId = $_POST["ProjectID"];
				$vProjectTitle = $_POST["ProjectTitle"];
				$vProjectDomain = $_POST["ProjectDomain"];
				$vProjectDepartment = $_POST["ProjectDeptmt"];
				

				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				//echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "delete from fyps_project";
				//$sql = $sql . " fyps_project_title = ".'"'.$vProjectTitle.'"'.", fyps_project_domain = ".'"'.$vProjectDomain.'"';
				//$sql = $sql . " ,fyps_project_department = ".'"'.$vProjectDepartment.'"';
				$sql = $sql . " where fyps_project_id = ".'"'.$vProjectId.'"';
				
				echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						echo "<script type='text/javascript'>alert(' FYPS_PROJECT...Deleted Successfully...');</script>";
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				$sql = "delete from fyps_user ";
				//$sql = $sql . " fyps_faculty_name = ".'"'.$vFacultyName.'"'.", fyps_faculty_address = ".'"'.$vFacultyAddr.'"';
				//$sql = $sql . " ,fyps_faculty_contact = ".'"'.$vFacultyContact.'"'." ,fyps_faculty_emailid = ".'"'.$vFacultyemailid.'"';
			//	$sql = $sql . " ,fyps_faculty_department = ".'"'.$vFacultydeptmt.'"';
				$sql = $sql . " where fyps_user_id = ".'"'.$vProjectId.'"';
				
								// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						echo "<script type='text/javascript'>alert(' FYPS_FACULTY...Deleted Successfully...');</script>";
				}
				else
				{
						echo "<script type='text/javascript'>alert('$sql');</script>";
				}
				
				$conn->close();
				
			}   
			
			function Get_Project()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vProjectID = $_POST["ProjectId"];
				$GLOBALS['vProjectid'] = $vProjectID;

				//echo "<script type='text/javascript'>alert('$vProjectID');</script>";
				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				//echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "  select  fyps_project_id, fyps_project_title, fyps_project_domain,  ";
				$sql = $sql . "  fyps_project_department  from fyps_project where fyps_project_id =  ";
				$sql = $sql . '"'.$vProjectID.'"';
								
				echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0)
				{
						//echo "<script type='text/javascript'>alert(' FYPS_PROJECT...Read Successfully...');</script>";
						$row = $result->fetch_assoc();
						
						
						$GLOBALS['vProjectTitle'] = $row["fyps_project_title"];
						
						$GLOBALS['vProjectDomain'] = $row["fyps_project_domain"];
		
						$GLOBALS['vProjectdeptmt'] = $row["fyps_project_department"];
						
						$vStr = $GLOBALS['vProjectTitle'].",".$GLOBALS['vProjectDomain'].",".$GLOBALS['vProjectdeptmt'];
						
						echo "<script type='text/javascript'>alert('$vStr');</script>";
						
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
				<h2> <center>PROJECT - DELETE</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-PROJECT.html'" id = "PROJECT_HOME" >PROJECT_HOME</button>
				<button type="button" onclick= "location.href='FYPS-INDEX-LOGIN.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>

		  	<br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="DeleteProjectPHPMissing" method="post" > 
			<div class="body-container">
			  <center>
				PROJECT ID	: <Input type="text" name="ProjectId" ><br><br> 
	
				<input type="submit" name="submit" value="submit" >
			  <br><br>
			  </center>
			  
			  <hr>
			  
			  
				<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="DeleteProjectMissing" method="post" > 
					
					<center>
					PROJECT ID	: <Input type="text" name="ProjectID" value="<?php if (isset($GLOBALS['vProjectid'])){ echo $vProjectid; } ?>" readonly ><br><br> 
					PROJECT Title: <Input type="text" name="ProjectTitle" value="<?php if (isset($GLOBALS['vProjectTitle'])){ echo $vProjectTitle; }?>" readonly> <br><br> 
					PROJECT Domain: <Input type="text" name="ProjectDomain" value="<?php if (isset($GLOBALS['vProjectDomain'])) { echo $vProjectDomain; } ?>" readonly><br><br> 
					PROJECT Deptmt: <Input type="text" name="ProjectDeptmt" value="<?php if (isset($GLOBALS['vProjectdeptmt'])) { echo $vProjectdeptmt;} ?>" readonly><br><br>
					
					<hr>
					<input type="submit" name="delete" value="delete" id="delete" >
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
