<?php
require_once('config.php');

if($_FILES['file']['name'] != ''){
   $test = explode('.', $_FILES['file']['name']);
   $extension = end($test);    
   $name = rand(99,999999999999).'.'.$extension;

   $location = 'uploads/'.$name;
   move_uploaded_file($_FILES['file']['tmp_name'], $location);

   // echo '<img src="'.$location.'" height="100" width="100" />';
   $statement = $pdo->prepare("UPDATE admin SET profile_photo=? WHERE id=?");
   $update_query = $statement->execute(
      array(
         $location,
         1
      )
   );

   if($update_query == true){
      echo "Updated";
      echo $location;

   }
   else {
      $error = "Failed";
   }
}
else {
   echo "imageEmpty";
}