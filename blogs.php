<?php require_once('header.php') ?>

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

  <!-- Start Customer Feedback Area -->
  <section class="blogs-area section-padding">
    <div class="container">
      <!-- Section Title -->
      <div class="section-title">
        <h1>Blog Articles</h1>
        <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cu, laboramus definiebas cum et. Duo id omnis persequeris neglegentur, facete commodo ea usu, possit lucilius sed ei. Esse efficiendi scripserit eos ex. Sea utamur iisque salutatus id.Mel autem animal.</p>
      </div>
      <?php
      $status = "public";
      $stm=$pdo->prepare("SELECT * FROM articles WHERE status=? LIMIT 0,5");
      $stm->execute(array($status));
      $result = $stm->fetchAll(PDO::FETCH_ASSOC);

      foreach($result as $row):
      ?>
      <!-- Single Item -->
      <div class="blog-single-shadow shadow mb-3 mt-5">
         <div class="row">
            <div class="col-md-5">
               <div class="blog-image">
                  <a href="blog/<?php echo $row['slug']; ?>"><img src="dashboard/<?php echo $row['thumbnail']; ?>" alt=""></a>
               </div>
            </div>
            <div class="col-md-7">
               <div class="blog-content-wrap h-100">
                  <div class="d-flex flex-column justify-content-center align-items-start h-100 p-5">
                     <div class="category mb-3"><a href="category/<?php echo $row['category']; ?>"><?php echo getCategoryName($row['category']); ?></a></div>
                     <div class="title mb-3"><a href="blog/<?php echo $row['slug']; ?>"><?php echo $row['title']; ?></a></div>
                     <div class="content"><?php echo $row['content']; ?></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php endforeach; ?>

      <ul class="pagination pagination-lg mt-5 justify-content-center">
         <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a> </li>
         <li class="page-item"><a class="page-link" href="#">2</a> </li>
         <li class="page-item"><a class="page-link" href="#">3</a> </li>
         <li class="page-item"><a class="page-link" href="#">4</a> </li>
         <li class="page-item"><a class="page-link" href="#">5</a> </li>
      </ul>
    </div>
  </section>
  <!-- End Customer Feedback Area -->


<?php require_once('footer.php') ?>