<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="nitte notes">
	<meta name="author" content="searchit.com">
	<title></title>
	<link rel="shortcut icon" href="assets/images/tts.png" type="image/png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'>

<!-------style started for popup------------------------->
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top:10px; /* Location of the box */
  padding-bottom: 10px;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: red;
  background-color: blue;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;

}

.modal-header {
  padding: 2px 16px;
  background-color:rgb(0,64,64);
  color: white;
}

.modal-body {
	padding: 2px 16px;
	
}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
<!-------style ended for popup------------------------->
   
	
</head>
<body class="mybody" >
 <div id="pcourses">
		<section class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<button type="button" class="btn btn-primary btn-block" onclick="Physics()">Physics</button><br>
                   		
						</div>
					</div>
				</div>
				<div class="col-md-4" id="display_physics">
					<div class="featured-box"> 
						<?php 
							$db=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db ($db,"documents");
							$query = mysqli_query($db,"SELECT * FROM physics ORDER BY name");
								echo '<div class = "table-responsive">';
								echo '<table class = "table">';
								echo '<Thead>';
								echo "<tr>";
								echo '<th>File Name</th>';
								echo '<th>Description</th>';
								echo '<th>View|Download</th>';
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
										

									<div>
										
										<!-- Trigger/Open The Modal -->
										<button id="myBtn" onclick = 'modelbutton("<?php echo $r["path"];?>")'>preview</button>
										<div id="myModal" class="modal">
                    <!-- Modal content -->
                   <div class="modal-content">
                        <div class="modal-header">
                           <span class="close">&times;</span>
                        </div>
                      <div class="modal-body">

					 </div>
                    </div>

              </div>
										

									</div>


									<?php
									echo "</td>";
									echo "</tr>";
								}
							}
							echo "</Table>";
							echo "</div>";
						?>
					</div>
				</div>
				<div class="col-md-4"></div>
				
			</div>
			
			</div>

		</section>
	</div>
	
	</div>
	
  </div>
</div>

	
<!----------------js starts for popup----------------------->

<script>

/*document.getElementById("disable_rightClick").oncontextmenu=function() {hide_function();}

function hide_function()
{
	return false;
}*/



// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function modelbutton(url) {
	$.post("service2.php", {url:url},function(res){
	$('.modal-body').html(res);
	modal.style.display = "block";
	document.onmousedown = disableRightclick;
	var message = "Right click not allowed !!";
	function disableRightclick(evt){
		if(evt.button == 2){
			alert(message);
			return false;    
		}
	}

});
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!----------------js end for popup----------------------->



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

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
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
		function login_function() {
			confirm("sorry !!! to access other department,please select respective department during registration");
		} 
	</script>
	
</body>
