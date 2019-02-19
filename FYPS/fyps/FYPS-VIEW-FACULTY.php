<!DOCTYPE html>
   <html lang="en-US>
       <head>
	    <!-- below line external style sheet  --> 
          <link rel="stylesheet" href="FYPS-STYLE-1.css">
		  <title>FYPS VIEW FACULTY</title> 
	   </head>
       <body>
	   
	   
	   
	   
	    <div class="fixed-header">
            <div class="container">
                <h1> <center>FYPS - FINAL YEAR PROJECT STATUS</center> </h1>
				<h2> <center>FACULTY - VIEW</center> </h2>
				<button type="button" onclick= "location.href='FYPS-ADMIN.html'" id = "ADMIN_HOME" >HOME</button>
				<button type="button" onclick= "location.href='FYPS-FACULTY.html'" id = "FACULTY_HOME" >FACULTY_HOME</button>
				<button type="button" onclick= "location.href='FYPS-INDEX-LOGIN.html'" id = "LOGOUT" >LOGOUT</button>
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
				echo "connected successfully". "<br>";
				
				
				   
	   
         
				//CONSTRUCT SQL QUERY
		
				$sql = "select fyps_faculty_id, fyps_faculty_name, fyps_faculty_address, fyps_faculty_contact, fyps_faculty_emailid, fyps_faculty_department from fyps_faculty "; 
		
			//echo $sql;
												
				echo "<script type='text/javascript'>alert('$sql');</script>";
				
		//execute sql query
		$result = mysqli_query($conn, $sql);
		
		//check query result
		if (mysqli_num_rows($result) > 0)
		{
	
			//output data of each row
	
	         echo "<table>
			 <tr>
			 
					  <th>FACULTY_ID</th>
			          <th>FACULTY_NAME</th>
				      <th>FACULTY_ADDRESS</th>
					  <th>FACULTY_CONTACT</th>
					  <th>FACULTY_EMAILID</th>
					  <th>FACULTY_DEPARTMENT</th>
		     </tr>";
	           while($row = mysqli_fetch_assoc($result))
		    {
		echo "<tr>
			   <td>".$row["fyps_faculty_id"]."</td>
			    <td>".$row["fyps_faculty_name"]."</td>
				 <td>".$row["fyps_faculty_address"]."</td>
				 <td>".$row["fyps_faculty_contact"]."</td>
			    <td>".$row["fyps_faculty_emailid"]."</td>
				 <td>".$row["fyps_faculty_department"]."</td>
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
              <div class="container">Copyright &copy; 2018 36c</div>        
          </div>
	
 
	   </body>
</html>
