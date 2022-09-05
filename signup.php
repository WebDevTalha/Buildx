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
.usernamevalid {
    border-color: #dc3545 !important;
    padding-right: calc(1.5em + .75rem) !important;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
.usernamevalid2 {
    border-color: #198754 !important;
    padding-right: calc(1.5em + .75rem) !important;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
.usernamevalid:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 .25rem rgba(220,53,69,.25);
}
.usernamevalid2:focus {
    border-color: #198754;
    box-shadow: 0 0 0 .25rem rgba(25,135,84,.25);
}


/* The message box is shown when the user clicks on the password field */
#psw-message {
    background: #0000000a;
    color: #000;
    position: relative;
    padding: 20px;
    border-radius: 1rem;
    display: none;
}
#psw-message h3 {
    font-size: 1rem;
}
.pws-wrapper {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
}
#psw-message p {
    padding: 0px 7px;
    font-size: 12px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -10px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
    position: relative;
    left: -10px;
    content: "✖";
}

  </style>
</head>

<body>

<div class="card">
  <form action="" method="POST" class="needs-validation" novalidate>
    <h2 class="title"> Sign up</h2>
    
    <div class="form-group mb-3">
      <label for="validationCustom01" class="form-label"> <b>Username</b></label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Username" name="username" autocomplete="none" required>
      <div class="invalid-feedback usernameValidation">
        Please provide a valid Username.
      </div>
      <div class="valid-feedback usernameValidation2">
        Looks Good.
      </div>
    </div>

    <div class="form-group mb-3">
      <label for="validationCustom02" class="form-label"> <b>Email</b></label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Enter Email" name="email" required>
      <div class="invalid-feedback emailValidation">
        Please provide a valid Email.
      </div>
      <div class="valid-feedback emailValidation2">
        Looks Good.
      </div>
    </div>

    <div class="form-group mb-3">
      <label for="validationCustom03" class="form-label"><b>Password</b></label>
      <input type="password" class="form-control" id="validationCustom03" placeholder="Enter Password" name="password" required>
      <div class="invalid-feedback">
         Please provide a valid Password.
      </div>
      <div id="psw-message">
        <h3>Password must contain the following:</h3>
        <div class="pws-wrapper">
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
      </div>
    </div>

    <div class="form-group mb-3">
      <label class="form-label"><b>Gender</b></label><br>
      <label><input type="radio" name="gender" value="Male" id="genderMale" checked> Male</label>&nbsp;&nbsp;
      <label><input type="radio" name="gender" value="Female" id="genderFemale"> Female</label>
    </div>
    <button class="cta-btn btn-warning btn signup_btn" type="submit" name="signup_btn" id="signup_btn">Sign up</button>
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

  <script>
      $(document).ready(function(){

        
        // Form Enter press submition stop
        $(document).ready(function() {
            $(window).keydown(function(event){
              if(event.keyCode == 13) {
                  event.preventDefault();
                  return false;
              }
            });
        });
        
       

        // Username Validation
        $('#validationCustom01').keyup(function(){
          var Text = $(this).val();
          Text = Text.toLowerCase();
          Text = Text.replace(/[^a-zA-Z0-9]+/g,'_');
          $(this).val(Text);     
          
          let getUserNameVal = $(this).val();
          $.ajax({
              type: "POST",
              url:'ajax',
              data: {
                username: getUserNameVal
              },
              success:function(response){
                let data = response;
                if(data == "notEighth" && data != ""){
                  // $('#validationCustom01').css("border-color", "#dc3545");
                  $('#validationCustom01').addClass('usernamevalid');
                  $('.usernameValidation').html('User Name Must Be More Then 8 character').show();
                  $('#validationCustom01').removeClass('usernamevalid2');
                  $('.usernameValidation2').hide();
                  $('#signup_btn').addClass('signup_btn');
                } 
                else if(data == "true"){
                  $('#validationCustom01').removeClass('usernamevalid');
                  $('#validationCustom01').addClass('usernamevalid2');
                  $('.usernameValidation').hide();
                  $('.usernameValidation2').show();
                  $('#signup_btn').removeClass('signup_btn');
                }
                else if(data == "false"){
                  $('#validationCustom01').addClass('usernamevalid');
                  $('#validationCustom01').removeClass('usernamevalid2');
                  $('.usernameValidation').html('User Name Already Exists.').show();
                  $('.usernameValidation2').hide();
                  $('#signup_btn').addClass('signup_btn');
                }
              }
          }); 
        });

        // Email Validation
        $('#validationCustom02').keyup(function(){
          let email = $(this).val();

          $.ajax({
            type: "POST",
            url:'ajax',
            data: {
              email: email
            },
            success:function(response){
              let data = response;
              if(email.langth == 0){
                  $('.emailValidation').html('Email Is Requird').show();
                  $('#validationCustom02').addClass('usernamevalid');
                  $('#validationCustom02').removeClass('usernamevalid2');
                  $('.emailValidation2').hide();
                  $('#signup_btn').addClass('signup_btn');
                  return false;
              }
              else if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
                  $('.emailValidation').html('Invail Email').show();
                  $('#validationCustom02').addClass('usernamevalid');
                  $('#validationCustom02').removeClass('usernamevalid2');
                  $('.emailValidation2').hide();
                  $('#signup_btn').addClass('signup_btn');
                  return false;
              }
              else if(data == "false"){
                  $('.emailValidation').html('This Email Is Already Exists.').show();
                  $('#validationCustom02').addClass('usernamevalid');
                  $('#validationCustom02').removeClass('usernamevalid2');
                  $('.emailValidation2').hide();
                  $('#signup_btn').addClass('signup_btn');
                  return false;
              }
              else{
                  $('#validationCustom02').addClass('usernamevalid2');
                  $('.emailValidation2').show();
                  $('.emailValidation').hide();
                  $('#signup_btn').removeClass('signup_btn');
                  return true;
              }
            }
          }); 
        });

        // Password Validation
        let myInput = document.getElementById("validationCustom03");
        let letter = document.getElementById("letter");
        let capital = document.getElementById("capital");
        let number = document.getElementById("number");
        let length = document.getElementById("length");
        myInput.onfocus = function() {
          $("#psw-message").show(200);
        }
        myInput.onblur = function() {
          $("#psw-message").hide(200);
        }
        $('#validationCustom03').keyup(function(){
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
          if(myInput.value.match(lowerCaseLetters)) {  
            letter.classList.remove("invalid");
            letter.classList.add("valid");
            $('#validationCustom03').removeClass('usernamevalid');
            $('#validationCustom03').addClass('usernamevalid2');
            $('#signup_btn').removeClass('signup_btn');
          } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
            $('#validationCustom03').addClass('usernamevalid');
            $('#validationCustom03').removeClass('usernamevalid2');
            $('#signup_btn').addClass('signup_btn');
            
          }
          
          // Validate capital letters
          var upperCaseLetters = /[A-Z]/g;
          if(myInput.value.match(upperCaseLetters)) {  
            capital.classList.remove("invalid");
            capital.classList.add("valid");
            $('#validationCustom03').removeClass('usernamevalid');
            $('#validationCustom03').addClass('usernamevalid2');
            $('#signup_btn').removeClass('signup_btn');
          } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
            $('#validationCustom03').addClass('usernamevalid');
            $('#validationCustom03').removeClass('usernamevalid2');
            $('#signup_btn').addClass('signup_btn');
          }

          // Validate numbers
          var numbers = /[0-9]/g;
          if(myInput.value.match(numbers)) {  
            number.classList.remove("invalid");
            number.classList.add("valid");
            $('#validationCustom03').removeClass('usernamevalid');
            $('#validationCustom03').addClass('usernamevalid2');
            $('#signup_btn').removeClass('signup_btn');
          } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
            $('#validationCustom03').addClass('usernamevalid');
            $('#validationCustom03').removeClass('usernamevalid2');
            $('#signup_btn').addClass('signup_btn');
          }
          
          // Validate length
          if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
            $('#validationCustom03').removeClass('usernamevalid');
            $('#validationCustom03').addClass('usernamevalid2');
            $('#signup_btn').removeClass('signup_btn');
          } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
            $('#validationCustom03').addClass('usernamevalid');
            $('#validationCustom03').removeClass('usernamevalid2');
            $('#signup_btn').addClass('signup_btn');
          }
        });

        // Set PreventDafult();
        $('#signup_btn').click(function(e){
          e.preventDefault();
          let getUsernameIn = $('#validationCustom01').val();
          let getEmailIn = $('#validationCustom02').val();
          let getPswIn = $('#validationCustom03').val();
          let getgenderIn = $('input[name=gender]:checked').val();
          $.ajax({
            type: "POST",
            url:'ajax',
            data: {
              user_name: getUsernameIn,
              get_email: getEmailIn,
              get_psw: getPswIn,
              get_gender: getgenderIn
            },
            success:function(response){
              let data = response;
              console.log(data);
              if(data == "userEmptyemailEmptypswEmpty"){
                $('#validationCustom01').addClass('usernamevalid');
                $('#validationCustom02').addClass('usernamevalid');
                $('#validationCustom03').addClass('usernamevalid');
              }
              else if(data == "userEmpty"){
                $('#validationCustom01').addClass('usernamevalid');
                $('#validationCustom02').removeClass('usernamevalid');
                $('#validationCustom03').removeClass('usernamevalid');
              }
              else if(data == "emailEmpty"){
                $('#validationCustom01').removeClass('usernamevalid');
                $('#validationCustom02').addClass('usernamevalid');
                $('#validationCustom03').removeClass('usernamevalid');
              }
              else if(data == "pswEmpty"){
                $('#validationCustom01').removeClass('usernamevalid');
                $('#validationCustom02').removeClass('usernamevalid');
                $('#validationCustom03').addClass('usernamevalid');
              }
              else if(data == "false"){
                swal({
                  title: "",
                  text: "Signup Failed!",
                  icon: "error",
                  button: "Try Again!",
                });
              }
              else if(data == "true"){
                swal({
                  title: "Success",
                  text: "Your Account Successfuly Created!",
                  icon: "success",
                  button: "Click For Login! :)",
                }).then(function() {
                  window.location = "login";
                });
              }
            }
          }); 
        });

      });
  </script>
</body>

</html>

