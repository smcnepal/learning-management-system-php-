<?php  
if(isset($_POST["submit"]))
{  
    if(!empty($_POST['email']) && !empty($_POST['password']))
{
    $user=$_POST['email'];  
    $pass=$_POST['password'];  
    $con=mysql_connect('localhost','root','','education');
    $query="SELECT * FROM faculty WHERE email='.$user.'";
    $result1=mysql_query($con,$query); 
    $numrows=mysql_num_rows($result1);  
    if($numrows==0)  
    {  
        $sql="INSERT INTO faculty(email,password) VALUES('$user','$pass')";  
  
        $result2=mysql_query($con,$sql);  
        if($result2)
        {  
            echo "Account Successfully Created";  
        } 
        else 
        {  
            echo "failure!";  
        }  
  
    } 
    else 
    {  
        echo "That username already exists! Please try again with another.";  
    }  
  
} 
else 
{  
    echo "All fields are required!";  
}
} else {
    echo "Failure";
}   
?>  

