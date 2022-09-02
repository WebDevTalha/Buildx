<?php


require_once('config.php');
require_once('action_header.php');



if(isset($_GET['type']) && isset($_GET['slug'])){
   $slug = $_GET['slug'];
   $type = $_GET['type'];
} else{
   $slug = "";
   $type = "";
}

if($type == 'blog'){
   echo "";
}
else if($type == 'category'){
   echo "";
}
else{
   echo "Nothing Will Be Happend";
}


?>


<?php if($type == 'blog') : ?>
<?php
$stm2=$pdo->prepare("SELECT * FROM articles WHERE slug=?");
$stm2->execute(array($slug));
$result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="blog-article-wrapper pt-5 pb-5">
   <div class="container">
      <div class="row">
         <div class="col-md-9 p-3">
            <div class="article-left-side">
               <div class="article-category">
                  <a href="../category/<?php echo $result2[0]['category']; ?>"><?php echo getCategoryName($result2[0]['category']); ?></a>
               </div>
               <div class="article-title">
                  <h2><?php echo $result2[0]['title']; ?></h2>
               </div>
               <div class="article-image">
                  <img src="../dashboard/<?php echo $result2[0]['thumbnail']; ?>" alt="">
               </div>
               <div class="article-content p-3"><?php echo $result2[0]['content']; ?></div>
               <div class="comment-title"><h3>Comments</h3></div>
               <div class="spacer"></div>
               <div class="article-comments">
                  <div class="wrapper-comments">
                     <ul>
                     <?php
                     $stm3=$pdo->prepare("SELECT * FROM comments WHERE post_id=?");
                     $stm3->execute(array($result2[0]['id']));
                     $comment_count = $stm3->rowCount();
                     $result3 = $stm3->fetchAll(PDO::FETCH_ASSOC);
                     $i = 1;
                     ?>
                     <?php if($comment_count != 0) :?>
                     <?php foreach($result3 as $comment_row) : ?>

                     <?php
                     $stm4=$pdo->prepare("SELECT * FROM replays WHERE comment_id=?");
                     $stm4->execute(array($comment_row['id']));
                     $comment_replay_count = $stm4->rowCount();
                     $result4 = $stm4->fetchAll(PDO::FETCH_ASSOC);
                     ?>
                        <li class="mb-5">
                           <div class="commenter">
                              <input type="hidden" id="getCountBtn" value="<?php echo $comment_count; ?>">
                              <div class="comm-profile">
                                 <div class="image">
                                    <a href="#"><img src="../uploads/user.png" alt="user"></a>
                                 </div>
                              </div>
                              <div class="comment-text">
                                 <div class="comm-name">
                                    <a href="#"><?php echo getUserData('username',$comment_row['user_id']); ?></a>
                                 </div>
                                 <p><?php echo $comment_row['content']; ?></p>
                                 <div class="comment-replay-btn-area">
                                    <p class="replay-comment-btn" id="replay-comment-btn_<?php echo $i; ?>">Replay</p>
                                    <div class="commented-at"><?php echo getMonthName($comment_row['created_at']); ?></div>
                                    <form action="" method="POST" id="replay-form_<?php echo $i; ?>" class="replay-form">
                                       <input type="hidden" id="replay_comment_user_id_<?php echo $i; ?>" value="<?php if(isset($_SESSION['b_user_loggedin'])){echo $_SESSION['b_user_loggedin'][0]['id'];} ?>">
                                       <input type="hidden" id="replay_comment_post_id_<?php echo $i; ?>" value="<?php echo $result2[0]['id']; ?>">
                                       <input type="hidden" id="replay_comment_c_id_<?php echo $i; ?>" value="<?php echo $comment_row['id']; ?>">
                                       <input type="text" id="replay_comment_content_<?php echo $i; ?>" class="form-control" placeholder="Replay To <?php echo getUserData('username',$comment_row['user_id']); ?>" >
                                       <button type="submit" class="<?php if(!isset($_SESSION['b_user_loggedin'])){echo "user_not_login";} ?>" id="replay_comment_sent_btn_<?php echo $i; ?>"><i class="fa-solid fa-paper-plane"></i></button>
                                    </form>
                                    <span id="charNumCount_<?php echo $i; ?>" class="text-warning">200 Character Left</span>
                                 </div>
                              </div>
                              <div class="comment-report">
                                 <p href="#" class="report-comment-btn_<?php echo $i; ?>"><i class="fa-solid fa-ellipsis"></i></p>
                                 <style>
                                    .report-btns-wrapper_<?php echo $i; ?> {
                                       display: none;
                                    }
                                 </style>
                                 <div class="report-btns-wrapper_<?php echo $i; ?>">
                                    <div class="report-btns">
                                       <span id="report-send-btn_<?php echo $i; ?>">Report This Comment</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <?php if($comment_replay_count != 0) : ?>
                           <?php $a = 1; foreach($result4 as $comment_replay_row) : ?>
                           <div class="comment-replay">
                              <div class="replay-commenter commenter">
                                 <div class="replay-line"></div>
                                 <div class="comment-replay-line"></div>
                                 <div class="comm-profile">
                                    <div class="image">
                                       <a href="#"><img src="../uploads/user.png" alt="user"></a>
                                    </div>
                                 </div>
                                 <div class="comment-text">
                                    <div class="comm-name">
                                       <a href="#"><?php echo getUserData('username',$comment_replay_row['user_id']); ?></a>
                                    </div>
                                    <p><?php echo $comment_replay_row['content']; ?></p>
                                 </div>
                                 <div class="comment-report">
                                    <p href="#" class="report-comment-replay-btn_<?php echo $a; ?>"><i class="fa-solid fa-ellipsis"></i></p>
                                    <style>
                                       .report-replay-btns-wrapper_<?php echo $a; ?> {
                                          display: none;
                                       }
                                    </style>
                                    <div class="report-replay-btns-wrapper_<?php echo $a; ?>">
                                       <div class="report-btns">
                                          <span id="report-replay-send-btn_<?php echo $a; ?>">Report This Comment</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php $a++; endforeach; ?>
                           <?php endif; ?>
                        </li>
                        <?php $i++; endforeach; ?>
                        <?php else : ?>
                        <li>
                           <div class="no-comments">No Comments On This Article</div>
                        </li>
                        <?php endif; ?>
                     </ul>
                  </div>
               </div>
               <div class="spacer"></div>
               <div class="comment-form">
                  <form action="" method="POST">
                     <input type="hidden" name="user_id" value="<?php if(isset($_SESSION['b_user_loggedin'])){echo $_SESSION['b_user_loggedin'][0]['id'];} ?>">
                     <input type="hidden" name="post_id" value="<?php echo $result2[0]['id']; ?>">
                     <textarea name="comment" placeholder="Max 200 Character Letter" class="form-control comment-box mb-4" cols="30" rows="5" onkeyup="countChar(this)"></textarea>
                     <span id="charNum" class="text-warning">200 Character Left</span><br><br>
                     <input type="submit" name="comment_btn" value="Comment" class="<?php if(!isset($_SESSION['b_user_loggedin'])){echo "comment_btn";} ?> btn btn-warning btn-lg">
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-3 p-3">
            <div class="article-right-side pt-5">
               <div class="article-share pb-5">
                  <div class="row">
                     <div class="col-md-12">
                        <p class="text-secondary mb-0">Share</p>
                     </div>
                     <div class="col-md-6">
                        <div class="article-copy">
                           <!-- <input type="hidden" id="copyToClipboard_share" value="http://localhost/Buildx/blog/builder-of-human-happiness-for-all-time"> -->
                           <p class="d-none" id="copyToClipboard_share"><?php echo $_SERVER['SERVER_NAME']; ?>/Buildx/blog/<?php echo $slug; ?></p>
                           <button onclick="copyToClipboard('#copyToClipboard_share')" class="btn btn-secondary">Copy Link</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="article-created pb-5">
                  <div class="row">
                     <div class="col-md-12">
                        <p class="text-secondary mb-0">Published Date</p>
                     </div>
                     <div class="col-md-6">
                        <p class="fw-bold"><?php echo getMonthName($result2[0]['created_at']); ?></p>
                     </div>
                  </div>
               </div>
               <div class="article-tags">
                  <div class="row">
                     <div class="col-md-12">
                        <p class=" text-secondary">Tags</p>
                     </div>
                     <div class="col-md-12">
                        <div class="tags-wrapper">
                           <?php 
                              $decode = json_decode($result2[0]['tags'],true);
                              foreach($decode as $tags) :
                           ?>
                           <span class="alert alert-secondary m-0"><?php echo $tags['value']; ?></span>
                           <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<?php elseif($type == 'category') : ?>

<style>
.section-title p {
   color: #6d7396;
   max-width: 65.5rem;
   margin: auto;
   line-height: 2.5rem;
   margin-bottom: 8rem;
}
.blog-single-shadow {
    border-radius: 2rem;
}
.blog-single-shadow {
    border-radius: 2rem;
}

.blog-image {
    height: 30rem;
}
.blog-image a {
    height: 100%;
    width: 100%;
}

.blog-image a img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-top-left-radius: 2rem;
    border-bottom-left-radius: 2rem;
}
.category a {
    font-size: 1.7rem;
    margin-bottom: 1rem;
    color: #fab702;
}

.title a {
    font-size: 3rem;
    color: #fab702;
}
.content p {
    display: block;
    display: -webkit-box;
    max-width: 100%;
    height: 7.5rem;
    margin: 0 auto;
    font-size: 16px;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.content p {
   color: #6d7396;
}
</style>

<section class="blogs-area section-padding">
   <div class="container">
   <!-- Section Title -->
   <div class="section-title">
      <h1>Blog Categories</h1>
      <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cu, laboramus definiebas cum et. Duo id omnis persequeris neglegentur, facete commodo ea usu, possit lucilius sed ei. Esse efficiendi scripserit eos ex. Sea utamur iisque salutatus id.Mel autem animal.</p>
   </div>
   <?php

   
   $per_page = 5;
   $start = 0;
   $current_page = 1;

   if(isset($_GET['page'])){
      $start = $_GET['page'];
      if($start<=0){
         $start = 0;
         $current_page = 1;
      } else {
         $current_page = $start;
         $start--;
         $start = $start*$per_page;
      }
   }

   $status = "public";

   $stm2 = $pdo->prepare("SELECT * FROM articles WHERE category=? AND status=?");
   $stm2->execute(array($slug,$status));
   $record = $stm2->rowCount();
   $pagi = ceil($record/$per_page);


   $stm=$pdo->prepare("SELECT * FROM articles WHERE category=? AND status=? ORDER BY id DESC LIMIT $start,$per_page");
   $stm->execute(array($slug,$status));
   $result = $stm->fetchAll(PDO::FETCH_ASSOC);

   foreach($result as $row):
   ?>
   <!-- Single Item -->
   <div class="blog-single-shadow shadow mb-3 mt-5">
      <div class="row">
         <div class="col-md-5">
            <div class="blog-image">
               <a href="../blog/<?php echo $row['slug']; ?>"><img src="../dashboard/<?php echo $row['thumbnail']; ?>" alt=""></a>
            </div>
         </div>
         <div class="col-md-7">
            <div class="blog-content-wrap h-100">
               <div class="d-flex flex-column justify-content-center align-items-start h-100 p-5">
                  <div class="category mb-3"><a href="../category/<?php echo $row['category']; ?>"><?php echo getCategoryName($row['category']); ?></a></div>
                  <div class="title mb-3"><a href="../blog/<?php echo $row['slug']; ?>"><?php echo $row['title']; ?></a></div>
                  <div class="content"><?php echo $row['content']; ?></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endforeach; ?>

   <ul class="pagination pagination-lg mt-5 justify-content-center">
      <?php
      $class = '';
      for($i=1; $i<=$pagi; $i++) :
         if($current_page == $i){
            $class = 'active';
         }
      ?>
         <?php if($current_page == $i) :?>
            <li class="page-item <?php echo $class; ?>"><a class="page-link" href="javascript:void(0)"><?php echo $i; ?></a> </li>
         <?php else : ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> </li>
         <?php endif; ?>

      <?php endfor; ?>
   </ul>
   </div>
</section>
<?php endif; ?>


<?php require_once('action_footer.php') ?>

<script>
   $(document).ready(function(){
      let countBtn = $('#getCountBtn').val();
      for(let i = 1; i <= countBtn; i++){
         $('.report-comment-btn_'+i).click(function(){
            $('.report-btns-wrapper_'+i).toggle();
         });

         $('#report-send-btn_'+i).click(function(){
            swal({
               title: "Are you sure?",
               text: "You Want To Report This Comment!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
               }).then((willDelete) => {
               if (willDelete) {
                  swal("Report Send Successfully!", {
                     icon: "success",
                  });
               } else {
                  swal("Your Report Not Send!");
               }
            });
         });

         // Replay Form Show
         $('#replay-form_'+i).hide();
         $('#charNumCount_'+i).hide();
         $('#replay-comment-btn_'+i).click(function(){
            $('#replay-form_'+i).toggle(300);
            $('#charNumCount_'+i).toggle(300);
         });

         // input counter
         $('#replay_comment_content_'+i).keyup(function(){
            var len = this.value.length;
            if (len >= 200) {
               this.value = this.value.substring(0, 200);
            } else {
               $('#charNumCount_'+i).text(200 - len + " Character Left.");
            }
         });
         
      }

      for(let ii = 1; ii <= countBtn; ii++){
         $('.report-comment-replay-btn_'+ii).click(function(){
            $('.report-replay-btns-wrapper_'+ii).toggle();
         });

         $('#report-replay-send-btn_'+ii).click(function(){
            swal({
               title: "Are you sure?",
               text: "You Want To Report This Comment!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
               }).then((willDelete) => {
               if (willDelete) {
                  swal("Report Send Successfully!", {
                     icon: "success",
                  });
               } else {
                  swal("Your Report Not Send!");
               }
            });
         });
      }

   });
</script>
<script>
   $(document).ready(function(){
   $('.profile').click(function(){
      $('.dropdown-profile').slideToggle();
   });
   });


   // input counter
   function countChar(val) {
      var len = val.value.length;
      if (len >= 200) {
         val.value = val.value.substring(0, 200);
      } else {
         $('#charNum').text(200 - len + " Character Left.");
      }
   };

   $('.comment_btn').click(function(e){
      e.preventDefault();
      swal({
         title: "Please Login!",
         text: "You Have To Login For Comment",
         icon: "error",
         button: "Click For Login! :)",
      }).then(function() {
         window.location = "../login";
      });
   });
   
   // Form Enter press submition stop
   $(document).ready(function() {
      $(window).keydown(function(event){
         if(event.keyCode == 13) {
            event.preventDefault();
            return false;
         }
      });
   });

   // Copy function
   function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
   }

</script>
<?php if(isset($_SESSION['b_user_loggedin'])) : ?>
<script>
   // Comment Replay Submition
   let countBtn = $('#getCountBtn').val();
   for(let i = 1; i <= countBtn; i++){
         $('#replay_comment_sent_btn_'+i).click(function(e){
            e.preventDefault();
            const ajaxType = "comment_replay";
            const user_id = $('#replay_comment_user_id_'+i).val();
            const post_id = $('#replay_comment_post_id_'+i).val();
            const comment_id = $('#replay_comment_c_id_'+i).val();
            const comment_content = $('#replay_comment_content_'+i).val();
            $.ajax({
               type: "POST",
               url:'../ajax',
               data: {
                  ajaxType: ajaxType,
                  user_id: user_id,
                  post_id: post_id,
                  comment_id: comment_id,
                  comment_content: comment_content
               },
               success:function(response){
                  let data = response;
                  if(data == 'success'){
                     swal({
                        title: "",
                        text: "Replay Successfully Submit!",
                        icon: "success",
                        button: "Ok",
                     }).then(function() {
                        window.location = window.location;
                     });
                  } else if(data == 'error'){
                     swal({
                        title: "",
                        text: "Replay Failed To Submit!",
                        icon: "error",
                        button: "OK",
                     });
                  }
               }
            }); 
         });
      }
</script>
<?php else : ?>

<script>
   $('.user_not_login').click(function(e){
      e.preventDefault();
      swal({
         title: "Please Login!",
         text: "You Have To Login For Comment",
         icon: "error",
         button: "Click For Login! :)",
      }).then(function() {
         window.location = "../login";
      });
   });
</script>
<?php endif; ?>

<?php
if(isset($_POST['comment_btn'])){
   $user_id = $_POST['user_id'];
   $post_id = $_POST['post_id'];
   $comment = $_POST['comment'];
   if(empty($comment)){
      echo '<script>
       swal({
         title: "",
         text: "Comment Is Empty!",
         icon: "error",
         button: "Try Again!",
       });
       </script>';
   }
   else{
      $stm = $pdo->prepare("INSERT INTO comments(user_id,post_id,content) VALUES(?,?,?)");
      $result = $stm->execute(array($user_id,$post_id,$comment));
      if($result == true){
         echo '<script>
         swal({
            title: "",
            text: "Comment Successfully Submit!",
            icon: "success",
            button: "OK",
         });
         </script>';

      }
   }
}
?>