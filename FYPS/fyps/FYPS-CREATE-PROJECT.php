<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS CREATE PROJECT</title> 
	   </head>
       <body>
	   
		<?php
			if(isset($_POST['save'])) {
				Save_PROJECT();
			}
			
			function Save_PROJECT()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vProjectTitle = $_POST["ProjectTitle"];
				$vProjectId = $_POST["ProjectId"];
				$vProjectDomain = $_POST["ProjectDomain"];
				$vDeptmt = $_POST["Deptmt"];
				
				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "insert into fyps_project ";
				$sql = $sql . " ( fyps_project_title, fyps_project_id, fyps_project_domain, fyps_project_department) values";
				
				$sql = $sql . " ( " . '"'.$vProjectTitle.'"'.','.'"'.$vProjectId.'"'.','.'"'.$vProjectDomain.'"'.',';
				$sql = $sql . '"'.$vDeptmt.'"'.')';
								
				
				
				
				
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result == TRUE)
				{
						echo "<script type='text/javascript'>alert('Project Saved Successfully...');</script>";
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
				<h2> <center>PROJECT - CREATE</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-PROJECT.html'" id = "PROJECT_HOME" >PROJECT_HOME</button>
				<button type="button" onclick= "location.href='FYPS-INDEX-LOGIN.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>
	    
		  <br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="SaveProject" method="post" > 
			  <div class="body-container">
			  <center>
			  
				PROJECT  Title: <Input type="text" name="ProjectTitle" required ><br><br> 
				PROJECT  Id: <Input type="text" name="ProjectId" ><br><br> 
				PROJECT Domain: <Input type="text" name="ProjectDomain"  ><br><br>
				PROJECT Deptmt: <Input type="text" name="Deptmt"  ><br><br>					
				
			
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
