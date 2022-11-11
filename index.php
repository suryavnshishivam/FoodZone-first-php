<?php

include('includes/connection.php');
include('includes/header.php');

?>
</style>
<!-- The Modal -->
<div class="modal" id="myModal">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
  
    <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title">Enquiry Now</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <!-- Modal body -->
    <div class="modal-body">
        <div class="auto-container">
        <div class="row">
     <div class="contact-form-area">
                        
                        <form method="post" action="admin/mailer.php" class="contact-form">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="text" name="name" placeholder="Name" required="">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone" required="">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <input type="email" name="email" placeholder="Email Address" required="">
                                </div>

                                <div class="col-md-12 form-group">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
        
                                <div class="col-md-12 form-group-two text-center">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span>SEND MESSAGE</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
    </div>
    
    <!-- Modal footer -->
    <!--div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div-->
    
  </div>
</div>
</div>

<!-- Bnner Section -->
<section class="banner-section">
    <div class="swiper-container banner-slider">
        <div class="swiper-wrapper">
            <!-- Slide Item -->
            <?php							     
                $qry_banner="SELECT * FROM tbl_banner order by position_order ASC";				 
                $result_banner=mysqli_query($mysqli,$qry_banner); 
                while($row_banner=mysqli_fetch_array($result_banner))
                {
            ?>
            <div class="swiper-slide" style="background-image: url(admin/images/banner/<?php echo $row_banner['banner_image'];?>);">
                <div class="content-outer">
                    <div class="content-box">
                        <div class="inner">
                        
                            <h1><?php echo $row_banner['banner_name'];?></h1>
                            <!--div class="link-box">
                                <a href="about.php" class="theme-btn btn-style-one light"><span>WHO WE ARE</span></a>
                                <a href="services.php" class="theme-btn btn-style-two light"><span>WORKS WE DID</span></a>
                            </div-->
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="banner-slider-nav">
        <div class="banner-slider-control banner-slider-button-prev"><span><i class="far fa-angle-left"></i></span></div>
        <div class="banner-slider-control banner-slider-button-next"><span><i class="far fa-angle-right"></i></span> </div>
    </div>
</section>
<!-- End Bnner Section -->

<video class="h_v" autoplay="" loop="" muted="">
  <source src="vid/vd2.mp4" type="video/mp4">
  </video>

