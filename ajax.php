<?php
require_once("config.php");

// Comment Replay
if(isset($_POST['ajaxType'])){
   $user_id = $_POST['user_id'];
   $post_id = $_POST['post_id'];
   $comment_id = $_POST['comment_id'];
   $comment_content = $_POST['comment_content'];

   $stm = $pdo->prepare("INSERT INTO replays(user_id,post_id,comment_id,content) VALUES(?,?,?,?)");
   $result = $stm->execute(array($user_id,$post_id,$comment_id,$comment_content));
   if($result == true){
      echo "success";
   } else {
      echo "error";
   }
}

// Username Validation
if(isset($_POST['username'])){
   $username = $_POST['username'];
   if(strlen($username) <= 8){
      echo "notEighth";
   }
   else{
      $stm=$pdo->prepare("SELECT * FROM users WHERE username=?");
      $stm->execute(array($username));
      $result = $stm->rowCount();
      if($result == 0){
         echo "true";
      } else{
         echo "false";
      }
   }
}

// Email VAlidation
if(isset($_POST['email'])){
   $email = $_POST['email'];
   
   $stm=$pdo->prepare("SELECT * FROM users WHERE email=?");
   $stm->execute(array($email));
   $result = $stm->rowCount();
   if($result == 0){
      echo "true";
   } else{
      echo "false";
   }
}

// User Submition
if(isset($_POST['user_name'])){
   $user_name = $_POST['user_name'];
   $get_email = $_POST['get_email'];
   $get_psw = $_POST['get_psw'];
   $get_gender = $_POST['get_gender'];
   
   if(empty($user_name) && empty($get_email) && empty($get_psw)){
      echo 'userEmptyemailEmptypswEmpty';
   }

   elseif(empty($user_name)){
      echo 'userEmpty';
   }
   elseif(empty($get_email)){
      echo 'emailEmpty';
   }
   elseif(empty($get_psw)){
      echo 'pswEmpty';
   }
   else{
      $stm = $pdo->prepare("INSERT INTO users(username,email,password,gender) VALUES(?,?,?,?)");
      $result = $stm->execute(array($user_name,$get_email,SHA1($get_psw),$get_gender));
  
      if($result == true){
          echo 'true';
      }
      else {
        echo 'false';
      }
   }
}