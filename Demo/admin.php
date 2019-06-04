<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="nitte notes">
	<meta name="author" content="searchit.com">
	<title>notes.com</title>
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 

	
</head>
<body>
	<div class="headline"><h2>WELCOME TO THE ADMIN PAGE</h2>
		<h2 style="text-align: right;font-size: 12px;color: white; margin-right: 10px;"><a style="background: white;" href="register/register.php">Create User Account</a></h2></div>
    

	<!--oddsem-->

    <div id="pcourses">
		<section class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="featured-box"> 
						<div class="text">

							<button type="button" class="btn btn-primary btn-block" onclick="Physics()">Physics</button><br>
                   		  	<button type="button" class="btn btn-primary btn-block" onclick="Electrical()">Electrical</button><br>
                   		  	<button type="button" class="btn btn-primary btn-block" onclick="Mathematics_I()">Math-I</button><br>
                   		  	<button type="button" class="btn btn-primary btn-block" onclick="Mechanics()">Mechanics</button><br>
                   		  	<button type="button" class="btn btn-primary btn-block" onclick="Mechanical()">Mechanical</button><br>
                   		  	<button type="button" class="btn btn-primary btn-block" onclick="cip()">CIP</button><br>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="featured-box"> 
						<div class="text">
						<form name="form1" action="" method="POST" enctype="multipart/form-data">
							<div class="input-group">
								<label>SELECT COURSE:</label>
								<select name="Subjects" style="margin-bottom: 15px;">
									<option value=" ">--SELECT--</option>
									<option value="physics">Physics</option>
									<option value="eme">Mechanical</option>
									<option value="cip">CIP</option>
									<option value="math1">Math-I</option>
									<option value="electrical">Electrical</option>
									<option value="mechanics">Mechanics</option>
								</select>
							</div>
							<input style="background:grey;width: 100%;" type="file" name="f"/></br>
							<strong style="color: grey;">Dscription</strong>
							<input style="width: 100%;" type="text" name="description"/></br></br>

							<button style="width: 100%;height: 50px; background: rgb(0,64,68); color: white;" type="submit"  name="submit1"><strong>UPLOAD</strong></button>
						</form>
						<?php
							
								$filename = isset($_POST['description']) ? $_POST['description'] : '';

							$db = mysqli_connect('localhost', 'root', '', 'documents');
							if (isset($_POST["submit1"])) 
							{
								$Subjects =$_POST['Subjects'];
								$fnm = $_FILES["f"]["name"];
								$dst= "./uploads/".$fnm;
								move_uploaded_file($_FILES["f"]["tmp_name"], $dst);
								$query="INSERT into $Subjects(uploaded_by,name,path)values('$filename','$fnm','$dst')";
								$query=mysqli_query($db,$query);

								if ($query==true) 
								{
									echo "Document uploaded successfully";
									}
								else
								{
									echo " ";
								}
							}
						?>
					</div>
				</div>
			</div>


			<div class="col-md-3" id="display_maths1" style="display: none;">
					<div class="featured-box"> 
						<?php 
						$db=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db ($db,"documents");

						$query = mysqli_query($db,"SELECT * FROM math1 ORDER BY name");
							//echo '<div class = "container">';
							echo '<div class = "table-responsive">';
							echo '<table class = "table">';
							echo '<Thead>';
							echo "<tr>";
					        echo '<th>File Name</th>';
					        echo '<th>Description</th>';
					       	echo '<th>View</th>';
							echo '</tr>';
							echo '</Thead>';
						while($r=mysqli_fetch_array($query)) 
						{
							if ($r["name"]!='' && $r["uploaded_by"]!='') 
							{
								echo "<tr>";
								echo "<td>"; echo $r["name"]; echo "</td>";
								echo "<td>"; echo $r["uploaded_by"]; echo "</td>";
								echo "<td>";
								?>
									 <a href="<?php echo $r["path"];?>">preview</a>
									 <a href="delete_record.php?id=$r['ID'].">delete</a>
								<?php
								echo "</td>";
								echo "</tr>";
							}
						}
						echo "</Table>";
						echo "</div>";
							//echo "</div>";
						 ?>
						</div>

				</div>

				<div class="col-md-3" id="display_mechanics" style="display: none;">
					

					<div class="featured-box"> 
						<?php 
						$db=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db ($db,"documents");

						$query = mysqli_query($db,"SELECT * FROM mechanics ORDER BY name");
							//echo '<div class = "container">';
							echo '<div class = "table-responsive">';
							echo '<table class = "table">';
							echo '<Thead>';
							echo "<tr>";
					        echo '<th>File Name</th>';
					        echo '<th>Description</th>';
					       	echo '<th>View</th>';
							echo '</tr>';
							echo '</Thead>';
						while($r=mysqli_fetch_array($query)) 
						{
							if ($r["name"]!='' && $r["uploaded_by"]!='') 
							{
								echo "<tr>";
								echo "<td>"; echo $r["name"]; echo "</td>";
								echo "<td>"; echo $r["uploaded_by"]; echo "</td>";
								echo "<td>";
								?>
									 <a href="<?php echo $r["path"];?>">preview</a>
									 <a href="<?php echo $r["path"];?>">delete</a>
								<?php
								echo "</td>";
								echo "</tr>";
							}
						}
						echo "</Table>";
						echo "</div>";
							//echo "</div>";
						 ?>
						</div>

				</div>

				<div class="col-md-3" id="display_electrical" style="display: none;">
					

					<div class="featured-box"> 
						<?php 
						$db=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db ($db,"documents");

						$query = mysqli_query($db,"SELECT * FROM electrical ORDER BY name");
							//echo '<div class = "container">';
							echo '<div class = "table-responsive">';
							echo '<table class = "table">';
							echo '<Thead>';
							echo "<tr>";
					        echo '<th>File Name</th>';
					        echo '<th>Description</th>';
					       	echo '<th>View</th>';
							echo '</tr>';
							echo '</Thead>';
						while($r=mysqli_fetch_array($query)) 
						{
							if ($r["name"]!='' && $r["uploaded_by"]!='') 
							{
								echo "<tr>";
								echo "<td>"; echo $r["name"]; echo "</td>";
								echo "<td>"; echo $r["uploaded_by"]; echo "</td>";
								echo "<td>";
								?>
									 <a href="<?php echo $r["path"];?>">preview</a>
									 <a href="<?php echo $r["path"];?>">delete</a>
								<?php
								echo "</td>";
								echo "</tr>";
							}
						}
						echo "</Table>";
						echo "</div>";
							//echo "</div>";
						 ?>
						</div>

				</div>
				<div class="col-md-3" id="display_cip" style="display: none;">
					

					<div class="featured-box"> 
						<?php 
						$db=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db ($db,"documents");

						$query = mysqli_query($db,"SELECT * FROM cip ORDER BY name");
							//echo '<div class = "container">';
							echo '<div class = "table-responsive">';
							echo '<table class = "table">';
							echo '<Thead>';
							echo "<tr>";
					        echo '<th>File Name</th>';
					        echo '<th>Description</th>';
					       	echo '<th>View</th>';
							echo '</tr>';
							echo '</Thead>';
						while($r=mysqli_fetch_array($query)) 
						{
							if ($r["name"]!='' && $r["uploaded_by"]!='') 
							{
								echo "<tr>";
								echo "<td>"; echo $r["name"]; echo "</td>";
								echo "<td>"; echo $r["uploaded_by"]; echo "</td>";
								echo "<td>";
								?>
									 <a href="<?php echo $r["path"];?>">preview</a>
									 <a href="<?php echo $r["path"];?>">delete</a>
								<?php
								echo "</td>";
								echo "</tr>";
							}
						}
						echo "</Table>";
						echo "</div>";
							//echo "</div>";
						 ?>
						</div>

				</div>
				<div class="col-md-3" id="display_mechanical" style="display: none;">
					

					<div class="featured-box"> 
						<?php 
						$db=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db ($db,"documents");

						$query = mysqli_query($db,"SELECT * FROM eme ORDER BY name");
							//echo '<div class = "container">';
							echo '<div class = "table-responsive">';
							echo '<table class = "table">';
							echo '<Thead>';
							echo "<tr>";
					        echo '<th>File Name</th>';
					        echo '<th>Description</th>';
					       	echo '<th>View</th>';
							echo '</tr>';
							echo '</Thead>';
						while($r=mysqli_fetch_array($query)) 
						{
							if ($r["name"]!='' && $r["uploaded_by"]!='') 
							{
								echo "<tr>";
								echo "<td>"; echo $r["name"]; echo "</td>";
								echo "<td>"; echo $r["uploaded_by"]; echo "</td>";
								echo "<td>";
								?>
									 <a href="<?php echo $r["path"];?>">preview</a>
									 <a href="<?php echo $r["path"];?>">delete</a>
								<?php
								echo "</td>";
								echo "</tr>";
							}
						}
						echo "</Table>";
						echo "</div>";
							//echo "</div>";
						 ?>
						</div>

				</div>
				<div class="col-md-3" id="display_physics">
					

					<div class="featured-box"> 
						<?php 
						$db=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db ($db,"documents");

						$query = mysqli_query($db,"SELECT * FROM physics ORDER BY name");
							//echo '<div class = "container">';
							echo '<div class = "table-responsive">';
							echo '<table class = "table">';
							echo '<Thead>';
							echo "<tr>";
					        echo '<th>File Name</th>';
					        echo '<th>Description</th>';
					       	echo '<th>View</th>';
							echo '</tr>';
							echo '</Thead>';
						while($r=mysqli_fetch_array($query)) 
						{
							if ($r["name"]!='' && $r["uploaded_by"]!='' && $r["ID_No"]!='') 
							{
								echo "<tr>";
								echo "<td>"; echo $r["name"]; echo "</td>";
								echo "<td>"; echo $r["uploaded_by"]; echo "</td>";
								echo "<td>";
								?>
									 <a href="<?php echo $r["path"];?>">preview</a>
									 <a href="delete_record.php?del=$r['ID_No']">delete</a>
								<?php
								echo "</td>";
								echo "</tr>";
							}
						}
						echo "</Table>";
						echo "</div>";
							//echo "</div>";
						 ?>
						</div>

				</div>
				
			</div>
			
			</div>

		</section>
	</div>
	
	</div>
	
  </div>
</div>
		<footer>	
		
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="#">Home</a> | 
								<a href="#">About</a> |
								<a href="#">Contact</a>
								| <a href="#">Logout</a>
							</p>
						</div>
					</div>

					

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2019. Developed by Petrichor Technologies</a>
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<!--javascript code for pcycle-->
	<script>
function Physics() {
    var x = document.getElementById("display_physics");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById("display_cip").style.display = "none";
        document.getElementById("display_mechanical").style.display = "none";
        document.getElementById("display_mechanics").style.display = "none";
        document.getElementById("display_electrical").style.display = "none";
        document.getElementById("display_maths1").style.display = "none";
    } else {
        x.style.display = "none";
    }
}


function Mathematics_I() {
    var x = document.getElementById("display_maths1");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById("display_cip").style.display = "none";
        document.getElementById("display_mechanical").style.display = "none";
        document.getElementById("display_mechanics").style.display = "none";
        document.getElementById("display_electrical").style.display = "none";
        document.getElementById("display_physics").style.display = "none";
    } else {
        x.style.display = "none";
    }
}

function Mechanics() {
    var x = document.getElementById("display_mechanics");
    if (x.style.display === "none") {
        x.style.display = "block";
       document.getElementById("display_cip").style.display = "none";
        document.getElementById("display_mechanical").style.display = "none";
        document.getElementById("display_physics").style.display = "none";
        document.getElementById("display_electrical").style.display = "none";
        document.getElementById("display_maths1").style.display = "none";
    } else {
        x.style.display = "none";
    }
}

function Mechanical() {
    var x = document.getElementById("display_mechanical");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById("display_cip").style.display = "none";
        document.getElementById("display_physics").style.display = "none";
        document.getElementById("display_mechanics").style.display = "none";
        document.getElementById("display_electrical").style.display = "none";
        document.getElementById("display_maths1").style.display = "none";
    } else {
        x.style.display = "none";
    }
}

function cip() {
    var x = document.getElementById("display_cip");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById("display_physics").style.display = "none";
        document.getElementById("display_mechanical").style.display = "none";
        document.getElementById("display_mechanics").style.display = "none";
        document.getElementById("display_electrical").style.display = "none";
        document.getElementById("display_maths1").style.display = "none";
    } else {
        x.style.display = "none";
    }
}

function Electrical() {
    var x = document.getElementById("display_electrical");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById("display_cip").style.display = "none";
        document.getElementById("display_mechanical").style.display = "none";
        document.getElementById("display_mechanics").style.display = "none";
        document.getElementById("display_physics").style.display = "none";
        document.getElementById("display_maths1").style.display = "none";
    } else {
        x.style.display = "none";
    }
}
			//javascript code end for pcycle



			

function oddsem() {
	var x = document.getElementById("pcourses");
	if(x.style.display === "none") {
		x.style.display = "block";
		document.getElementById("ccourses").style.display = "none";
	}
}


function login_function() {
    confirm("sorry !!! to access other department,please select respective department during registration");

} 
</script>
</body>
</html>
