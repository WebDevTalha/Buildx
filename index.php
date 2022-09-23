<?php require_once('header.php'); ?>
<style>
  .see-all-btn a {
    padding: 1.4rem 3.5rem;
    background-color: #fab702;
    color: #fff;
    -webkit-transition: .3s;
    transition: .3s;
}

.see-all-btn {
    text-align: center;
    margin-top: 7rem;
}

.see-all-btn a:hover {
    background: #3b404f;
}
</style>

  <!-- Start Banner Section Area -->
  <section class="banner-area">
    <div class="container">
      <div class="banner-wrapper">
        <h1>We Do Big Things 
          With Big Ideas </h1>
        <p>Talk To Our Experts and Get Your Dream Home Done. If you dream of designing 
          a new home that takes full advantage  of the unique geography and 
          views of land that you love</p>
        <a href="#">Explore Now</a>
      </div>
    </div>
  </section>
  <!-- End Banner Section Area -->

  <!-- Start Contact Us Today Area -->
  <section class="contact-us-today-area">
    <div class="container">
      <div class="contact-us-today">
        <h1>Consulting And Estimate For Your Project, <a href="contact">Contact Us Today</a></h1>
        <a class="cuta" href="contact">Get a Quote</a>
      </div>
    </div>
  </section>
  <!-- End Contact Us Today Area -->

  <!-- Start Our Services Section Area -->
  <section class="our-services-area section-padding">
    <div class="container">
      <div class="our-services">
        <!-- Section Title -->
        <div class="section-title">
          <h1>Our Services</h1>
          <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cu, laboramus definiebas cum et. Duo id omnis persequeris neglegentur, facete commodo ea usu, possit lucilius sed ei. Esse efficiendi scripserit eos ex. Sea utamur iisque salutatus id.Mel autem animal.</p>
        </div>
        <!-- Content -->
        <div class="services-content">

        <?php
        $service = "our-services";
        $stm=$pdo->prepare("SELECT * FROM articles WHERE category=? LIMIT 0,3");
        $stm->execute(array($service));
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row):
        ?>

          <!-- Single Box -->
          <div class="single-service-item">
            <div class="service-image">
                <img src="dashboard/<?php echo $row['thumbnail']; ?>" alt="Service-image">
            </div>
            <div class="service-item-content">
              <h4><a href="blog/<?php echo $row['slug']; ?>"><?php echo $row['title']; ?></a></h4>
              <div><?php echo $row['content']; ?></div>
              <a class="ssia" href="blog/<?php echo $row['slug']; ?>">READ MORE</a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Our Services Section Area -->

  <!-- Start Video Section Area -->
  <section class="video-area section-padding">
    <!-- Video -->
    <div class="video-play">
      <img src="assets/image/video/video-bg.jpg" alt="video-image">
      <a href="#"><i class="fa-solid fa-play"></i></a>
    </div>
    <!-- Video Content -->
    <div class="video-wrapper">
      <div class="video-content">
        <!-- Single Box -->
        <div class="single-video-c-item">
          <div class="video-icon">
            <img src="assets/image/video/1.png" alt="icon">
          </div>
          <div class="video-text">
            <h4><a href="category/general-builder">GENERAL BUILDER</a></h4>
            <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
          </div>
        </div>
        <!-- Single Box -->
        <div class="single-video-c-item">
          <div class="video-icon">
            <img src="assets/image/video/2.png" alt="icon">
          </div>
          <div class="video-text">
            <h4><a href="category/house-extensions">HOUSE EXTENSIONS</a></h4>
            <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
          </div>
        </div>
        <!-- Single Box -->
        <div class="single-video-c-item">
          <div class="video-icon">
            <img src="assets/image/video/3.png" alt="icon">
          </div>
          <div class="video-text">
            <h4><a href="category/refurbishment">REFURBISHMENT</a></h4>
            <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Video Section Area -->


  <!-- Start Customer Feedback Area -->
  <section class="customer-feedback-area section-padding">
    <div class="container">
      <!-- Section Title -->
      <div class="section-title">
        <h1>Customer Feedback</h1>
        <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cu, laboramus definiebas cum et. Duo id omnis persequeris neglegentur, facete commodo ea usu, possit lucilius sed ei. Esse efficiendi scripserit eos ex. Sea utamur iisque salutatus id.Mel autem animal.</p>
      </div>
      <!-- Content -->
      <div class="customer-feedback">
        <!-- Single Item -->
        <div class="single-feedback">
          <div class="feedback-image">
            <img src="assets/image/feedback/1.jpg" alt="feedback-image">
          </div>
          <div class="feedback-content">
            <div class="feedback-c-inner">
              <p>I've been happy with the services provided by Construction LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions.</p>
              <a href="#">HouseBuilders - CEO</a>
            </div>
          </div>
        </div>
        <!-- Single Item -->
        <div class="single-feedback">
          <div class="feedback-image">
            <img src="assets/image/feedback/4.jpg" alt="feedback-image">
          </div>
          <div class="feedback-content">
            <div class="feedback-c-inner">
              <p>I've been happy with the services provided by Construction LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions.</p>
              <a href="#">HouseBuilders - CEO</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Scroll dotts -->
      <div class="feedback-scroll-dotts">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- company Partners -->
      <div class="company-partners">
        <a href="#"><img src="assets/image/feedback/partner/1.png" alt="partner-image"></a>
        <a href="#"><img src="assets/image/feedback/partner/2.png" alt="partner-image"></a>
        <a href="#"><img src="assets/image/feedback/partner/3.png" alt="partner-image"></a>
        <a href="#"><img src="assets/image/feedback/partner/4.png" alt="partner-image"></a>
      </div>
    </div>
  </section>
  <!-- End Customer Feedback Area -->

  <!-- Start Fun Fact Section Area -->
  <section class="fun-fuct-area">
    <div class="container">
      <div class="fun-fact">
        <!-- Single Item -->
        <div class="single-fun-fact">
          <p>PROJECTS</p>
          <h1>2540</h1>
        </div>
        <!-- Single Item -->
        <div class="single-fun-fact">
          <p>CREDIT</p>
          <h1>7325</h1>
        </div>
        <!-- Single Item -->
        <div class="single-fun-fact">
          <p>AWARDS</p>
          <h1>1924</h1>
        </div>
        <!-- Single Item -->
        <div class="single-fun-fact">
          <p>CLIENTS</p>
          <h1>4275</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- End Fun Fact Section Area -->

  <!-- Start Job Section area -->
  <section class="job-section-area section-padding">
    <div class="container">
      <div class="job">
        <div class="job-title">
          <h2>Embedded in our culture of hard work, honesty, and getting the well done job</h2>
          <p>It can be used on larger scale projects as well as small scale projects without any problems.</p>
        </div>
        <div class="job-btn">
          <a href="#">Contact Us Today!</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Job Section area -->

  <!-- Start Featured News Section Area -->
  <section class="featured-news-area section-padding">
    <div class="container">
      <!-- Section Title -->
      <div class="section-title">
        <h1>Our Featured News</h1>
        <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cu, laboramus definiebas cum et. Duo id omnis persequeris neglegentur, facete commodo ea usu, possit lucilius sed ei. Esse efficiendi scripserit eos ex. Sea utamur iisque salutatus id.Mel autem animal.</p>
      </div>
      <!-- Content -->
      <div class="featured-news">

        <?php
        $category = "our-featured-news";
        $stm=$pdo->prepare("SELECT * FROM articles WHERE category=? LIMIT 0,3");
        $stm->execute(array($category));
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row):
        ?>
        <!-- Single Item -->
        <div class="single-featured-news-item">
          <div class="f-news-image">
            <img src="dashboard/<?php echo $row['thumbnail']; ?>" alt="News">
          </div>
          <div class="f-news-content">
            <h4><a href="blog/<?php echo $row['slug']; ?>"><?php echo $row['title']; ?></a></h4>
            <span><i class="fa-regular fa-calendar"></i> &nbsp; <?php echo getMonthName($row['created_at']); ?></span>
            <div><?php echo $row['content']; ?></div>
            <a class="fncb" href="blog/<?php echo $row['slug']; ?>">READ MORE</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- See All btn -->
      <!-- <div class="see-all-btn">
        <a href="#">See All</a>
      </div> -->
    </div>
  </section>
  <!-- End Featured News Section Area -->

  <?php require_once('footer.php'); ?>
