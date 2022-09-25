<?php require_once('header.php'); ?>

<style>
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
</style>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                     <div class="page-title-icon">
                           <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"> </i>
                     </div>
                     <div>
                           Change Password
                     </div>
                </div>
                <div class="page-title-actions">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
               <div class="main-card mb-3 card">
                  <div class="card-body">
                     <h5 class="card-title">Change password</h5>
                     <span id="msg" style="color:red"></span><br/>
                     <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="form-group mb-3">
                           <label for="Current_p" class="form-label">Current Password:</label>
                           <input type="password" class="form-control pass" id="Current_p" required>
                           <div class="invalid-feedback p_passValidation1">
                           Please provide Current Password.
                           </div>
                           <div class="valid-feedback passValidation2">
                           Looks Good.
                           </div>
                        </div>

                        <div class="form-group mb-3">
                           <label for="new_p" class="form-label">New Password:</label>
                           <input type="password" class="form-control pass" id="new_p" required>
                           <div class="invalid-feedback p_passValidation2">
                           Please provide a New Password.
                           </div>
                           <div class="valid-feedback passValidation2">
                           Looks Good.
                           </div>
                        </div>

                        <div class="form-group mb-3">
                           <label for="c_new_p" class="form-label">Confirm New Password:</label>
                           <input type="password" class="form-control pass" id="c_new_p" required>
                           <div class="invalid-feedback p_passValidation3">
                           Please Confirm Your Password.
                           </div>
                           <div class="valid-feedback passValidation2">
                           Looks Good.
                           </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                           <span class="btn btn-secondary pass_show btn-sm"><i class="fa-solid fa-eye"></i> Show Password</span>
                        </div>
                        <div class="form-group">
                           <input type="submit" name="info_update_btn" class="btn btn-success info_update_btn" value="Save changes">&nbsp;&nbsp;&nbsp;
                           <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                     </form>
                     <!-- <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                              "use strict";
                              window.addEventListener(
                                 "load",
                                 function () {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName("needs-validation");
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function (form) {
                                          form.addEventListener(
                                             "submit",
                                             function (event) {
                                                if (form.checkValidity() === false) {
                                                      event.preventDefault();
                                                      event.stopPropagation();
                                                }
                                                form.classList.add("was-validated");
                                             },
                                             false
                                          );
                                    });
                                 },
                                 false
                              );
                        })();
                     </script> -->
                  </div>
               </div>
            </div>
        </div>
    </div>
    

<?php require_once('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.js"></script>

<script>
$('.pass_show').click(function(){
   var x = $('.pass');
   var a = x[0].type;
   var b = x[1].type;
   var c = x[2].type;
   if(a === "password" && b === "password" & c === "password") {
      x[0].type = "text";
      x[1].type = "text";
      x[2].type = "text";
      $('.pass_show').html('<i class="fa-solid fa-eye-slash"></i> Hide Password');
   } else {
      x[0].type = "password";
      x[1].type = "password";
      x[2].type = "password";
      $('.pass_show').html('<i class="fa-solid fa-eye"></i> Show Password');
   }
});

$('#Current_p').keyup(function(){
   $('#Current_p').removeClass('usernamevalid');
   $('.p_passValidation1').hide();
});

$('#new_p').keyup(function(){
   const curn_val = $(this).val();
   if(curn_val.length <= 6){
      $('#new_p').addClass('usernamevalid');
      $('#new_p').removeClass('usernamevalid2');
      $('.p_passValidation2').html('Password Must Be More Then 6 Character.').show();
   }
   else if(curn_val.length > 6){
      $('#new_p').removeClass('usernamevalid');
      $('#new_p').addClass('usernamevalid2');
      $('.p_passValidation2').hide();
   }
});

$('#c_new_p').keyup(function(){
   const con_val = $(this).val();
   const new_p = $('#new_p').val();
   console.log(new_p);
   if(con_val != new_p){
      $('#c_new_p').addClass('usernamevalid');
      $('#c_new_p').removeClass('usernamevalid2');
      $('.p_passValidation3').html('Password Not match.').show();
   }
   else if(con_val == new_p){
      $('#c_new_p').removeClass('usernamevalid');
      $('#c_new_p').addClass('usernamevalid2');
      $('.p_passValidation3').hide();
   }
});

$('form').submit(function(e){
   e.preventDefault();
   e.stopPropagation();
   const currentPass = $('#Current_p').val();
   const newPass = $('#new_p').val();
   const confirmNewPass = $('#c_new_p').val();

   $.ajax({
      type: "POST",
      url:'ajax',
      data: {
         currentPass: currentPass,
         newPass: newPass,
         confirmNewPass: confirmNewPass
      },
      success:function(response){
         let getData = response;
         console.log(getData);
         if(getData === "empty_all"){
            $('#Current_p').addClass('usernamevalid');
            $('#new_p').addClass('usernamevalid');
            $('#c_new_p').addClass('usernamevalid');
         }
         else if(getData === "empty_current"){
            $('#Current_p').addClass('usernamevalid');
            $('#new_p').removeClass('usernamevalid');
            $('#c_new_p').removeClass('usernamevalid');
         }
         else if(getData === "empty_new"){
            $('#Current_p').removeClass('usernamevalid');
            $('#new_p').addClass('usernamevalid');
            $('#c_new_p').removeClass('usernamevalid');
         }
         else if(getData === "empty_confirm"){
            $('#Current_p').removeClass('usernamevalid');
            $('#new_p').removeClass('usernamevalid');
            $('#c_new_p').addClass('usernamevalid');
         }
         else if(getData === "passNmatch"){
            $('#Current_p').addClass('usernamevalid');
            $('.p_passValidation1').html('Password Not match.').show();
            $('#new_p').removeClass('usernamevalid');
            $('#c_new_p').removeClass('usernamevalid');
         }
         else if(getData === "update"){
            $('#Current_p').removeClass('usernamevalid');
            $('#new_p').removeClass('usernamevalid');
            $('#c_new_p').removeClass('usernamevalid');
            $('#new_p').removeClass('usernamevalid2');
            $('#c_new_p').removeClass('usernamevalid2');
            $('#Current_p').val(" ");
            $('#new_p').val(" ");
            $('#c_new_p').val(" ");
            swal({
               title: 'Saving',
               allowEscapeKey: false,
               allowOutsideClick: false,
               timer: 2000,
               onOpen: () => {
                  swal.showLoading();
               }
            }).then(
               () => {},
               (dismiss) => {
                  if (dismiss === 'timer') {
                  swal({ 
                     title: 'Updated!',
                     type: 'success',
                     timer: 2000,
                     showConfirmButton: false
                  })
                  }
               }
            );
         }
      }
   }); 

});

</script>