<?php require_once('header.php'); ?>

<?php


$profile_photo = admin('profile_photo',$user_id);
?>

<style>
   
   .avatar-upload {
    position: relative;
    max-width: 250px;
    height: 250px;
    margin: 20px auto;
}
.avatar-upload .avatar-edit {
    position: absolute;
    right: 10px;
    z-index: 1;
    bottom: 10px;
}

.avatar-upload .avatar-preview {
   width: 100%;
   height: 100%;
   position: relative;
   border-radius: 100%;
   border: 6px solid #f8f8f8;
   box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
   width: 100%;
   height: 100%;
   border-radius: 100%;
   background-size: cover;
   background-repeat: no-repeat;
   background-position: center;
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
                           Change Profile Photo
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
                     <h5 class="card-title">Upload Photo</h5>
                     <span id="msg" style="color:red"></span><br/>
                     <form action="" method="POST" enctype="multipart/form-data">
                        <div class="photo_wrapper">
                           <div class="avatar-upload">
                              <div class="avatar-edit">
                                 <input type='file' name="photo" id="imageUpload"/>
                                 <label for="imageUpload"></label>
                              </div>
                              <div class="avatar-preview">
                                 <div id="imagePreview" style="background-image: url(<?php if($profile_photo == null){
                                    echo 'uploads/user.png';
                                 } else {
                                    echo $profile_photo;
                                 } ?>);">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" name="info_update_btn" class="btn btn-success info_update_btn">Save changes</button>&nbsp;&nbsp;&nbsp;
                           <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
        </div>
    </div>
    

<?php require_once('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.js"></script>
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

$(document).ready(function(){
   $('form').submit(function(e){
      e.preventDefault();
      e.stopPropagation();
      var property = document.getElementById('imageUpload').files[0];
      var image_name = property.name;
      var image_extension = image_name.split('.').pop().toLowerCase();

      if(jQuery.inArray(image_extension,['gif','jpg','jpeg','png']) == -1){
         alert("Invalid image file");
      }
      else {
         var form_data = new FormData();
         form_data.append("file",property);
         const admin_id = <?php echo $user_id; ?>;
         $.ajax({
            url:'change_photo_process',
            method:'POST',
            data:form_data,
            contentType:false,
            cache:false,
            processData:false,
            success:function(response){

               let get_data = response;
               console.log(get_data);
               var imagelink = get_data.substring(7);
               let Updated = get_data.substring(0, 7);
               console.log(imagelink);
               console.log(Updated);
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
                           title: 'Finished!',
                           type: 'success',
                           timer: 2000,
                           showConfirmButton: false
                        })
                        }
                     }
                  );
                  $(".profile_updated").attr("src", imagelink);
                if(get_data === "Failed"){
                  swal({
                     title: "",
                     text: "Image Update Failed!",
                     icon: "error",
                     button: "Try Again!",
                  });
               }
               else if(get_data === "imageEmpty"){
                  swal({
                     title: "",
                     text: "Image Is Empty!",
                     icon: "error",
                     button: "Try Again!",
                  });
               }
            }
         });
      }
   });
});




   // $('form').submit(function(e){
   //    e.preventDefault();
   //    e.stopPropagation();
   //    const photo = $("input[name*='photo']").val();
   //    var filename = $('input[type=file]').val().replace(/.*(\/|\\)/, '');
   //    const admin_id = <?php // echo $user_id; ?>;

   //    $.ajax({
   //       type: "POST",
   //       url:'ajax',
   //       enctype: 'multipart/form-data',
   //       contentType:false,
   //       cache:false,
   //       processData:false,
   //       data: {
   //          photo: filename,
   //          user_id: admin_id
   //       },
   //       success:function(response){
   //          let data = response;
   //          console.log(data);
   //       }
   //    }); 
   // });
</script>




<?php


if(isset($_POST['info_update_btn'])){
	$photo = $_FILES['photo'];
    $target_dir = "images/uploads/"; 

	if(empty($photo['name'])){
		$error = "Photo Is Requird!";
	}
	else {
		// take photo extention
        $size = $_FILES['photo']['size'];
        $temp_name = $_FILES["photo"]["tmp_name"];
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		// Photo Conditions
		if($fileType != 'png' && $fileType != 'jpg'){
            $eror = "photo must be png or jpg";
        }
        elseif($size >= 5000000){
            $eror = "photo less then 5MB";
        }
        else {
            // image same in file
            $name_prefix = rand(99,999999999999);
            $new_photo_name = $target_dir . $name_prefix . '.' . $fileType;


            $upload = move_uploaded_file($temp_name, $new_photo_name);

			$statement = $pdo->prepare("UPDATE admin SET profile_photo=? WHERE id=?");
			$update_query = $statement->execute(
				array(
					$new_photo_name,
					$user_id
				)
			);

			if($update_query == true){
				$success = "Profile Photo Updated!";

			}
			else {
				$error = "Profile Photo Update Failed!";
			}
		}
	}
}

?>