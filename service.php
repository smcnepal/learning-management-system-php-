<?php

    $db=mysqli_connect("localhost", "root", "") or die('I cannot connect to the database because: ' . mysqli_error()); mysqli_select_db($db, "lms_projectdb");
    

    
    if (isset($_POST['courseId'])) {
        $course = $_POST['courseId'];
    }
    
    $query = mysqli_query($db, "SELECT * FROM media where course=$course");

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
    while ($r=mysqli_fetch_array($query)) {
        if ($r["id"]!='') {
            echo "<tr>";
            echo "<td>";
            echo $r["title"];
            echo "</td>";
            echo "<td>";
            echo $r["fileName"];
            echo "</td>";
            echo "<td>"; 
                   echo '<form method="post" action="pdfViewer.php" width=100px>';
                    echo '<div class="form-group">';
                    echo '<button class="btn btn-primary id="myBtn" type = "submit" name = "view" value = '; echo $r["url"];echo">";
                    echo "preview";
                    echo "</button>";
                    echo "</div>";
                    echo '</form>';
            
            echo "</td>";
            echo "</tr>";
        }
    }
    echo "</Table>";
    echo "</div>";
        //echo "</div>";
                        
?>