<?php require_once('config.php') ?>
<?php require_once('functions.php') ?>
<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/dist/css/style.css">
  <link rel="stylesheet" href="assets/css/dist/css/responsive.css">
  <script src="https://kit.fontawesome.com/51f9c8d173.js" crossorigin="anonymous"></script>
  <link rel="icon" href="assets/image/favicon.png">
  <title>BUILDX</title>
  <style>
   .service-item-content p {
    display: block;
    display: -webkit-box;
    max-width: 100%;
    height: 7.5rem;
    margin: 0 auto;
    font-size: 14px;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
   .f-news-content p {
    display: block;
    display: -webkit-box;
    max-width: 100%;
    height: 7.5rem;
    margin: 0 auto;
    font-size: 14px;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.profile {
    width: 4rem;
    height: 4rem;
    position: relative;
    cursor: pointer;
}

.profile span {
    position: absolute;
    bottom: 0;
    right: 0;
    background: #27df27;
    display: inline-block;
    width: 1rem;
    height: 1rem;
    border-radius: 50%;
}
.dropdown-profile {
    position: absolute;
    top: 5rem;
    right: 0;
    width: 16rem;
    border: 1px solid #eee;
    border-radius: 1rem;
    background: #fff;
    padding: .5rem 1rem 1rem 0;
    display: none;
}
.dropdown-profile ul {
    flex-direction: column;
    gap: 0 !important;
}
.dropdown-profile ul li {
    margin: 0 !important;
    padding: 1rem 0 .2rem 0;
    width: 100%;
}

.dropdown-profile ul li a {
    display: block;
    width: 100%;
}
  </style>
</head>
<body>
  <!-- Start header Area -->
  <header>
    <!-- Header Top -->
    <div class="header-bg-wrapper">
      <div class="container">
        <div class="header-top">
          <div class="header-top-text">
            <p>Have any question?</p>
          </div>
          <div class="header-top-contact-info">
            <a href="mailto:mdfarhantanvirtalha@gmail.com" title="Send Mail"><i class="fa-solid fa-envelope"></i> mdfarhantanvirtalha@gmail.com</a>
            <a href="tel:01575561781" title="Make A Call"><i class="fa-solid fa-phone"></i> +880 1575-561781</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Header Nav -->
    <div class="header-nav-wrapper">
      <div class="container">
        <div class="header-nav">
          <div class="logo">
            <a href="index"><img src="assets/image/logo.png" alt="logo"></a>
          </div>
          <nav class="menu">
            <a class="bars" href="#"><i class="fa-solid fa-bars"></i></a>
            <?php
            // print_r($_SERVER['SCRIPT_FILENAME']);
            $page = basename($_SERVER["SCRIPT_FILENAME"], '.php');
            ?>
            <ul>
              <li><a class="<?php if($page == "index"){echo "active";} ?>" href="index">Home</a></li>
              <li><a class="<?php if($page == "blogs"){echo "active";} ?>" href="blogs">Blogs</a></li>
              <li><a class="<?php if($page == "about"){echo "active";} ?>" href="about">About</a></li>
              <li><a class="<?php if($page == "contact"){echo "active";} ?>" href="contact">Contact</a></li>
              <?php if(isset($_SESSION['b_user_loggedin'])) : ?>
              <li>
                <div class="profile">
                  <img src="uploads/user.png" alt="iser">
                  <span></span>
                  <div class="dropdown-profile">
                    <ul>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Settings</a></li>
                      <li><a href="#">Help And Support</a></li>
                      <li><a href="logout">Logout</a></li>
                    </ul>
                  </div>
                </div>
              </li>
              <?php elseif(!isset($_SESSION['b_user_loggedin'])) : ?>
              <li><a class="btn btn-warning btn-lg text-white" href="login">Login</a></li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Area -->