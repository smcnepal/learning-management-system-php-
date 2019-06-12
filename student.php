<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="nitte notes">
	<meta name="author" content="searchit.com">
	<title> ChipEdge Notes</title>
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<!-- <link rel="stylesheet" href="./assets/css/style.css" type='text/css'> -->
	<link rel="stylesheet" href="style.css" type='text/css'>


	<link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	

</head>


<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#"><img src="assets/images/logo.png"/ height= 50px;></a>
		</div>
		<ul class="nav navbar-nav navbar-right">
     	 	<li><a href="register/login.php">logout</a></li>
    	</ul>
	</div>
	</nav>

	<div class="sidebar">
		<a class="active" href="admin.php">Home</a>
		<!-- <a href="register/register.php">Create User Account</a> -->
		<div id="dropdown">
        <button class="dropdown-btn">Courses 
			<i class="fa fa-caret-down"></i>
		</button>
		<?php
            $courseId= "";
            $db=mysqli_connect("localhost", "root", "") or die('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db($db, "lms_projectdb");

            $query = mysqli_query($db, "SELECT id,name FROM course");
            while ($r=mysqli_fetch_array($query)) {
                if ($r["name"]!='') {
                    echo '<button class="btn btn-default tabs" onclick="';
                    echo 'courseFun(';
                    echo $r["id"];
                    echo ')">';
                    echo $r["name"];
                    echo "</button>";
                }
            }
        ?>	
		</div>
	</div>
			

	<div class="content">
		<div id="pcourses">
			<section class="container" style="width: 90%">
			<div class="row">
				<div class="col-md-7" id="display_table">
						<div id="featured-box"> 
							<img src="assets/images/classroom.jpg" width=100% height=auto/>	
						</div>

				</div>
				<div class="col-md-5">
					
					<h3 style="text-align: center; background-color: rgb(0,64,128);color: orange;">ASSSIGNMENT SECTION</h3>


				</div>

				
			</div>
			</section>
		</div>
	</div>
	

		
		
	<!--<div class="footer panel">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
					<p class="simplenav">
						<a href="#">Home</a> | 
						<a href="#">About</a> |
						<a href="#">Contact</a>
						
					</p>
				</div>

				<div class="col-sm-4 col-sm-offset-1">
					<p class="text-right">
						Copyright &copy; 2019. ChipEdge</a>
					</p>
				</div>

			</div>
		</div>
	</div>-->



	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>


	<script language=javascript>
		<!--
		//Disable right click script - By www.BBeginner.com
		//
		var message="Function Disabled";
		////////////////
		function clickIE() {if (document.all) {(message);return false;}}
		function clickNS(e) {if
		(document.layers||(document.getElementById&&!document.all)) {
		if (e.which==2||e.which==3) {(message);return false;}}}
		if (document.layers)
		{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
		else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
		document.oncontextmenu=new Function("return false")
		// -->
	</script>
	
	<script type='text/javascript'> 
		if(typeof document.onselectstart!="undefined" )
			{document.onselectstart=new Function ("return false" ); } 
		else{document.onmousedown=new Function ("return false" );
			document.onmouseup=new Function ("return false"); } 
	</script>

	<!--javascript code for pcycle-->
	<script>

	function courseFun(courseId){
		console.log(courseId);
		//$.ajax({url: "/admin.php", data:{courseId : courseId}});
		$.post("service.php", {courseId:courseId},function(res){
			$('#featured-box').html(res);
			var x = document.getElementById("display_table");
			if (x.style.display === "none") {
				x.style.display = "block";
			} 
		});
		
	}
	

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

// Add active class to the current button (highlight it)
var header = document.getElementById("dropdown");
var btns = header.getElementsByClassName("tabs");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = header.getElementsByClassName("active");
  console.log(current);
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" active", "");
  }
  this.className += " active";
  });
}
</script>



</body>
</html>
