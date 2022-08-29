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
               <div class="article-comments"></div>
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
                           <button class="btn btn-secondary">Copy Link</button>
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