<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS FACULTY AND PROJECT ASSIGNMENT</title> 
	   </head>
       <body>
	   
		<?php
			if(isset($_POST['save'])) {
				Save_Faculty_Project();
			}
			
			function Save_Faculty_Project()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vFacultyid = $_POST["FacultyId"];
				$vProjectid = $_POST["ProjectId"];
			
				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 
  
				echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "insert into fyps_Faculty_Project ";
				$sql = $sql . " ( fyps_rel_faculty_id, fyps_rel_project_id) values ";
				$sql = $sql . " ( " . '"'.$vFacultyid.'"'.','.'"'.$vProjectid.'"'.')';
											
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result == TRUE)
				{
						echo "<script type='text/javascript'>alert('Faculty and Project Saved Successfully...');</script>";
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
				<h2> <center>FACULTY AND PROJECT ASSIGNMENT</center> </h2>
				<button type="button"  onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button"  onclick= "location.href='FYPS-ASSIGNMENT.html" id = "ASSIGNMENT_HOME" >ASSIGNMENT_HOME</button>
				<button type="button" style="position: absolute; right: 20; padding:0px 0px 0px 200px;" 
				onclick= "location.href='FYPS-INDEX-LOGIN.html'" id = "LOGOUT" >LOGOUT</button>
				
           </div>
          </div>
	    
		  <br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="SaveFacultyProject" method="post" > 
			  <div class="body-container">
			  <center>
			  
				FACULTY ID	: <Input type="text" name="FacultyId" required ><br><br> 
				PROJECT ID: <Input type="text" name="ProjectId" required><br><br>
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


