<?php 

if (isset($_GET['id'])){
  $current_file  = $_GET['id'];
   $current = file_get_contents("date_users/users/$current_file");
   if (!isset($current)){
     echo "File deleted";
   }
   else{
       unlink("date_users/users/$current_file");
       header('Location: index_users.php');
   }

}
?>