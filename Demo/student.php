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
						echo "hello";
						
							$db=mysqli_connect("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysqli_error()); 
							mysqli_select_db($db,"documents");
							$query = mysqli_query($db,"SELECT * FROM physics");
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
									// $GLOBALS["urls"] = $r["path"];
									?>
										<!-- <a href="<?php echo $r["path"];?>#toolbar=0&navpanes=0&scrollbar=0">preview</a> -->
										
										<div class = "btn" id = "mybtn" onclick = 'pdfviewer("<?php echo $r["path"];?>")'>Preview</div>
										<!-- <embed src="<?php echo $r["path"];?>#toolbar=0" width="1000" height="750">  -->
										
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
			</div>
		</section>
	</div>

<script>

	

	function pdfviewer(url){
		console.log(url);
			// window.location = "http://www.corelangs.com/js/basics/redirect.html";
			var ifrm =  document.createElement("iframe");
			ifrm.setAttribute("id", "ifrm");
			ifrm.setAttribute("src",url);
				document.body.appendChild(ifrm);
		}
	

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
				// document.getElementById("display_cip").style.display = "none";
				// document.getElementById("display_mechanical").style.display = "none";
				// document.getElementById("display_mechanics").style.display = "none";
				// document.getElementById("display_electrical").style.display = "none";
				// document.getElementById("display_maths1").style.display = "none";
			} else {
				x.style.display = "none";
			}
		}
		function login_function() {
			confirm("sorry !!! to access other department,please select respective department during registration");
		} 
	</script>
</body>
