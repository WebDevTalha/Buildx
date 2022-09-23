<?php require_once("header.php"); ?>
<link rel="stylesheet" href="assets/css/contact.css">
<section>
   <div class="wrapper">
      <div class="container_con">
         <div class="contactInfo">
            <div>
               <h2>Contact Info</h2>
               <ul class="info_con">
                  <li>
                     <span><img src="assets/image/contact/location.png"></span>
                     <span>Phulbari-5260, <br>
                        Dinajpur | Bangladesh.</span>
                  </li>
                  <li>
                     <span><img src="assets/image/contact/mail.png"></span>
                     <span>mdfarhantanvirtalha@gmail.com</span>
                  </li>
                  <li>
                     <span><img src="assets/image/contact/call.png"></span>
                     <span>01575-561781</span>
                  </li>
               </ul>
            </div>
            <ul class="sci">
               <li><a href="#"><img src="assets/image/contact/1.png"></a></li>
               <li><a href="#"><img src="assets/image/contact/2.png"></a></li>
               <li><a href="#"><img src="assets/image/contact/3.png"></a></li>
               <li><a href="#"><img src="assets/image/contact/4.png"></a></li>
               <li><a href="#"><img src="assets/image/contact/5.png"></a></li>
            </ul>
         </div>
         <div class="contactForm">
            <h2>Send a Message</h2>
            <form action="" method="POST" class="formBox">
               <div class="inputBox W50">
                  <input type="text" required>
                  <span>First Name</span>
               </div>

               <div class="inputBox W50">
                  <input type="text" required>
                  <span>Last Name</span>
               </div>

               <div class="inputBox W50">
                  <input type="email" required>
                  <span>Email Address</span>
               </div>

               <div class="inputBox W50">
                  <input type="text" required>
                  <span>Mobile Number</span>
               </div>

               <div class="inputBox W100">
                  <textarea required></textarea>
                  <span>Write your message</span>
               </div>
               <div class="inputBox w100">
                  <input type="submit" value="Send">
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

<?php require_once("footer.php"); ?>