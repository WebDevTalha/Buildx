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
                        Create New Articles
                     </div>
                </div>
                <div class="page-title-actions">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               <div class="main-card mb-3 card">
                  <div class="card-body">
                     <h5 class="card-title">Enter Category Name</h5>
                     <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom01">Article Title:</label>
                                 <input type="text" name="title" class="form-control" id="validationCustom01" required />
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom02">Article Slug:</label>
                                 <input type="text" name="slug" class="form-control" id="validationCustom02" readonly required />
                                 <div class="invalid-feedback">
                                    Please provide a valid Slug.
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom03">Article Content:</label>
                                 <textarea name="content" class="form-control" id="validationCustom03" require></textarea>
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="col-md-12 mb-3 mt-3">
                                 <label for="validationCustom04">Article Thumbnail:</label>
                                 <div class="photo_wrapper">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="thumbnail" id="imageUpload"/>
                                          <label for="imageUpload"></label>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview" style="background-image: url(uploads/bg.jpg);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom05">Article Title:</label>
                                 <select name="catagory" id="validationCustom05" class="form-control">
                                    <option value="">On Page Seo</option>
                                 </select>
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom06">Article Tags:</label>
                              <input name='tags' class='some_class_name' placeholder='write some tags' value='css, html, javascript' id="validationCustom06" required>
                           </div>
                        </div>
                        
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom05">Article Status:</label>
                                 <select name="catagory" id="validationCustom05" class="form-control">
                                    <option value="public">Public</option>
                                    <option value="draft">Draft</option>
                                 </select>
                                 <div class="valid-feedback">
                                    Looks good!
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
      $("#validationCustom02").val(Text);        
   });
</script>

<script>
	function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

</script>

<script>
    tinymce.init({
      selector: 'textarea#validationCustom03'
    });
</script>

<script>
   var input = document.querySelector('input[name="tags"]');

var whitelist = ["A# .NET", "A# (Axiom)", "A-0 System", "A+", "A++", "ABAP", "ABC", "ABC ALGOL", "ABSET", "ABSYS", "ACC", "Accent", "Ace DASL", "ACL2", "Avicsoft", "ACT-III", "Action!", "ActionScript", "Ada", "Adenine", "Agda", "Agilent VEE", "Agora", "AIMMS", "Alef", "ALF", "ALGOL 58", "ALGOL 60", "ALGOL 68", "ALGOL W", "Alice", "Alma-0", "AmbientTalk", "Amiga E", "AMOS", "AMPL", "Apex (Salesforce.com)", "APL", "AppleScript", "Arc", "ARexx", "Argus", "AspectJ", "Assembly language", "ATS", "Ateji PX", "AutoHotkey", "Autocoder", "AutoIt", "AutoLISP / Visual LISP", "Averest", "AWK", "Axum", "Active Server Pages", "ASP.NET", "B", "Babbage", "Bash", "BASIC", "bc", "BCPL", "BeanShell", "Batch (Windows/Dos)", "Bertrand", "BETA", "Bigwig", "Bistro", "BitC", "BLISS", "Blockly", "BlooP", "Blue", "Boo", "Boomerang", "Bourne shell (including bash and ksh)", "BREW", "BPEL", "B", "C--"];

var tagify = new Tagify(input, {
   whitelist:whitelist,
   maxTags: 10,
   dropdown: {
      maxItems: 30,          
      classname: "tags-look", 
      enabled: 0,            
      closeOnSelect: false   
   }
})
</script>