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
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="shortcut icon" href="assets/image/favicon.png" />
  <style>
   body {
  background-color: rgb(228, 229, 247);
}
.social-login img {
  width: 24px;
}
a {
  text-decoration: none;
}

.card {
    font-family: sans-serif;
    width: 450px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 3em;
    margin-bottom: 3em;
    border-radius: 10px;
    background-color: #ffff;
    padding: 1.8rem;
    box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.1);
}

.title {
  text-align: center;
  font-weight: bold;
  margin: 0;
}
.subtitle a {
   color: #ffc107;
}
.subtitle {
  text-align: center;
  font-weight: bold;
}
.btn-text {
  margin: 0;
}

.social-login {
  display: flex;
  justify-content: center;
  gap: 5px;
}

.google-btn {
  background: #fff;
  border: solid 2px rgb(245 239 239);
  border-radius: 8px;
  font-weight: bold;
  display: flex;
  padding: 10px 10px;
  flex: auto;
  align-items: center;
  gap: 5px;
  justify-content: center;
}
.fb-btn {
  background: #fff;
  border: solid 2px rgb(69, 69, 185);
  border-radius: 8px;
  padding: 10px;
  display: flex;
  align-items: center;
}

.or {
  text-align: center;
  font-weight: bold;
  border-bottom: 2px solid rgb(245 239 239);
  line-height: 0.1em;
  margin: 25px 0;
}
.or span {
  background: #fff;
  padding: 0 10px;
}

.email-login {
  display: flex;
  flex-direction: column;
}
.email-login label {
  color: rgb(170 166 166);
}

input[type="text"],
input[type="password"] {
  padding: 15px 20px;
  margin-top: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-sizing: border-box;
}

.cta-btn {
  color: white;
  padding: 18px 20px;
  margin-top: 10px;
  margin-bottom: 20px;
  width: 100%;
  border-radius: 10px;
  border: none;
}

.forget-pass {
  text-align: center;
  display: block;
}

  </style>
</head>

<body>

<div class="card">
  <form action="" method="POST" class="needs-validation" novalidate>
    <h2 class="title"> Sign up</h2>
    
    <div class="form-group mb-3">
      <label for="validationCustom01" class="form-label"> <b>Username</b></label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Username" name="username" required>
      <div class="valid-feedback">
         Looks good!
      </div>
    </div>

    <div class="form-group mb-3">
      <label for="validationCustom02" class="form-label"> <b>Email</b></label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Enter Email" name="email" required>
      <div class="invalid-feedback">
         Please provide a valid Eamil.
      </div>
    </div>

    <div class="form-group mb-3">
      <label for="validationCustom03" class="form-label"><b>Password</b></label>
      <input type="password" class="form-control" id="validationCustom03" placeholder="Enter Password" name="password" required>
      <div class="invalid-feedback">
         Please provide a valid Password.
      </div>
    </div>

    <div class="form-group mb-3">
      <label class="form-label"><b>Gender</b></label><br>
      <label><input type="radio" name="gender" value="Male" checked> Male</label>&nbsp;&nbsp;
      <label><input type="radio" name="gender" value="Female"> Female</label>
    </div>
    <button class="cta-btn btn-warning btn" type="submit" name="signup_btn">Sign up</button>
    <a class="forget-pass" href="#">Login</a>
    </form>
    <script>
      (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
         .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
               event.preventDefault()
               event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
         })
      })()
    </script>
</div>


  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sweetalert.min.js"></script>

</body>

</html>

<?php

if(isset($_POST['signup_btn'])){
   $user_name = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $gender = $_POST['gender'];
   
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
   if(empty($email)){
     echo '<script>
     swal({
         title: "Error!",
         text: "Email Is Requird!",
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
     $stm = $pdo->prepare("INSERT INTO users(username,email,password,gender) VALUES(?,?,?,?)");
     $result = $stm->execute(array($user_name,$email,SHA1($password),$gender));
 
     if($result == true){
         echo '<script>
         swal({
         title: "Success",
         text: "Your Account Has Been Created!",
         icon: "success",
         button: "Ok",
         });
         </script>';
         echo '<script>
               const myTimeout = setTimeout(myGreeting, 2000);
         
               function myGreeting() {
                  window.location.href = "login";
               }
            
            </script>';
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