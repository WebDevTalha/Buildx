<?php require_once('header.php'); ?>

<style>
   .blog-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
}
.single-blog-item{
   cursor: pointer;
   position: relative;
}
.status span {
    position: absolute;
    top: 10px;
    right: -20px;
    font-size: 13px;
    padding: 7px 16px;
    z-index: 10;
}

.single-blog-item::after {
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.3);
    z-index: 8;
    transition: .5s;
    opacity: 0;
    border-radius: 10px;
    box-sizing: unset;
    padding: 10px;
}

.single-blog-item:hover::after{
   opacity: 1;
}

.service-image img {
    display: block;
    width: 100%;
    height: 210px;
    object-fit: cover;
}

.service-item-content {
    padding: 10px 0;
}

.service-item-content p {
   display: block;
   display: -webkit-box;
   max-width: 100%;
   height: 60px;
   margin: 0 auto;
   font-size: 14px;
   line-height: 19px;
   -webkit-line-clamp: 3;
   -webkit-box-orient: vertical;
   overflow: hidden;
   text-overflow: ellipsis;
}

.service-item-content h4 a {
    font-size: 25px;
    color: #0779e4;
    font-weight: 600;
    text-decoration: none;
}
.blog-actions a:nth-child(1){
   transform: translateX(-30px);
   opacity: 0;
   transition: .3s;
}
.single-blog-item:hover .blog-actions a:nth-child(1){
   transform: translateX(0);
   opacity: 1;
}
.blog-actions a:nth-child(2){
   transform: translateX(-30px);
   opacity: 0;
   transition: .3s;
}
.single-blog-item:hover .blog-actions a:nth-child(2){
   transform: translateX(0);
   opacity: 1;
   transition-delay: .2s;
}
.blog-actions a:nth-child(3){
   transform: translateX(-30px);
   opacity: 0;
   transition: .3s;
}
.single-blog-item:hover .blog-actions a:nth-child(3){
   transform: translateX(0);
   opacity: 1;
   transition-delay: .3s;
}


.blog-actions {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    display: flex;
    flex-direction: column;
    gap: 20px;
    z-index: 9;
}
</style>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                     <div class="page-title-icon">
                           <i class="pe-7s-note2 icon-gradient bg-happy-fisher"> </i>
                     </div>
                     <div>
                        Blog Articles
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
                     <h5 class="card-title">Blog Articles</h5>
                     <div class="blog-wrapper">
                        <!-- Single Box -->
                        <div class="card">
                           <div class="card-body">
                              <div class="single-blog-item">
                                 <div class="status">
                                    <span class="badge badge-info">Publish</span>
                                 </div>
                                 <div class="blog-actions">
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                 </div>
                                 <div class="service-image">
                                    <img src="../assets/image/services/service-item1.jpg" alt="Service-image">
                                 </div>
                                 <div class="service-item-content">
                                    <h4><a href="#">Renovations</a></h4>
                                    <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Single Box -->
                        <div class="card">
                           <div class="card-body">
                              <div class="single-blog-item">
                                 <div class="status">
                                    <span class="badge badge-info">Publish</span>
                                 </div>
                                 <div class="blog-actions">
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                 </div>
                                 <div class="service-image">
                                    <img src="../assets/image/services/service-item1.jpg" alt="Service-image">
                                 </div>
                                 <div class="service-item-content">
                                    <h4><a href="#">Renovations</a></h4>
                                    <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Single Box -->
                        <div class="card">
                           <div class="card-body">
                              <div class="single-blog-item">
                                 <div class="status">
                                    <span class="badge badge-info">Publish</span>
                                 </div>
                                 <div class="blog-actions">
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                 </div>
                                 <div class="service-image">
                                    <img src="../assets/image/services/service-item1.jpg" alt="Service-image">
                                 </div>
                                 <div class="service-item-content">
                                    <h4><a href="#">Renovations</a></h4>
                                    <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Single Box -->
                        <div class="card">
                           <div class="card-body">
                              <div class="single-blog-item">
                                 <div class="status">
                                    <span class="badge badge-info">Publish</span>
                                 </div>
                                 <div class="blog-actions">
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                 </div>
                                 <div class="service-image">
                                    <img src="../assets/image/services/service-item1.jpg" alt="Service-image">
                                 </div>
                                 <div class="service-item-content">
                                    <h4><a href="#">Renovations</a></h4>
                                    <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Single Box -->
                        <div class="card">
                           <div class="card-body">
                              <div class="single-blog-item">
                                 <div class="status">
                                    <span class="badge badge-warning">Draft</span>
                                 </div>
                                 <div class="blog-actions">
                                    <a href="#" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-primary">View</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                 </div>
                                 <div class="service-image">
                                    <img src="../assets/image/services/service-item1.jpg" alt="Service-image">
                                 </div>
                                 <div class="service-item-content">
                                    <h4><a href="#">Renovations</a></h4>
                                    <p>Lorem ipsum dolor sit amet, sed dicunt oporteat cuum Tuo iomnis persequeris neglegentur, facete commodo ea use possit lucilius.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
    

<?php require_once('footer.php'); ?>
