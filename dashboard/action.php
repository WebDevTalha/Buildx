<?php


require_once('config.php');



if(isset($_GET['type']) && isset($_GET['slug'])){
   $slug = $_GET['slug'];
   $type = $_GET['type'];
} else{
   $slug = "";
   $type = "";
}

if($type == 'delete'){
   $stm = $pdo->prepare("DELETE FROM articles WHERE slug=?");
   $stm->execute(array($slug));
}
else if($type == 'edit'){
   echo "";
}
else{
   echo "Nothing Will Be Happend";
}



?>

<?php if($type == 'delete'): ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Delete</title>
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

<?php elseif($type == 'edit') : ?>


<?php require_once('action_header.php'); ?>



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
        <?php
        $stm2=$pdo->prepare("SELECT * FROM articles WHERE slug=?");
        $stm2->execute(array($slug));
        $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="row">
            <div class="col-md-12">
               <div class="main-card mb-3 card">
                  <div class="card-body">
                     <h5 class="card-title">Enter Article Details</h5>
                     <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom01">Article Title:</label>
                                 <input type="text" name="title" class="form-control" id="validationCustom01" value="<?php echo $result2[0]['title']; ?>" readonly required />
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom02">Article Slug:</label>
                                 <input type="text" name="slug" class="form-control" id="validationCustom02" value="<?php echo $result2[0]['slug']; ?>" readonly required />
                                 <div class="invalid-feedback">
                                    Please provide a valid Slug.
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom03">Article Content:</label>
                                 <textarea name="content" class="form-control" id="validationCustom11" require><?php echo $result2[0]['content']; ?></textarea>
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
                                          <input type='file' name="thumbnail" value="<?php echo $result2[0]['thumbnail']; ?>" id="imageUpload"/>
                                          <label for="imageUpload"></label>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview" style="background-image: url(../<?php echo $result2[0]['thumbnail']; ?>);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                           <?php
                           $stm=$pdo->prepare("SELECT * FROM categories");
                           $stm->execute(array());
                           $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                           ?>
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom05">Article Category:</label>
                                 <select name="catagory" id="validationCustom05" class="form-control form-selcect" required aria-label="select example">
                                    <option value="">Select Category</option>
                                    <?php foreach($result as $row) :?>
                                    <option <?php if($row['slug'] == $result2[0]['category']){echo "selected";} ?> value="<?php echo $row['slug']; ?>"><?php echo $row['name']; ?></option>
                                    <?php endforeach; ?>
                                 </select>
                                 <div class="invalid-feedback">
                                    Select Category!
                                 </div>
                              </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-12 mb-3">
                              <label for="validationCustom06">Article Tags:</label>
                              <?php 
                              $decode = json_decode($result2[0]['tags'],true);
                              ?>
                              <input name='tags' class='some_class_name' placeholder='write some tags' value="<?php foreach($decode as $tag){echo $tag['value'].',';} ?>" id="validationCustom06" required>
                           </div>
                        </div>
                        
                        <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <label for="validationCustom05">Article Status:</label>
                                 <select name="status" id="validationCustom05" class="form-control">
                                    <option <?php if($result2[0]['status'] == 'public'){echo "selected";} ?> value="public">Public</option>
                                    <option <?php if($result2[0]['status'] == 'draft'){echo "selected";} ?> value="draft">Draft</option>
                                 </select>
                                 <div class="valid-feedback">
                                    Looks good!
                                 </div>
                              </div>
                        </div>
                        <button class="btn btn-primary" name="submit_article" type="submit">Update Article</button>
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
    

<?php require_once('action_footer.php'); ?>

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
      selector: 'textarea#validationCustom11'
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

<?php

if(isset($_POST['submit_article'])){
   $title = $_POST['title'];
   $slug = $_POST['slug'];
   $content = $_POST['content'];
   $thumbnail = $_FILES['thumbnail'];
   $target_dir = "uploads/"; 
   $catagory = $_POST['catagory'];
   $tags = $_POST['tags'];
   $status = $_POST['status'];

   if(empty($title)){
      echo '<script>
      swal({
         title: "",
         text: "Title Is Requird!",
         icon: "error",
         button: "Try Again!",
       });
      </script>';
   }
   else if(empty($slug)){
      echo '<script>
      swal({
         title: "",
         text: "Slug Is Requird!",
         icon: "error",
         button: "Try Again!",
       });
      </script>';
   }
   else if(empty($content)){
      echo '<script>
      swal({
         title: "",
         text: "Content Is Requird!",
         icon: "error",
         button: "Try Again!",
       });
      </script>';
   }
   else if(empty($thumbnail['name'])){
      echo '<script>
      swal({
         title: "",
         text: "Thumbnail Is Requird!",
         icon: "error",
         button: "Try Again!",
       });
      </script>';
   }
   else if($catagory == ""){
      echo '<script>
      swal({
         title: "",
         text: "Category Is Requird!",
         icon: "error",
         button: "Try Again!",
       });
      </script>';
   }
   else if(empty($tags)){
      echo '<script>
      swal({
         title: "",
         text: "Tags Is Requird!",
         icon: "error",
         button: "Try Again!",
       });
      </script>';
   }
   else{

      $stm=$pdo->prepare("SELECT slug FROM articles WHERE slug=?");
      $stm->execute(array($slug));
      $slug_count = $stm->rowCount();


      if($slug_count == 1){
         
         // take photo extention
         $size = $_FILES['thumbnail']['size'];
         $temp_name = $_FILES["thumbnail"]["tmp_name"];
         $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
         $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


         // Photo Conditions
         if($fileType != 'png' && $fileType != 'jpg'){
               echo '<script>
               swal({
                  title: "",
                  text: "photo must be png or jpg!",
                  icon: "error",
                  button: "Try Again!",
               });
               </script>';
         }
         elseif($size >= 5000000){
               echo '<script>
               swal({
                  title: "",
                  text: "Photo less then 5MB!",
                  icon: "error",
                  button: "Try Again!",
               });
               </script>';
         }
         else {
            
            // image same in file
            $name_prefix = rand(99,999999999999);
            $new_photo_name = $target_dir . $name_prefix . '.' . $fileType;


            $upload = move_uploaded_file($temp_name, $new_photo_name);

            $stm=$pdo->prepare("UPDATE articles SET content=?,thumbnail=?,category=?,tags=?,status=? WHERE slug=?");
            $insert = $stm->execute(array($content,$new_photo_name,$catagory,$tags,$status,$slug));

            if($insert == true){
               if($status == "public"){
                  echo '<script>
                  swal({
                     title: "Success",
                     text: "Your Article Updated Successfully!",
                     icon: "success",
                     button: "Ok",
                  });
                  </script>';
               }
               else if($status == "draft") {
                  echo '<script>
                  swal({
                     title: "",
                     text: "Your Article Saved to Draft!",
                     icon: "success",
                     button: "Ok",
                  });
                  </script>';
               }
               
            }
            else {
               echo '<script>
                  swal({
                     title: "",
                     text: "Your Article Faided To Published!",
                     icon: "error",
                     button: "Try Again!",
                  });
                  </script>';
            }
         }
      }
      else{
         echo '<script>
         swal({
            title: "",
            text: "Slug Is Already Used!",
            icon: "error",
            button: "Try Again",
         });
         </script>';
      }
      
   }

}

?>
<?php else : ?>
   
   <script src="../assets/scripts/sweetalert.min.js"></script>
   <script>
      swal({
         title: "",
         text: "Undifind Page!",
         icon: "error",
         buttons: false,
         });
   </script>
<?php endif; ?>