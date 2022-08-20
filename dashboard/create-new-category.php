<?php require_once('header.php'); ?>



<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                     <div class="page-title-icon">
                           <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"> </i>
                     </div>
                     <div>
                        Create New Category
                     </div>
                </div>
                <div class="page-title-actions">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
               <div class="main-card mb-3 card">
                  <div class="card-body">
                     <h5 class="card-title">Enter Category Name</h5>
                     <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom01">Name:</label>
                                 <input type="text" class="form-control" id="validationCustom01" required />
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom03">Slug:</label>
                                 <input type="text" class="form-control" id="validationCustom03" readonly required />
                                 <div class="invalid-feedback">
                                    Please provide a valid Slug.
                                 </div>
                              </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create Category</button>
                     </form>
                     <script>
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
                     </script>
                  </div>
               </div>
            </div>
        </div>
    </div>
    

<?php require_once('footer.php'); ?>

<script>
   $("#validationCustom01").keyup(function() {
      var Text = $(this).val();
      Text = Text.toLowerCase();
      Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
      $("#validationCustom03").val(Text);        
   });
</script>