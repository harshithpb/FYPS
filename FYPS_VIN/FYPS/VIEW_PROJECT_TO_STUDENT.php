<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>VIEW PROJECT_TO_STUDENT</title> 
	   </head>
       <body>
	   
	   
	    <body background="w7.jpg">
	   
	    <div class="fixed-header">
            <div class="container">
                <h1> <center>FYPS - FINAL YEAR PROJECT STATUS</center> </h1>
				<h2> <center>VIEW PROJECT_TO_STUDENT</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-ASSIGNMENT.html'" id = "ASSIGNMENT_HOME" >ASSIGNMENT_HOME</button>
				<button type="button" onclick= "location.href='index.html'" id = "LOGOUT" >LOGOUT</button>
           </div>
          </div>
	    
		  <br>
			
			  <div class="body-container">
			  
			  
		<?php
			
				// below variables are for database connectivity
				$dbservername = "127.0.0.1";
				$dbusername = "fyps";
				$dbpassword = "fyps123$";
				$dbname = "fyps";
				$success = "0";			
				
				//create connection
			$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
			
			//check connecttion
			if (!$conn)
				
				{
					die("connection failed: " . mysqli_connect_error());
					
				}
				//echo "connected successfully". "<br>";
				
				
				   
	   
         
				//CONSTRUCT SQL QUERY
		
				$sql = "select student_id,project_id,project_name from fyps_project_student";
			//echo $sql;
												
				//echo "<script type='text/javascript'>alert('$sql');</script>";
				
		//execute sql query
		$result = mysqli_query($conn, $sql);
		
		//check query result
		if (mysqli_num_rows($result) > 0)
		{
	
			//output data of each row
	
	         echo "<table>
			 <tr>
			 
					  <th>Student_id</th>
			          <th>Project_id</th>
				      <th>project_name</th>
		     </tr>";
	           while($row = mysqli_fetch_assoc($result))
		    {
		echo "<tr>
			   <td>".$row["student_id"]."</td>
			    <td>".$row["project_id"]."</td>
				<td>".$row["project_name"]."</td>
				 
		     </tr>";
			}    
			echo " </table>";	
		}
else
{
	echo "0 results";
	
	
}	

	//close connection

mysqli_close($conn);	
		   ?> 

			  <br><br>
			 
			  </div>
			</form>
		  
          <div class="fixed-footer">
              <div class="container"><center>2018 DBIT</center></div>        
          </div>
	
 
	   </body>
</html>
