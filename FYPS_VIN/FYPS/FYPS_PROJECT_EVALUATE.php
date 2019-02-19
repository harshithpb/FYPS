<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS EVALUATE PROJECT</title> 
	   </head>
       <body>
	    <body background="w6.jpg">
		<?php

			if(isset($_POST['submit'])) {
				Get_Project();
			}
		
			if(isset($_POST['save'])) {
				Save_Project();
			}
			
			function Save_Project()
			{
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				// below variables are for input data to be inserted
				$vProjectId = $_POST["ProjectID"];
				$vGrade = $_POST["grade"];
				
				// Create connection
				$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
		
				if ($conn->connect_error) {
					//die("Connection failed: " . $conn->connect_error);
					echo "<script type='text/javascript'>alert('connection Error');</script>";
				} 

				//echo "<script type='text/javascript'>alert('connection Successful..');</script>";
				
				$sql = "update fyps_project set";
				$sql = $sql . " fyps_project_status = ".'"'.$vGrade.'"';
				$sql = $sql . " where fyps_project_id = ".'"'.$vProjectId.'"';
				
				//echo "<script type='text/javascript'>alert('$sql');</script>";
				
				// execute SQL query 
				$result = $conn->query($sql);
				
				if ($result === TRUE)
				{
						echo "<script type='text/javascript'>alert('PROJECT EVALUATED...Updated Successfully...');</script>";
				}
				else
				{
						//echo "<script type='text/javascript'>alert('$sql');</script>";
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
								
				//echo "<script type='text/javascript'>alert('$sql');</script>";
				
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
						
						//echo "<script type='text/javascript'>alert('$vStr');</script>";
						
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
				<h2> <center>PROJECT - UPDATE</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-PROJECT.html'" id = "PROJECT_HOME" >PROJECT_HOME</button>
				<button type="button" onclick= "location.href='index.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>

		  	<br>
			<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="UpdateProjectPHPMissing" method="post" > 
			<div class="body-container">
			  <center>
				PROJECT ID	: <Input type="text" name="ProjectId" ><br><br> 
	
				<input type="SUBMIT" name="SUBMIT" value="SUBMIT" >
			  <br><br>
			  </center>
			  
			</form>
			  
			  
			  
				<form action="<?=$_SERVER['PHP_SELF'];?>" alt ="SaveProject" method="post" > 
					
					<center><table>
					<tr><td>PROJECT ID</td><td><br><Input type="text" name="ProjectID" value="<?php if (isset($GLOBALS['vProjectid'])){ echo $vProjectid; } ?>" readonly ><br><br></td></tr>
					<tr><td>PROJECT TITLE</td><td><br><Input type="text" name="ProjectTitle" value="<?php if (isset($GLOBALS['vProjectTitle'])){ echo $vProjectTitle; }?>" readonly> <br><br></td></tr>
					<tr><td>PROJECT DOMAIN</td><td><br><Input type="text" name="ProjectDomain" value="<?php if (isset($GLOBALS['vProjectDomain'])) { echo $vProjectDomain; } ?>" readonly><br><br></td></tr>
					<tr><td>PROJECT DEPTMT</td><td><br><Input type="text" name="ProjectDeptmt" value="<?php if (isset($GLOBALS['vProjectdeptmt'])) { echo $vProjectdeptmt;} ?>" readonly><br><br></td></tr>
					<hr><br><br></table>
					<hr>
					<br>
					PROJECT GRADE: <select id="input_15" name="grade" style="width:80px" type="dropdown" required="">
            <option value="">  </option>
            <option value="A+"> A+ </option>
            <option value="A"> A </option>
            <option value="B+"> B+ </option>
            <option value="B"> B </option>
            <option value="C"> C </option>
          </select>
					<br><br>  
					<input type="submit" name="save" value="save" id="update">
					<br><br>
					</center>
					</form>
		  <br>
			</div>
		  
          <div class="fixed-footer">
              <div class="container">2018 DBIT</div>        
          </div>
	
 
	   </body>
</html>
