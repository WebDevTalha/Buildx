<?php
require_once('config.php');

$slug = $_GET['slug'];

$stm = $pdo->prepare("DELETE FROM articles WHERE slug=?");
$stm->execute(array($slug));

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Deleted</title>
</head>
<body>
   


   <script src="../assets/scripts/sweetalert.min.js"></script>
   <script>
      swal({
         title: "",
         text: "Post Deleted Successfully!",
         icon: "success",
         buttons: false,
         });
      const myTimeout = setTimeout(myGreeting, 2000);

      function myGreeting() {
         window.location.href = "../blog-articles";
      }
     
   </script>
</body>
</html>
