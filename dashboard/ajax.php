<?php
require_once('config.php');
require_once('functions.php');


if(isset($_POST['currentPass'])){
   $currentPass = $_POST['currentPass'];
   $newPass = $_POST['newPass'];
   $confirmNewPass = $_POST['confirmNewPass'];
   $check = admin('password',1);
   if(empty($currentPass) && empty($newPass) && empty($confirmNewPass)){
      echo "empty_all";
   }
   else if(empty($currentPass)){
      echo "empty_current";
   }
   else if(empty($newPass)){
      echo "empty_new";
   }
   else if(empty($confirmNewPass)){
      echo "empty_confirm";
   }
   else if(SHA1($currentPass) != $check){
      echo "passNmatch";
   }
   else{
      $update = $pdo->prepare("UPDATE admin SET password=? WHERE id=?");
		$update->execute(array(SHA1($newPass),1));
      echo "update";
   }
}

if(isset($_POST['userDelete'])){
   $id = $_POST['deleteSlug'];
   $stm = $pdo->prepare("DELETE FROM users WHERE id=?");
   $result = $stm->execute(array($id));
   if($result == true){
      echo 'success';
   } else{
      echo 'failed';
   }
}

if(isset($_POST['categoryDelete'])){
   $slug = $_POST['deleteSlug'];
   $stm = $pdo->prepare("DELETE FROM categories WHERE slug=?");
   $result = $stm->execute(array($slug));
   if($result == true){
      echo 'success';
   } else{
      echo 'failed';
   }
}