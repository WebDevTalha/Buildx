<?php
require_once("config.php");
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