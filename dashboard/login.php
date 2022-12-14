<?php require_once('config.php');?>
<?php 
session_start();


if(isset($_SESSION['b_admin_loggedin'])){
  header('location:index');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <link rel="stylesheet" href="main.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <style>
   body {
    background: #e5e5e5;
   }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row h-100 w-100 justify-content-center align-items-center">
          <div class="col-lg-4 mx-auto">
            <div class="bg-white text-left p-5">
              <div class="brand-logo text-center mb-4">
                <h4 class="text-info fw-3">Admin Login</h4>
              </div>
              <form class="pt-3" method="POST" action="">
                <?php if(isset($error)) :?>
                <div class="alert alert-danger"><?php echo $error;?></div>
                <?php endif;?>
                <?php if(isset($success)) :?>
                <div class="alert alert-success"><?php echo $success;?></div>
                <?php endif;?>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="login_btn">Login</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


  <script src="assets/scripts/jquery-3.6.0.min.js"></script>
  <script src="assets/scripts/sweetalert.min.js"></script>

</body>

</html>

<?php

if(isset($_POST['login_btn'])){
   $user_name = $_POST['username'];
   $password = $_POST['password'];
   
   if(empty($user_name)){
     echo '<script>
     swal({
         title: "Error!",
         text: "Username Is Requird!",
         icon: "error",
         button: "Try Again!",
      });
     </script>';
   }
   else if(empty($password)){
     echo '<script>
      swal({
         title: "Error!",
         text: "Password Is Requird!",
         icon: "error",
         button: "Try Again!",
      });
     </script>';
   }
   else{
     $stm = $pdo->prepare("SELECT * FROM admin WHERE username=? AND password=?");
     $stm->execute(array($user_name,SHA1($password)));
     $admin_count = $stm->rowCount();
 
     if($admin_count == 1){
       $admin_data = $stm->fetchAll(PDO::FETCH_ASSOC);
 
       $_SESSION['b_admin_loggedin'] = $admin_data;
 
       header("location:index");
     }
     else {
       echo '<script>
       swal({
         title: "",
         text: "Username Or Password Is Wrong!",
         icon: "warning",
         button: "Try Again!",
       });
       </script>';
     }
   }
 }
?>