<?php


        $db=mysqli_connect("localhost", "root", "") or die('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db($db, "documents");
       
        if (isset($_POST['url'])) {
            $url = $_POST['url'];
        }
        // $query = mysqli_query($db, "SELECT * FROM media where course=$course");
        $query = mysqli_query($db,"SELECT * FROM physics where path= '$url'");
        
            //echo '<div class = "container">';
            
        while($r=mysqli_fetch_array($query)) 
        {

             
               
                           echo '<embed src="';
                           echo $r["path"];
                           echo '#toolbar=0" width="1000" height="750">';                           
                      
            
            
            }
        
    
?>
