<?php
//connect to the database
$db=mysqli_connect ("localhost", "root", "") or die (' cannot connect to the database: ' . mysqli_error()); 
	
	//select database
	mysqli_select_db ($db,"documents");

	//Execute query
	if (isset($_GET['del'])) 
	{
		$del_id=$_GET['del'];

		if (mysql_query(" DELETE FROM physics WHERE ID_No= '$del_id'")) 
		{
			# code...
			echo "Selected document deleted successfully";

			header("refresh:1;url=admin.php");
		}
		else
			echo "Error Occured";
	}
		
		
	
	else
		echo "Error"; 

?>