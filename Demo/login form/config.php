<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'education');
   $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
   if(!$connect)
   {
   	die("database connection failed" . mysqli_error($connect));
   }
   $selectdb = mysqli_select_db ($connect,DB_DATABASE);
   if(!$selectdb)
   {
   	die("database selection failed" . mysqli_error($connect));
   }
?>